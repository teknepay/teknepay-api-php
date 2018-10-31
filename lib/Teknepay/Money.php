<?php

/**
 * This is a payment module for teknepay gateway.
 * Copyright (C) 2018  All copyrights reserved to Teknepay
 * 
 * This file is part of Teknepay/Teknepay.
 * 
 * Teknepay/Teknepay is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Teknepay;

class Money {

  protected $_amount;
  protected $_currency;

  public function __construct($amount = 0, $currency = 'USD') {
    $this->_currency = $currency;
    $this->setAmount($amount);
  }

  public function setAmount($amount){
    $this->_amount = $amount;
  }
  public function getAmount() {
    return number_format($this->_amount, 2, '.', '');
  }

  public function setCurrency($currency){
    $this->_currency = $currency;
  }
  
  public function getCurrency() {
    return $this->_currency;
  }

}
?>
