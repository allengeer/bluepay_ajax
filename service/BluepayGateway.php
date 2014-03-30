<?php
/**
 * Created by PhpStorm.
 * User: ageer
 * Date: 3/29/14
 * Time: 5:49 PM
 */
include "BluePayPayment_BP10Emu.php";


class BluepayGateway {
    private $accountID = "MERCHANT'S ACCOUNT ID HERE";
    private $secretKey = "MERCHANT'S SECRET KEY HERE";
    private $mode = "TEST";

    public function __construct($accountID, $secretKey, $mode) {
        $this->setAccountID($accountID);
        $this->setSecretKey($secretKey);
        $this->setMode($mode);
    }

    public function doSale($customer, $ccinfo, $amount) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);

        $payment->setCustomerInformation($customer->getFirstName(), $customer->getLastName(),
                                        $customer->getAddress1(), $customer()->getAddress2(), $customer->getCity(), $customer->getState(),
                                        $customer->getZip(), $customer->getCountry());
        $payment->setCCInformation($ccinfo->getCcnum(), $ccinfo->getExpdate(), $ccinfo->getCvv2());
        $payment->setPhone($customer->getPhone());
        $payment->setEmail($customer->getEmail());

        //logging
        $payment->sale($amount);
        $payment->process();

        return new Transaction($payment);
    }

    public function doAuth($customer, $ccinfo, $amount) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);

        $payment->setCustomerInformation($customer->getFirstName(), $customer->getLastName(),
            $customer->getAddress1(), $customer()->getAddress2(), $customer->getCity(), $customer->getState(),
            $customer->getZip(), $customer->getCountry());
        $payment->setCCInformation($ccinfo->getCcnum(), $ccinfo->getExpdate(), $ccinfo->getCvv2());
        $payment->setPhone($customer->getPhone());
        $payment->setEmail($customer->getEmail());

        //logging
        $payment->auth($amount);
        $payment->process();

        return new Transaction($payment);
    }

    public function doCapture($transaction) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $payment->capture($transaction->getTransID());
        $payment->process();
        return new Transaction($payment);
    }

    public function doRefund($transaction) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $payment->refund($transaction->getTransID());
        $payment->process();
        return new Transaction($payment);
    }

    public function doCancel($transaction) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $payment->void($transaction->getTransID());
        $payment->process();
        return new Transaction($payment);
    }

    public function doStoreCard($customer, $ccinfo) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);

        $payment->setCustomerInformation($customer->getFirstName(), $customer->getLastName(),
            $customer->getAddress1(), $customer()->getAddress2(), $customer->getCity(), $customer->getState(),
            $customer->getZip(), $customer->getCountry());
        $payment->setCCInformation($ccinfo->getCcnum(), $ccinfo->getExpdate(), $ccinfo->getCvv2());
        $payment->setPhone($customer->getPhone());
        $payment->setEmail($customer->getEmail());

        //logging
        $payment->auth(0.00);
        $payment->process();

        return new Transaction($payment);
    }

    public function createRebill($customer, $ccinfo, $subscription) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);

        $payment->setCustomerInformation($customer->getFirstName(), $customer->getLastName(),
            $customer->getAddress1(), $customer()->getAddress2(), $customer->getCity(), $customer->getState(),
            $customer->getZip(), $customer->getCountry());
        $payment->setCCInformation($ccinfo->getCcnum(), $ccinfo->getExpdate(), $ccinfo->getCvv2());
        $payment->setPhone($customer->getPhone());
        $payment->setEmail($customer->getEmail());
        $payment->setRebillingInformation(
            $subscription->getStart(), $subscription->getFreq(), $subscription->getCycles(), $subscription->getAmount());

        //logging
        $payment->auth(0.00);
        $payment->process();
        $subscription->setTransaction(new Transaction($payment));
        $subscription->setRebillID($payment->getRebillID());
        return $subscription;
    }

    public function updateRebill($subscription, $ccinfo) {
        $payment = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $payment->setCCInformation($ccinfo->getCcnum(), $ccinfo->getExpdate());
        $payment->auth("0.00", $subscription->getTransaction()->getTransID());
        $payment->process();

        $rebill = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $rebill->updateRebillingCycle($subscription->getRebillID(), $subscription->getStart(), $subscription->getFreq(), $subscription->getCycles(), $subscription->getAmount(), $subscription->getNextAmount());
        $rebill->updateRebillingPaymentInformation($payment->getTransID());
        $rebill->process();

        $subscription->update($rebill);
        return $subscription;
    }

    public function cancelRebill($subscription, $ccinfo) {
        $rebill = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $rebill->cancelRebillingCycle($subscription->getRebillID());
        $rebill->process();
        $subscription->update($rebill);
        return $subscription;
    }

    public function getRebill($subscription) {
        $rebill = new BluePayPayment_BP10Emu(
            $this->accountID,
            $this->secretKey,
            $this->mode);
        $rebill->getRebillStatus($subscription->getRebillID());
        $rebill->process();
        $subscription->update($rebill);
        return $subscription;
    }
        /**
     * @param string $accountID
     */
    public function setAccountID($accountID)
    {
        $this->accountID = $accountID;
    }

    /**
     * @return string
     */
    public function getAccountID()
    {
        return $this->accountID;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

}