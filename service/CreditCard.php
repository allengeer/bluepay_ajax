<?php
/**
 * Created by PhpStorm.
 * User: ageer
 * Date: 3/29/14
 * Time: 6:06 PM
 */

class CreditCard {
    private $customer;
    private $ccnum;
    private $expdate;
    private $cvv2;

    function __construct($ccnum, $customer, $cvv2, $expdate)
    {
        $this->ccnum = $ccnum;
        $this->customer = $customer;
        $this->cvv2 = $cvv2;
        $this->expdate = $expdate;
    }

    /**
     * @param mixed $ccnum
     */
    public function setCcnum($ccnum)
    {
        $this->ccnum = $ccnum;
    }

    /**
     * @return mixed
     */
    public function getCcnum()
    {
        return $this->ccnum;
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
     * @param mixed $cvv2
     */
    public function setCvv2($cvv2)
    {
        $this->cvv2 = $cvv2;
    }

    /**
     * @return mixed
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * @param mixed $expdate
     */
    public function setExpdate($expdate)
    {
        $this->expdate = $expdate;
    }

    /**
     * @return mixed
     */
    public function getExpdate()
    {
        return $this->expdate;
    }


}