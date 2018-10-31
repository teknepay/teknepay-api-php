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

class GatewayTransport {

    public static function submit($host, $t_request) {

        Debugger::info($host, "HOST:  [" . __FUNCTION__ . " in file " . __FILE__ . "]");
        Debugger::info($t_request,  "REQUEST: [" . __FUNCTION__ . " in file " . __FILE__ . "]");

        #############################################################
        $process = curl_init();

        curl_setopt($process, CURLOPT_URL, $host);
        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($t_request));
        curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($process);
        $error = curl_error($process);
        curl_close($process);

        Debugger::info(json_decode($response), "GATEWAY RESPONSE: [" . __FUNCTION__ . " in file " . __FILE__ . "]");		
        #############################################################

        if ($response === false) {
          throw new \Exception("cURL error " . $error . " [" . $host . "]");
        }

        return $response;
    }
}
?>
