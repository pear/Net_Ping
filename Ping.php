<?php
//
// +----------------------------------------------------------------------+
// | PHP version 4.0                                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2001 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Martin Jansen <mj@php.net>                                  |
// +----------------------------------------------------------------------+

/**
* Wrapper class for ping calls
*
* Usage:
*
* <?php
*   require_once "Net_Ping/Ping.php";
*   $ping = new Net_Ping;
*   $ping->ping("yourhosthere");
* ?>
*
* Warning:
*   This code is in a _very_ early state and the
*   api will for sure change in the future.
*
* @author   Martin Jansen <mj@php.net>
* @version  0.1
*/

define(PING_FAILED,"execution of ping failed");
define(HOST_NOT_FOUND,"unknown host");

class Net_Ping {

    /**
    * Location where the ping program is stored
    * @var string
    */
    var $ping_path = "ping";
    
    /**
    * Array with the result from the ping execution
    * @var array
    */
    var $result = array();
        
    /**
    * Execute ping
    *
    * @param  string hostname
    * @param  int
    * @param  int    ping packet size
    * @return mixed  String on error or array with the result
    */
    function ping($host,$counts = 5,$packet_size = 32) {
        
        $param = $this->ping_path." -c ".$counts." -s ".$packet_size." ".$host;
                               
        exec($param, $result);
        
        if (!is_array($result)) {
            return PING_FAILED;
        }
        
        if (count($result) == 0) {
            return HOST_NOT_FOUND;
        } else {
            $this->result = $result;
            return $result;
        }
    }   
    
}
?>