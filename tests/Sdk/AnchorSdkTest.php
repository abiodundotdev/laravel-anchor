<?php 
namespace AnchorTest;

use Anchor\AnchorSdk;
use Anchor\Facades\AnchorFacade;
use Anchor\Sdk\AnchorBanking;
use Anchor\Sdk\AnchorBillsPayment;
use Anchor\Sdk\AnchorCollections;
use Anchor\Sdk\AnchorOnboarding;
use Anchor\Sdk\AnchorReconcillation;
use Anchor\Sdk\AnchorSavings;
use Anchor\Sdk\AnchorSubaccount;
use Anchor\Sdk\AnchorTransactions;
use Anchor\Sdk\AnchorTransfers;
use Anchor\Sdk\AnchorWebhook;
use Orchestra\Testbench\TestCase as TestbenchTestCase;


class AnchorSdkTest extends TestbenchTestCase{
        private $anchorSdk;

        protected function setUp(): void{
            parent::setUp();
            $this->anchorSdk = new AnchorSdk();
        }

        function test_verify_return_type_is_onboarding_class(){
           $this->assertInstanceOf(AnchorOnboarding::class, $this->anchorSdk->onboarding());
        }

        function  test_verify_return_type_transactions_class(){
            $this->assertInstanceOf(AnchorTransactions::class, $this->anchorSdk->transactions());
        }

        function test_verify_return_type_is_collection_class(){
            $this->assertInstanceOf(AnchorCollections::class, $this->anchorSdk->collections());
        }

        function test_verify_return_type_is_transfer_class(){
            $this->assertInstanceOf(AnchorTransfers::class, $this->anchorSdk->transfers());
        }

        function test_verify_return_type_is_billpayment_class(){
            $this->assertInstanceOf(AnchorBillsPayment::class, $this->anchorSdk->billPayments());
        }

        function test_verify_return_type_is_subaccount_class(){
            $this->assertInstanceOf(AnchorSubaccount::class, $this->anchorSdk->subacounts());
        }

        function test_verify_return_type_is_savings_class(){
            $this->assertInstanceOf(AnchorSavings::class, $this->anchorSdk->savings());
        }

        function test_verify_return_type_is_reconcillation_class(){
            $this->assertInstanceOf(AnchorReconcillation::class, $this->anchorSdk->reconcillation());
        }

        function test_verify_return_type_is_webhook_class(){
            $this->assertInstanceOf(AnchorWebhook::class, $this->anchorSdk->webhook());
        }

}

?>