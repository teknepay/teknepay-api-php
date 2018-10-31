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

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Teknepay needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Teknepay needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
  throw new Exception('Teknepay needs the Multibyte String PHP extension.');
}

if (!class_exists('\Teknepay\Settings')) {
  require_once (__DIR__ . '/Teknepay/Settings.php');
  require_once (__DIR__ . '/Teknepay/Customer.php');
  require_once (__DIR__ . '/Teknepay/Money.php');
  require_once (__DIR__ . '/Teknepay/PaymentDetails.php');
  require_once (__DIR__ . '/Teknepay/ResponseBase.php');
  require_once (__DIR__ . '/Teknepay/Response.php');
  require_once (__DIR__ . '/Teknepay/ResponseCheckout.php');
  require_once (__DIR__ . '/Teknepay/ApiAbstract.php');
  require_once (__DIR__ . '/Teknepay/GatewayTransport.php');
  require_once (__DIR__ . '/Teknepay/GetCardPaymentToken.php');
  require_once (__DIR__ . '/Teknepay/GetC21PaymentToken.php');
  require_once (__DIR__ . '/Teknepay/GetEftPaymentToken.php');
}
?>
