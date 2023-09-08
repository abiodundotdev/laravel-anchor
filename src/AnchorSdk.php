<?php 
namespace Anchor;

use Anchor\Sdk\Anchorbanking;
use Anchor\Sdk\AnchorBillsPayment;
use Anchor\Sdk\AnchorOnboarding;
use Anchor\Sdk\AnchorCollection;
use Anchor\Sdk\AnchorTransfers;
use Anchor\Sdk\AnchorSubaccount;
use Anchor\Sdk\AnchorTransactions;
use Anchor\Sdk\AnchorSavings;
use Anchor\Sdk\AnchorReconcillation;
use Anchor\Sdk\AnchorWebhook;

class AnchorSdk{
    public function onboarding() : AnchorOnboarding
    {
        return new AnchorOnboarding();
    }
    public function collections() : AnchorCollection
    {
        return new AnchorCollection();
    }
    public function banking() : AnchorBanking
    {
        return new AnchorBanking();
    }
    public function transfers() : AnchorTransfers
    {
        return new AnchorTransfers();
    }
    public function billPayments() : AnchorBillsPayment
    {
        return new AnchorBillsPayment();
    }
    public function subacounts() : AnchorSubaccount
    {
        return new AnchorSubaccount();
    }
    public function transactions() : AnchorTransactions
    {
        return new AnchorTransactions();
    }
    public function savings() : AnchorSavings
    {
        return new AnchorSavings();
    }
    public function reconcillation() : AnchorReconcillation
    {
        return new AnchorReconcillation();
    }
    public function webhook() : AnchorWebhook
    {
        return new AnchorWebhook();
    }
}


?>
