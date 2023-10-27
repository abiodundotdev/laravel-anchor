<?php 
namespace AnchorTest;

use Anchor\AnchorSdk;
use Anchor\Facades\Anchor;
use Anchor\Facades\AnchorFacade;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use PHPUnit\Framework\TestCase;

class AnchorFacadeTest extends TestbenchTestCase{
    /**
     * Summary of test_it_returns_an_instance_of_anchor_sdk
     * @return void
     */
    function test_it_returns_an_instance_of_anchor_sdk (){
        $this->assertInstanceOf(AnchorSdk::class, AnchorFacade::getFacadeRoot());
    }

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