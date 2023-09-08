<?php 
namespace Anchor\Sdk\Constants;
class Endpoints{
    ///Base urls
    static $baseUrlSandbox = "https://api.sandbox.getanchor.co/api/v1/";
    static $baseUrlLive = "https://api.getanchor.co";
    ///Customers Endpoints
    static $customers = "/customers";
    static $updateCustomer = "$this->customers/update";
    static $searchCustomer = "$this->customers/search";
    static $officerRequirement = "/officers-requirement";
    ///Customer Identification (KYC)
    static  $validateBusinessKYC = "verification/business"; 
    ///Documents
    static  $downloadCustomerDocument = "/documents/download-document";
    static  $documents = "/documents";
    static  $uploadDocument = "$this->documents/upload-document";
    /// Individual customer
    static  $individual = "/individuals";
    static  $createNextOfKin = "next-of-kin";
    //Collections (VNUBAN)
    static  $virtualNubans = "/virtual-nubans";
    static  $closeNubanAccount = "$this->virtualNubans/close-account";
    ///Collections (Payment) 
    static  $payments = "/payments";
    static  $verifyPayment = "$this->payments/requery";
    //Banking (Account)
    static  $accounts = "/accounts";
    static  $balance = "$this->accounts/balance";
    static  $freeze = "freeze";
    static  $unfreeze = "unfreeze";
    static  $rootAccounts = "$this->accounts/root-accounts";
    //Banking (Fees)
    static  $fee = "/fee";
    static  $customFee = "$this->fee/custom-fee";
    static  $reverseFee = "$this->fee/reverse";
    static  $chargedByOrganization = "$this->fee/charged-by-organization";
    //Banking (Statement)
    static  $statements = "/statements";
    static  $downloadStatement = "/statements/download";
    //Transfers (Bulk transfer)
    static  $transfers = "/transfers";
    static  $bulkTransfer = "$this->transfers/bulk";
    static  $verifyTransfer = "$this->transfers/verify";
     //Transfers (Counter party)
     static  $counterParties = "/counterparties";
     static  $bulkCounterParties = "$this->counterParties/bulk";
     //Transfer (verify-account)
     static $verifyAccount = "$this->payments/verify-account/";
     static $verifyBulkAccount = "$this->payments/verify-account/bulk";
     static $banks = "/banks";
     //Bill payment (verify-account)
     static $bills = "/bills";
     static $getAllBillers = "$this->bills/billers";
     static $getAllBillerProducts = "products";
     static $customerValidation = "customer-validation";
    //Subledger account
    static $subAccounts = "/sub-accounts";
    static $subAccountBallance = "/sub-accounts/balance";
    //Transactions
    static $transactions = "/transactions";
    static $subAccountransactions = "/sub-accounts//transactions";
    //Savings
    static $savings = "/savings";
    static $rollover = "rollover";
    static $withrawal = "/savings/withdrawal";
    static $deposit = "/savings/deposit";
    //Reconcillation
    static $reports = "/reports";
    static $download = "/reports/download";
    //Webhook
    static $webhooks = "/webhooks";
    static $sendSample = "/webhooks/verify";
    //Events
    static $events = "/events";
    static $types = "/events/event-types";
}

class Onboarding{}

?>