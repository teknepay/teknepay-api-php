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

class Response extends ResponseBase {

  public function isSuccess() {
    return $this->getStatus() == 'successful';
  }

  public function isFailed() {
    return $this->getStatus() == 'failed';
  }

  public function isIncomplete() {
    return $this->getStatus() == 'incomplete';
  }

  public function isPending() {
    return $this->getStatus() == 'pending';
  }

  public function isTest() {
    if ($this->hasTransactionSection()) {
      return $this->getResponse()->transaction->test == true;
    }
    return false;
  }

  public function getStatus() {
    if ($this->hasTransactionSection()) {
      return $this->getResponse()->transaction->status;
    }elseif ($this->isError()) {
      return 'error';
    }
    return false;
  }

  public function getUid() {
    if ($this->hasTransactionSection()) {
      return $this->getResponse()->transaction->uid;
    }else{
      return false;
    }
  }

  public function getPaymentMethod() {
    if ($this->hasTransactionSection()) {
      return $this->getResponse()->transaction->payment_method_type;
    }else{
      return false;
    }
  }

  public function hasTransactionSection() {
    return (is_object($this->getResponse()) && isset($this->getResponse()->transaction));
  }

  public function getMessage() {

    if (is_object($this->getResponse())) {

      if (isset($this->getResponse()->message)) {

        return $this->getResponse()->message;

      }elseif (isset($this->getResponse()->transaction)) {

        return $this->getResponse()->transaction->message;

      }elseif (is_object($this->getResponse()->response)) {

        return $this->getResponse()->response->message;

      }
    }

    return '';

  }
}
?>
