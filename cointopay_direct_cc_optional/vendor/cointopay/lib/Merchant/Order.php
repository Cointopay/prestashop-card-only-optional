<?php
namespace cointopay_direct_cc_optional\Merchant;

use cointopay_direct_cc_optional\Cointopay_Direct_Cc_Optional;
use cointopay_direct_cc_optional\Merchant;

class Order extends Merchant
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public static function createOrFail($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Direct_Cc_Optional::request('orders', 'GET', $params, $authentication);
        return new self($order);
    }
	public static function ValidateOrder($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Direct_Cc_Optional::request('validation', 'GET', $params, $authentication);
        return new self($order);
    }

    public function toHash()
    {
        return $this->order;
    }

    public function __get($name)
    {
        return $this->order[$name];
    }
}