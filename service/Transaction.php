<?php
/**
 * Created by PhpStorm.
 * User: ageer
 * Date: 3/29/14
 * Time: 6:06 PM
 */

class Transaction {
    private $status;
    private $message;
    private $transID;
    private $avsResponse;
    private $cvv2Response;
    private $maskedAccount;
    private $cardType;
    private $authCode;



    function __construct($payment)
    {
        $this->authCode = $payment->getAuthCode();
        $this->avsResponse = $payment->getAVSResponse();
        $this->cardType = $payment->getCardType();
        $this->cvv2Response = $payment->getCVV2Response();
        $this->maskedAccount = $payment->getMaskedAccount();
        $this->message = $payment->getMessage();
        $this->status = $payment->getStatus();
        $this->transID = $payment->getTransID();
    }




    /**
     * @param mixed $authCode
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
    }

    /**
     * @return mixed
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param mixed $avsResponse
     */
    public function setAvsResponse($avsResponse)
    {
        $this->avsResponse = $avsResponse;
    }

    /**
     * @return mixed
     */
    public function getAvsResponse()
    {
        return $this->avsResponse;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cvv2Response
     */
    public function setCvv2Response($cvv2Response)
    {
        $this->cvv2Response = $cvv2Response;
    }

    /**
     * @return mixed
     */
    public function getCvv2Response()
    {
        return $this->cvv2Response;
    }

    /**
     * @param mixed $maskedAccount
     */
    public function setMaskedAccount($maskedAccount)
    {
        $this->maskedAccount = $maskedAccount;
    }

    /**
     * @return mixed
     */
    public function getMaskedAccount()
    {
        return $this->maskedAccount;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $transID
     */
    public function setTransID($transID)
    {
        $this->transID = $transID;
    }

    /**
     * @return mixed
     */
    public function getTransID()
    {
        return $this->transID;
    }



} 