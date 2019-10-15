<?php
/**
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Core\Iam;

use InvalidArgumentException;
use Google\Cloud\Core\Exception;

/**
 * Helper class for creating valid IAM policies
 *
 * Example:
 * ```
 * use Google\Cloud\Core\Iam\PolicyBuilder;
 *
 * $builder = new PolicyBuilder();
 * $builder->addBinding('roles/admin', [ 'user:admin@domain.com' ]);
 * $result = $builder->result();
 * ```
 */
class PolicyBuilder
{
    /**
     * @var array
     */
    private $bindings;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var int
     */
    private $version;

    /**
     * Create a PolicyBuilder.
     *
     * To use conditions in the bindings, the version of the policy must be set
     * to 3.
     *
     * @see [Policy versioning](https://cloud.google.com/iam/docs/policies#versions)
     * @see [Using Cloud IAM Conditions on buckets](https://cloud-dot-devsite.googleplex.com/storage/docs/access-control/using-iam-permissions#conditions-iam)
     *
     * Example:
     * ```
     * $policy = [
     *     'etag' => 'AgIc==',
     *     'version' => 3,
     *     'bindings' => [
     *         [
     *             'role' => 'roles/admin',
     *             'members' => [
     *                 'user:admin@domain.com',
     *                 'user2:admin@domain.com'
     *             ],
     *             'condition' => [
     *                 'title' => 'Expires_July_1_2020',
     *                 'description' => 'Expires on July 1, 2020',
     *                 'expression' =>
     *                     'request.time < timestamp("2020-07-01T00:00:00.000Z")'
     *             ]
     *         ]
     *     ],
     * ]
     *
     * $builder = new PolicyBuilder($policy);
     * ```
     *
     * @param  array $policy A policy array
     * @throws InvalidArgumentException
     */
    public function __construct(array $policy = [])
    {
        if (isset($policy['bindings'])) {
            $this->setBindings($policy['bindings']);
        } elseif (!empty($policy)) {
            throw new InvalidArgumentException('Invalid Policy');
        }

        if (isset($policy['etag'])) {
            $this->setEtag($policy['etag']);
        }

        if (isset($policy['version'])) {
            $this->setVersion($policy['version']);
        }
    }

    /**
     * Override all stored bindings on the policy.
     *
     * Example:
     * ```
     * $builder->setBindings([
     *     [
     *         'role' => 'roles/admin',
     *         'members' => [
     *             'user:admin@domain.com'
     *         ]
     *     ]
     * ]);
     * ```
     *
     * @param  array $bindings [optional] An array of bindings
     * @return PolicyBuilder
     * @throws InvalidArgumentException
     */
    public function setBindings(array $bindings = [])
    {
        $this->bindings = [];
        foreach ($bindings as $binding) {
            $newBinding = [
                'role' => $binding['role'],
                'members' => $binding['members'],
            ];

            if ($binding['condition']) {
                $newBinding['condition'] = $binding['condition'];
            }

            $this->bindings[] = $newBinding;
        }

        return $this;
    }

    /**
     * Add a new binding to the policy.
     *
     * This method will fail with an InvalidOpereationException if it is
     * called on a Policy with a version greater than 1 as that indicates
     * a more complicated policy than this method is prepared to handle.
     * Changes to such policies must be made manually by the setBindings()
     * method.
     *
     *
     * Example:
     * ```
     * $builder->addBinding('roles/admin', [ 'user:admin@domain.com' ]);
     * ```
     *
     * @param  string $role A valid role for the service
     * @param  array  $members An array of members to assign to the binding
     * @return PolicyBuilder
     * @throws InvalidArgumentException
     * @throws InvalidOperationException if the policy's version is greater than 1.
     */
    public function addBinding($role, array $members)
    {
        $this->validatePolicyVersion();

        $this->bindings[] = [
            'role' => $role,
            'members' => $members
        ];

        return $this;
    }

    /**
     * Remove a binding from the policy.
     *
     * This method will fail with an InvalidOpereationException if it is
     * called on a Policy with a version greater than 1 as that indicates
     * a more complicated policy than this method is prepared to handle.
     * Changes to such policies must be made manually by the setBindings()
     * method.
     *
     * Example:
     * ```
     * $builder->setBindings([
     *     [
     *         'role' => 'roles/admin',
     *         'members' => [
     *             'user:admin@domain.com',
     *             'user2:admin@domain.com'
     *         ]
     *     ]
     * ]);
     * $builder->removeBinding('roles/admin', [ 'user:admin@domain.com' ]);
     * ```
     *
     * @param  string $role A valid role for the service
     * @param  array  $members An array of members to remove from the role
     * @return PolicyBuilder
     * @throws InvalidArgumentException
     * @throws InvalidOperationException if the policy's version is greater than 1.
     */
    public function removeBinding($role, array $members)
    {
        $this->validatePolicyVersion();

        $bindings = $this->bindings;
        foreach ((array) $bindings as $i => $binding) {
            if ($binding['role'] == $role) {
                $newMembers = array_diff($binding['members'], $members);
                if (count($newMembers) != count($binding['members']) - count($members)) {
                    throw new InvalidArgumentException('One or more role-members were not found.');
                }
                if (empty($newMembers)) {
                    unset($bindings[$i]);
                    $bindings = array_values($bindings);
                } else {
                    $binding['members'] = array_values($newMembers);
                    $bindings[$i] = $binding;
                }
                $this->bindings = $bindings;

                return $this;
            }
        }

        throw new InvalidArgumentException('The role was not found.');
    }

    /**
     * Update the etag on the policy.
     *
     * Example:
     * ```
     * $builder->setEtag($oldPolicy['etag']);
     * ```
     *
     * @param  string $etag used for optimistic concurrency control as a way to help prevent simultaneous updates of a
     *         policy from overwriting each other. It is strongly suggested that updates to existing policies make use
     *         of the etag to avoid race conditions.
     * @return PolicyBuilder
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;

        return $this;
    }

    /**
     * Update the version of the policy.
     *
     * Example:
     * ```
     * $builder->setVersion(1);
     * ```
     *
     * @param  int $version Version of the Policy. **Defaults to** `0`.
     * @return PolicyBuilder
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Create a policy array with data in the correct format.
     *
     * Example:
     * ```
     * $policy = $builder->result();
     * ```
     *
     * @return array An array of policy data
     */
    public function result()
    {
        return array_filter([
            'etag' => $this->etag,
            'bindings' => $this->bindings,
            'version' => $this->version
        ]);
    }

    private function validatePolicyVersion()
    {
        if ($this->version && $this->version > 1) {
            throw new InvalidArgumentException("Helper methods cannot be invoked on policies with version {$this->version}.");
        }
    }
}
