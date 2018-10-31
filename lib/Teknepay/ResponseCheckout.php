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

class ResponseCheckout extends ResponseBase {

  public function isSuccess() {
    return isset($this->getResponse()->checkout);
  }

  public function isError() {
    $error = parent::isError();
    if (isset($this->getResponse()->checkout) && isset($this->getResponse()->checkout->status)) {
      $error = $error || $this->getResponse()->checkout->status == 'error';
    }
    return $error;
  }

  public function getMessage() {
    if (isset($this->getResponse()->message)) {
      return $this->getResponse()->message;
    }elseif (isset($this->getResponse()->response) && isset($this->getResponse()->response->message)) {
      return $this->getResponse()->response->message;
    }elseif ($this->isError()) {
      return $this->_compileErrors();
    }else{
      return '';
    }
  }

  public function getGatewayTransactionId() {
    return $this->getResponse()->checkout->Reference;
  }

  public function getGatewayStatus() {
    return $this->getResponse()->checkout->ResponseCode;
  }

  public function getRedirectUrl() {
    if($this->getGatewayStatus() == 1) {
      return Settings::$successRedirect;
    } else {
      return Settings::$failRedirect;
    }
    #return $this->getResponse()->checkout->redirect_url;
  }

  public function getRedirectUrlScriptName() {
    return preg_replace('/(.+)\?token=(.+)/', '$1', $this->getRedirectUrl());
  }

  private function _compileErrors() {
    $message = 'there are errors in request parameters.';
    if (isset($this->getResponse()->errors)) {
      foreach ($this->getResponse()->errors as $name => $desc) {
        $message .= ' ' . print_r($name, true);
        foreach($desc as $value) {
          $message .= ' ' . $value . '.';
        }
      }
    } elseif (isset($this->getResponse()->checkout->message)){
      $message = $this->getResponse()->checkout->message;
    }
    return $message;
  }
}
?>
