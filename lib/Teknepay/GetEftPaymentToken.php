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

class GetEftPaymentToken extends ApiAbstract {
  public static $version = '1.0';

  public $customer;
  public $money;
  protected $_description;
  protected $_tracking_id;
  protected $_success_url;
  protected $_decline_url;
  protected $_fail_url;
  protected $_cancel_url;
  protected $_notification_url;
  protected $_transaction_type;
  protected $_readonly;
  protected $_visible;
  protected $_payment_methods;
  protected $_expired_at;
  protected $_test_mode;

  public function __construct() {
    $this->customer = new Customer();
    $this->money = new Money();
    $this->paymentDetails = new PaymentDetails();
  }

  protected function _endpoint() {
    Debugger::info(Settings::$gatewayBase, "ENDPOINT: [" . __FUNCTION__ . " in file " . __FILE__ . "]");    
    return Settings::$gatewayBase;
  }

  protected function _buildRequestMessage() {

    $request = [
          "authenticate" => [
                              "user" => Settings::$gatewayUsername, 
                              "password" => Settings::$gatewayPassword
                          ],

          "transaction" => [
                              "ProfileID" => Settings::$profileId,
                              "FirstName" => $this->customer->getFirstName(),
                              "LastName" => $this->customer->getLastName(),
                              "Email" => $this->customer->getEmail(),
                              "Phone" => $this->customer->getPhone(),
                              "Address" => $this->customer->getAddress(),
                              "City" => $this->customer->getCity(),
                              "CheckHolder" => $this->customer->getHolder(),
                              "PostalCode" => $this->customer->getZip(),
                              "PaymentType" => $this->paymentDetails->getPaymentType(),
                              "Amount" => $this->money->getAmount(),
                              "Country" => $this->customer->getCountry(),
                              "State" => $this->customer->getState(),
                              "Currency" => $this->money->getCurrency(),
                              "RoutingNumber" => $this->paymentDetails->getTransitNumber() . "-" . $this->paymentDetails->getInstitutionNumber(),
                              "AccountNumber" => $this->paymentDetails->getAccountNumber(),
                              "AccountType" => $this->paymentDetails->getAccountType(),
                              "TransType" => $this->paymentDetails->getTransactionType(),
                              "CustomerID" => $this->customer->getCustomerId(),
                              "CustomerTransID" => $this->paymentDetails->getCustomerTransId(),
                              "Key" => $this->paymentDetails->getToken(),
                              "AdditionalInformation" => $this->paymentDetails->getAdditionalInformation()
                          ]
    ];

    return $request;
  }

  public function submit() {
    return new ResponseCheckout($this->_remoteRequest());
  }

}
?>
