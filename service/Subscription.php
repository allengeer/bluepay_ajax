<?php
/**
 * Created by PhpStorm.
 * User: ageer
 * Date: 3/29/14
 * Time: 6:06 PM
 */

class Subscription {
    private $customer;
    private $start;
    private $freq;
    private $cycles;
    private $amount;
    private $active;
    private $transaction;
    private $status;
    private $createDate;
    private $nextDate;
    private $lastDate;
    private $nextAmount;
    private $rebillID;
    private $templateID;

    function __construct($amount, $customer, $cycles, $freq, $start)
    {
        $this->amount = $amount;
        $this->customer = $customer;
        $this->cycles = $cycles;
        $this->freq = $freq;
        $this->start = $start;
    }

    public function update($rebillInfo) {
        $this->rebillID = $rebillInfo->getRebillID();
        $this->templateID = $rebillInfo->getTemplateID();
        $this->status = $rebillInfo->getRebStatus();
        $this->createDate = $rebillInfo->getCreationDate();
        $this->nextDate = $rebillInfo->getNextDate();
        $this->lastDate = $rebillInfo->getLastDate();
        $this->freq = $rebillInfo->getSchedExpr();
        $this->cycles = $rebillInfo->getCyclesRemaining();
        $this->amount = $rebillInfo->getRebAmount();
        $this->nextAmount = $rebillInfo->getNextAmount();
    }

    /**
     * @param mixed $templateID
     */
    public function setTemplateID($templateID)
    {
        $this->templateID = $templateID;
    }

    /**
     * @return mixed
     */
    public function getTemplateID()
    {
        return $this->templateID;
    }


    /**
     * @param mixed $rebillID
     */
    public function setRebillID($rebillID)
    {
        $this->rebillID = $rebillID;
    }

    /**
     * @return mixed
     */
    public function getRebillID()
    {
        return $this->rebillID;
    }


    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $lastDate
     */
    public function setLastDate($lastDate)
    {
        $this->lastDate = $lastDate;
    }

    /**
     * @return mixed
     */
    public function getLastDate()
    {
        return $this->lastDate;
    }

    /**
     * @param mixed $nextAmount
     */
    public function setNextAmount($nextAmount)
    {
        $this->nextAmount = $nextAmount;
    }

    /**
     * @return mixed
     */
    public function getNextAmount()
    {
        return $this->nextAmount;
    }

    /**
     * @param mixed $nextDate
     */
    public function setNextDate($nextDate)
    {
        $this->nextDate = $nextDate;
    }

    /**
     * @return mixed
     */
    public function getNextDate()
    {
        return $this->nextDate;
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
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $cycles
     */
    public function setCycles($cycles)
    {
        $this->cycles = $cycles;
    }

    /**
     * @return mixed
     */
    public function getCycles()
    {
        return $this->cycles;
    }

    /**
     * @param mixed $freq
     */
    public function setFreq($freq)
    {
        $this->freq = $freq;
    }

    /**
     * @return mixed
     */
    public function getFreq()
    {
        return $this->freq;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }




} 