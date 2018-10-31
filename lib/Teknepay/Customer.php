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

class Customer {
  protected $_customer_ip;
  protected $_customer_email;

  protected $_customer_id;
  protected $_customer_first_name;
  protected $_customer_last_name;
  protected $_customer_address;
  protected $_customer_city;
  protected $_customer_country;
  protected $_customer_state;
  protected $_customer_zip;
  protected $_customer_phone;
  protected $_customer_holder;
  protected $_customer_birth_date = NULL;

  public function setCustomerId($_customer_id) {
    $this->_customer_id = $this->_setNullIfEmpty($_customer_id);
  }
  public function getCustomerId() {
    return $this->_customer_id;
  }

  public function setIP($ip) {
    $this->_customer_ip = $this->_setNullIfEmpty($ip);
  }
  public function getIP() {
    return $this->_customer_ip;
  }

  public function setEmail($email) {
    $this->_customer_email = $this->_setNullIfEmpty($email);
  }
  public function getEmail() {
    return $this->_customer_email;
  }

  public function setFirstName($first_name) {
    $this->_customer_first_name = $this->_setNullIfEmpty($first_name);
  }
  public function getFirstName() {
    return $this->_customer_first_name;
  }

  public function setHolder($_customer_holder) {
    $this->_customer_holder = $this->_setNullIfEmpty($_customer_holder);
  }
  public function getHolder() {
    return $this->_customer_holder;
  }

  public function setLastName($last_name) {
    $this->_customer_last_name = $this->_setNullIfEmpty($last_name);
  }
  public function getLastName() {
    return $this->_customer_last_name;
  }

  public function setAddress($address) {
    $this->_customer_address = $this->_setNullIfEmpty($address);
  }

  public function getAddress() {
    return $this->_customer_address;
  }

  public function setCity($city) {
    $this->_customer_city = $this->_setNullIfEmpty($city);
  }
  public function getCity() {
    return $this->_customer_city;
  }

  public function setCountry($country) {
    $this->_customer_country = $this->_setNullIfEmpty($country);
  }
  public function getCountry() {
    return $this->_customer_country;
  }

  public function setState($state) {
    $this->_customer_state = $this->_setNullIfEmpty($state);
  }
  public function getState() {
    return (in_array($this->_customer_country, array( 'US', 'CA'))) ? $this->_customer_state : 'NA';
  }

  public function setZip($zip) {
    $this->_customer_zip = $this->_setNullIfEmpty($zip);
  }
  public function getZip() {
    return $this->_customer_zip;
  }

  public function setPhone($phone) {
    $this->_customer_phone = $this->_setNullIfEmpty($phone);
  }
  public function getPhone() {
    return $this->_customer_phone;
  }

  public function setBirthDate($birthdate) {
    $this->_customer_birth_date = $this->_setNullIfEmpty($birthdate);
  }
  public function getBirthDate() {
    return $this->_customer_birth_date;
  }

  private function _setNullIfEmpty(&$resource) {
    return (strlen($resource) > 0) ? $resource : null;
  }
}
?>
