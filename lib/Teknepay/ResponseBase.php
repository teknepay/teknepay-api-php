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

abstract class ResponseBase {

  protected $_response;
  protected $_responseArray;

  public function __construct($message){

    $checkoutObj = (object) array('checkout' => json_decode($message));

    $this->_response = $checkoutObj; 
    $this->_responseArray = json_decode($message, true);
  }
  public abstract function isSuccess();

  public function isError() {
    if (!is_object($this->getResponse()))
      return true;

    if (isset($this->getResponse()->errors))
      return true;

    if (isset($this->getResponse()->response))
      return true;

    return false;
  }

  public function isValid() {
    return !($this->_response === false || $this->_response == null);
  }

  public function getResponse() {
    return $this->_response;
  }

  public function getResponseArray() {
    return $this->_responseArray;
  }

}
?>
