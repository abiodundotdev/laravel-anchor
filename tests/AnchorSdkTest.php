<?php 
namespace AnchorTest;

use Anchor\AnchorSdk;
use Anchor\Facades\AnchorFacade;
use Anchor\Sdk\AnchorOnboarding;
use PHPUnit\Framework\TestCase;
use Orchestra\Testbench\TestCase as TestbenchTestCase;


class AnchorSdkTest extends TestbenchTestCase{
        function test_return_type_is_a_onboarding_class(){
           $this->assertInstanceOf(AnchorOnboarding::class, AnchorFacade::onboarding());
        }
        //TODO: Replace with workbench
        protected function getPackageProviders($app)
        {
            return [
                'Anchor\Providers\AnchorProvider'
            ];
        }

        protected function getPackageAliases($app)
        {
        return [
            'AnchorFacade' => 'Anchor\Facades\AnchorFacade',
        ];
        }
}

?>