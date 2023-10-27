<?php

use Anchor\Constants\AnchorEnvKey;
use PHPUnit\Framework\TestCase;

class AnchorUtilTest extends TestCase{

    function test_verify_anchor_sdk_env_values_are_string(){
       $this->assertIsString(env(AnchorEnvKey::$CURRENTENV));
       $this->assertIsString(env(AnchorEnvKey::$LIVE));
       $this->assertIsString(env(AnchorEnvKey::$SANDBOX));
    }
}


?>