<?php
/**
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Storage\Tests\System;


use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Core\Testing\System\SystemTestCase;

/**
 * @group storage
 * @group storage-iam
 */
class IamTest extends SystemTestCase
{
    private $bucket;
    const TESTING_PREFIX = 'gcloud_testing_';

    public function setUp()
    {
        $config = [
            'keyFilePath' => getenv('GOOGLE_CLOUD_PHP_TESTS_KEY_PATH'),
            'transport' => 'rest'
        ];

        $client = new StorageClient($config);
        $this->$bucket = self::createBucket($client, uniqid(self::TESTING_PREFIX));
        $this->$bucket->update($this->bucketConfig());
    }

    public function testGetPolicy()
    {
        $keyfile = json_decode(file_get_contents(getenv('GOOGLE_CLOUD_PHP_TESTS_KEY_PATH')), true);
        $projectId = $keyfile['project_id'];

        $iam = $this->$bucket->iam();
        $policy = $iam->policy();

        $this->assertTrue(isset($policy['etag']));
        $this->assertEquals(
            [
                [
                    'role' => 'roles/storage.legacyBucketOwner',
                    'members' => [
                        'projectEditor:' . $projectId,
                        'projectOwner:' . $projectId
                    ]
                ],
                [
                    'role' => 'roles/storage.legacyBucketReader',
                    'members' => ['projectViewer:' . $projectId]
                ]

            ],
            $policy['bindings']);
    }

    public function testSetPolicy()
    {
        $keyfile = json_decode(file_get_contents(getenv('GOOGLE_CLOUD_PHP_TESTS_KEY_PATH')), true);
        $projectId = $keyfile['project_id'];

        $iam = $this->$bucket->iam();
        $policy = $iam->policy();
        $newBinding = [
            'role' => 'roles/storage.legacyBucketReader',
            'members' => ['allUsers']
        ];

        $policy['bindings'][] = $newBinding;

        $iam->setPolicy($policy);
        $policy = $iam->reload();
        $this->assertContains(
            [
                'role' => 'roles/storage.legacyBucketReader',
                'members' => ['allUsers', 'projectViewer:' . $projectId]
            ],
            $policy['bindings']
        );
    }

    private function bucketConfig($enabled = true)
    {
        return [
            'iamConfiguration' => [
                'uniformBucketLevelAccess' => [
                    'enabled' => $enabled
                ]
            ]
        ];
    }
}
