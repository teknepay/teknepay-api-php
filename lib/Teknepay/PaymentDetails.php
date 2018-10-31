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

class PaymentDetails {

  protected $_card_holder;
  protected $_card_number;
  protected $_card_exp_year;
  protected $_card_exp_month;
  protected $_card_cvv;
  protected $_card_type;
  protected $_routing_number;
  protected $_account_number;
  protected $_transit_number;
  protected $_institution_number;
  protected $_account_type;
  protected $_payment_type;
  protected $_transaction_type;
  protected $_customer_trans_id;
  protected $_token;
  protected $_additional_information;

  public function setToken($_token) {
    $this->_token = $this->_setNullIfEmpty($_token);
  }

  public function getToken() {
    return $this->_token;
  }

  public function setCustomerTransId($_customer_trans_id) {
    $this->_customer_trans_id = $this->_setNullIfEmpty($_customer_trans_id);
  }

  public function getCustomerTransId() {
    return $this->_customer_trans_id;
  }

  public function setPaymentType($_payment_type) {
    $this->_payment_type = $this->_setNullIfEmpty($_payment_type);
  }

  public function getPaymentType() {
    return $this->_payment_type;
  }

  public function setTransactionType($_transaction_type) {
    $this->_transaction_type = $this->_setNullIfEmpty($_transaction_type);
  }

  public function getTransactionType() {
    return $this->_transaction_type;
  }

  public function setCardHolder($_card_holder) {
    $this->_card_holder = $this->_setNullIfEmpty($_card_holder);
  }

  public function getCardHolder() {
    return $this->_card_holder;
  }

  public function setCardNumber($_card_number) {
    $this->_card_number = $this->_setNullIfEmpty($_card_number);
  }

  public function getCardNumber() {
    return $this->_card_number;
  }

  public function setCardExpYear($_card_exp_year) {
    $this->_card_exp_year = $this->_setNullIfEmpty($_card_exp_year);
  }

  public function getCardExpYear() {
    return $this->_card_exp_year;
  }

  public function setCardExpMonth($_card_exp_month) {
    $this->_card_exp_month = $this->_setNullIfEmpty($_card_exp_month);
  }

  public function getCardExpMonth() {
    return $this->_card_exp_month;
  }

  public function setCardCvv($_card_cvv) {
    $this->_card_cvv = $this->_setNullIfEmpty($_card_cvv);
  }

  public function getCardCvv() {
    return $this->_card_cvv;
  }

  public function setCardType($_card_type) {
    $this->_card_type = $this->_setNullIfEmpty($_card_type);
  }

  public function getCardType() {
    return $this->_card_type;
  }

  public function setRoutingNumber($_routing_number) {
    $this->_routing_number = $this->_setNullIfEmpty($_routing_number);
  }

  public function getRoutingNumber() {
    return $this->_routing_number;
  }

  public function setAccountNumber($_account_number) {
    $this->_account_number = $this->_setNullIfEmpty($_account_number);
  }

  public function getAccountNumber() {
    return $this->_account_number;
  }

  public function setTransitNumber($_transit_number) {
    $this->_transit_number = $this->_setNullIfEmpty($_transit_number);
  }

  public function getTransitNumber() {
    return $this->_transit_number;
  }

  public function setInstitutionNumber($_institution_number) {
    $this->_institution_number = $this->_setNullIfEmpty($_institution_number);
  }

  public function getInstitutionNumber() {
    return $this->_institution_number;
  }

  public function setAccountType($_account_type) {
    $this->_account_type = $this->_setNullIfEmpty($_account_type);
  }

  public function getAccountType() {
    return $this->_account_type;
  }

  public function setAdditionalInformation($_additional_information) {
    $this->_additional_information = $this->_setNullIfEmpty($_additional_information);
  }

  public function getAdditionalInformation() {
    return $this->_additional_information;
  }

  private function _setNullIfEmpty(&$resource) {
    return (strlen($resource) > 0) ? $resource : null;
  }
}
?>
