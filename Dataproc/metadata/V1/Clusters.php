<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/clusters.proto

namespace GPBMetadata\Google\Cloud\Dataproc\V1;

class Clusters
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0ae4280a27676f6f676c652f636c6f75642f6461746170726f632f76312f" .
            "636c7573746572732e70726f746f1218676f6f676c652e636c6f75642e64" .
            "61746170726f632e76311a23676f6f676c652f6c6f6e6772756e6e696e67" .
            "2f6f7065726174696f6e732e70726f746f1a1e676f6f676c652f70726f74" .
            "6f6275662f6475726174696f6e2e70726f746f1a20676f6f676c652f7072" .
            "6f746f6275662f6669656c645f6d61736b2e70726f746f1a1f676f6f676c" .
            "652f70726f746f6275662f74696d657374616d702e70726f746f22a5030a" .
            "07436c757374657212120a0a70726f6a6563745f69641801200128091214" .
            "0a0c636c75737465725f6e616d6518022001280912370a06636f6e666967" .
            "18032001280b32272e676f6f676c652e636c6f75642e6461746170726f63" .
            "2e76312e436c7573746572436f6e666967123d0a066c6162656c73180820" .
            "03280b322d2e676f6f676c652e636c6f75642e6461746170726f632e7631" .
            "2e436c75737465722e4c6162656c73456e74727912370a06737461747573" .
            "18042001280b32272e676f6f676c652e636c6f75642e6461746170726f63" .
            "2e76312e436c7573746572537461747573123f0a0e7374617475735f6869" .
            "73746f727918072003280b32272e676f6f676c652e636c6f75642e646174" .
            "6170726f632e76312e436c757374657253746174757312140a0c636c7573" .
            "7465725f7575696418062001280912390a076d6574726963731809200128" .
            "0b32282e676f6f676c652e636c6f75642e6461746170726f632e76312e43" .
            "6c75737465724d6574726963731a2d0a0b4c6162656c73456e747279120b" .
            "0a036b6579180120012809120d0a0576616c75651802200128093a023801" .
            "22a8040a0d436c7573746572436f6e66696712150a0d636f6e6669675f62" .
            "75636b657418012001280912460a126763655f636c75737465725f636f6e" .
            "66696718082001280b322a2e676f6f676c652e636c6f75642e6461746170" .
            "726f632e76312e476365436c7573746572436f6e66696712440a0d6d6173" .
            "7465725f636f6e66696718092001280b322d2e676f6f676c652e636c6f75" .
            "642e6461746170726f632e76312e496e7374616e636547726f7570436f6e" .
            "66696712440a0d776f726b65725f636f6e666967180a2001280b322d2e67" .
            "6f6f676c652e636c6f75642e6461746170726f632e76312e496e7374616e" .
            "636547726f7570436f6e666967124e0a177365636f6e646172795f776f72" .
            "6b65725f636f6e666967180c2001280b322d2e676f6f676c652e636c6f75" .
            "642e6461746170726f632e76312e496e7374616e636547726f7570436f6e" .
            "66696712410a0f736f6674776172655f636f6e666967180d2001280b3228" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e536f6674" .
            "77617265436f6e66696712520a16696e697469616c697a6174696f6e5f61" .
            "6374696f6e73180b2003280b32322e676f6f676c652e636c6f75642e6461" .
            "746170726f632e76312e4e6f6465496e697469616c697a6174696f6e4163" .
            "74696f6e12450a11656e6372797074696f6e5f636f6e666967180f200128" .
            "0b322a2e676f6f676c652e636c6f75642e6461746170726f632e76312e45" .
            "6e6372797074696f6e436f6e666967222f0a10456e6372797074696f6e43" .
            "6f6e666967121b0a136763655f70645f6b6d735f6b65795f6e616d651801" .
            "2001280922af020a10476365436c7573746572436f6e66696712100a087a" .
            "6f6e655f75726918012001280912130a0b6e6574776f726b5f7572691802" .
            "2001280912160a0e7375626e6574776f726b5f7572691806200128091218" .
            "0a10696e7465726e616c5f69705f6f6e6c7918072001280812170a0f7365" .
            "72766963655f6163636f756e74180820012809121e0a1673657276696365" .
            "5f6163636f756e745f73636f706573180320032809120c0a047461677318" .
            "0420032809124a0a086d6574616461746118052003280b32382e676f6f67" .
            "6c652e636c6f75642e6461746170726f632e76312e476365436c75737465" .
            "72436f6e6669672e4d65746164617461456e7472791a2f0a0d4d65746164" .
            "617461456e747279120b0a036b6579180120012809120d0a0576616c7565" .
            "1802200128093a02380122d3020a13496e7374616e636547726f7570436f" .
            "6e66696712150a0d6e756d5f696e7374616e63657318012001280512160a" .
            "0e696e7374616e63655f6e616d657318022003280912110a09696d616765" .
            "5f75726918032001280912180a106d616368696e655f747970655f757269" .
            "18042001280912390a0b6469736b5f636f6e66696718052001280b32242e" .
            "676f6f676c652e636c6f75642e6461746170726f632e76312e4469736b43" .
            "6f6e66696712160a0e69735f707265656d707469626c6518062001280812" .
            "4a0a146d616e616765645f67726f75705f636f6e66696718072001280b32" .
            "2c2e676f6f676c652e636c6f75642e6461746170726f632e76312e4d616e" .
            "6167656447726f7570436f6e66696712410a0c616363656c657261746f72" .
            "7318082003280b322b2e676f6f676c652e636c6f75642e6461746170726f" .
            "632e76312e416363656c657261746f72436f6e66696722590a124d616e61" .
            "67656447726f7570436f6e666967121e0a16696e7374616e63655f74656d" .
            "706c6174655f6e616d6518012001280912230a1b696e7374616e63655f67" .
            "726f75705f6d616e616765725f6e616d65180220012809224c0a11416363" .
            "656c657261746f72436f6e666967121c0a14616363656c657261746f725f" .
            "747970655f75726918012001280912190a11616363656c657261746f725f" .
            "636f756e7418022001280522570a0a4469736b436f6e66696712160a0e62" .
            "6f6f745f6469736b5f7479706518032001280912190a11626f6f745f6469" .
            "736b5f73697a655f676218012001280512160a0e6e756d5f6c6f63616c5f" .
            "7373647318022001280522690a184e6f6465496e697469616c697a617469" .
            "6f6e416374696f6e12170a0f65786563757461626c655f66696c65180120" .
            "01280912340a11657865637574696f6e5f74696d656f757418022001280b" .
            "32192e676f6f676c652e70726f746f6275662e4475726174696f6e22ed02" .
            "0a0d436c7573746572537461747573123c0a05737461746518012001280e" .
            "322d2e676f6f676c652e636c6f75642e6461746170726f632e76312e436c" .
            "75737465725374617475732e5374617465120e0a0664657461696c180220" .
            "01280912340a1073746174655f73746172745f74696d6518032001280b32" .
            "1a2e676f6f676c652e70726f746f6275662e54696d657374616d7012420a" .
            "08737562737461746518042001280e32302e676f6f676c652e636c6f7564" .
            "2e6461746170726f632e76312e436c75737465725374617475732e537562" .
            "737461746522560a055374617465120b0a07554e4b4e4f574e1000120c0a" .
            "084352454154494e471001120b0a0752554e4e494e47100212090a054552" .
            "524f521003120c0a0844454c4554494e471004120c0a085550444154494e" .
            "471005223c0a085375627374617465120f0a0b554e535045434946494544" .
            "1000120d0a09554e4845414c544859100112100a0c5354414c455f535441" .
            "545553100222a8010a0e536f667477617265436f6e66696712150a0d696d" .
            "6167655f76657273696f6e180120012809124c0a0a70726f706572746965" .
            "7318022003280b32382e676f6f676c652e636c6f75642e6461746170726f" .
            "632e76312e536f667477617265436f6e6669672e50726f70657274696573" .
            "456e7472791a310a0f50726f70657274696573456e747279120b0a036b65" .
            "79180120012809120d0a0576616c75651802200128093a023801229a020a" .
            "0e436c75737465724d657472696373124f0a0c686466735f6d6574726963" .
            "7318012003280b32392e676f6f676c652e636c6f75642e6461746170726f" .
            "632e76312e436c75737465724d6574726963732e486466734d6574726963" .
            "73456e747279124f0a0c7961726e5f6d65747269637318022003280b3239" .
            "2e676f6f676c652e636c6f75642e6461746170726f632e76312e436c7573" .
            "7465724d6574726963732e5961726e4d657472696373456e7472791a320a" .
            "10486466734d657472696373456e747279120b0a036b6579180120012809" .
            "120d0a0576616c75651802200128033a0238011a320a105961726e4d6574" .
            "72696373456e747279120b0a036b6579180120012809120d0a0576616c75" .
            "651802200128033a0238012282010a14437265617465436c757374657252" .
            "65717565737412120a0a70726f6a6563745f6964180120012809120e0a06" .
            "726567696f6e18032001280912320a07636c757374657218022001280b32" .
            "212e676f6f676c652e636c6f75642e6461746170726f632e76312e436c75" .
            "7374657212120a0a726571756573745f6964180420012809228b020a1455" .
            "7064617465436c75737465725265717565737412120a0a70726f6a656374" .
            "5f6964180120012809120e0a06726567696f6e18052001280912140a0c63" .
            "6c75737465725f6e616d6518022001280912320a07636c75737465721803" .
            "2001280b32212e676f6f676c652e636c6f75642e6461746170726f632e76" .
            "312e436c757374657212400a1d677261636566756c5f6465636f6d6d6973" .
            "73696f6e5f74696d656f757418062001280b32192e676f6f676c652e7072" .
            "6f746f6275662e4475726174696f6e122f0a0b7570646174655f6d61736b" .
            "18042001280b321a2e676f6f676c652e70726f746f6275662e4669656c64" .
            "4d61736b12120a0a726571756573745f6964180720012809227a0a144465" .
            "6c657465436c75737465725265717565737412120a0a70726f6a6563745f" .
            "6964180120012809120e0a06726567696f6e18032001280912140a0c636c" .
            "75737465725f6e616d6518022001280912140a0c636c75737465725f7575" .
            "696418042001280912120a0a726571756573745f6964180520012809224d" .
            "0a11476574436c75737465725265717565737412120a0a70726f6a656374" .
            "5f6964180120012809120e0a06726567696f6e18032001280912140a0c63" .
            "6c75737465725f6e616d6518022001280922700a134c697374436c757374" .
            "6572735265717565737412120a0a70726f6a6563745f6964180120012809" .
            "120e0a06726567696f6e180420012809120e0a0666696c74657218052001" .
            "280912110a09706167655f73697a6518022001280512120a0a706167655f" .
            "746f6b656e18032001280922640a144c697374436c757374657273526573" .
            "706f6e736512330a08636c75737465727318012003280b32212e676f6f67" .
            "6c652e636c6f75642e6461746170726f632e76312e436c75737465721217" .
            "0a0f6e6578745f706167655f746f6b656e18022001280922520a16446961" .
            "676e6f7365436c75737465725265717565737412120a0a70726f6a656374" .
            "5f6964180120012809120e0a06726567696f6e18032001280912140a0c63" .
            "6c75737465725f6e616d65180220012809222c0a16446961676e6f736543" .
            "6c7573746572526573756c747312120a0a6f75747075745f757269180120" .
            "01280932b2080a11436c7573746572436f6e74726f6c6c657212a4010a0d" .
            "437265617465436c7573746572122e2e676f6f676c652e636c6f75642e64" .
            "61746170726f632e76312e437265617465436c7573746572526571756573" .
            "741a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f706572617469" .
            "6f6e224482d3e493023e22332f76312f70726f6a656374732f7b70726f6a" .
            "6563745f69647d2f726567696f6e732f7b726567696f6e7d2f636c757374" .
            "6572733a07636c757374657212b3010a0d557064617465436c7573746572" .
            "122e2e676f6f676c652e636c6f75642e6461746170726f632e76312e5570" .
            "64617465436c7573746572526571756573741a1d2e676f6f676c652e6c6f" .
            "6e6772756e6e696e672e4f7065726174696f6e225382d3e493024d32422f" .
            "76312f70726f6a656374732f7b70726f6a6563745f69647d2f726567696f" .
            "6e732f7b726567696f6e7d2f636c7573746572732f7b636c75737465725f" .
            "6e616d657d3a07636c757374657212aa010a0d44656c657465436c757374" .
            "6572122e2e676f6f676c652e636c6f75642e6461746170726f632e76312e" .
            "44656c657465436c7573746572526571756573741a1d2e676f6f676c652e" .
            "6c6f6e6772756e6e696e672e4f7065726174696f6e224a82d3e49302442a" .
            "422f76312f70726f6a656374732f7b70726f6a6563745f69647d2f726567" .
            "696f6e732f7b726567696f6e7d2f636c7573746572732f7b636c75737465" .
            "725f6e616d657d12a8010a0a476574436c7573746572122b2e676f6f676c" .
            "652e636c6f75642e6461746170726f632e76312e476574436c7573746572" .
            "526571756573741a212e676f6f676c652e636c6f75642e6461746170726f" .
            "632e76312e436c7573746572224a82d3e493024412422f76312f70726f6a" .
            "656374732f7b70726f6a6563745f69647d2f726567696f6e732f7b726567" .
            "696f6e7d2f636c7573746572732f7b636c75737465725f6e616d657d12aa" .
            "010a0c4c697374436c757374657273122d2e676f6f676c652e636c6f7564" .
            "2e6461746170726f632e76312e4c697374436c7573746572735265717565" .
            "73741a2e2e676f6f676c652e636c6f75642e6461746170726f632e76312e" .
            "4c697374436c757374657273526573706f6e7365223b82d3e49302351233" .
            "2f76312f70726f6a656374732f7b70726f6a6563745f69647d2f72656769" .
            "6f6e732f7b726567696f6e7d2f636c75737465727312ba010a0f44696167" .
            "6e6f7365436c757374657212302e676f6f676c652e636c6f75642e646174" .
            "6170726f632e76312e446961676e6f7365436c7573746572526571756573" .
            "741a1d2e676f6f676c652e6c6f6e6772756e6e696e672e4f706572617469" .
            "6f6e225682d3e4930250224b2f76312f70726f6a656374732f7b70726f6a" .
            "6563745f69647d2f726567696f6e732f7b726567696f6e7d2f636c757374" .
            "6572732f7b636c75737465725f6e616d657d3a646961676e6f73653a012a" .
            "42710a1c636f6d2e676f6f676c652e636c6f75642e6461746170726f632e" .
            "7631420d436c75737465727350726f746f50015a40676f6f676c652e676f" .
            "6c616e672e6f72672f67656e70726f746f2f676f6f676c65617069732f63" .
            "6c6f75642f6461746170726f632f76313b6461746170726f63620670726f" .
            "746f33"
        ));

        static::$is_initialized = true;
    }
}
