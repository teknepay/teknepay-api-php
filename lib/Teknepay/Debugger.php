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

class Debugger
{
    public static function info($object, $message =  '', $file = '') {

        if(Settings::$debugEnabled) {

            if($file == '') {
                $file = "apiModule_" . date('Y-m-d') . ".log";
            }

            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/' . $file);
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info($message . print_r(Sanitizer::sanitizeRequest($object), true));
            
        }

    }
}