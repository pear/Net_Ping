<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
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
// |          Tomas V.V.Cox <cox@idecnet.com>                             |
// |                                                                      |
// +----------------------------------------------------------------------+
//
// $Id$

define('PING_FAILED', 'execution of ping failed');
define('PING_HOST_NOT_FOUND', 'unknown host');

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
* @version  $Revision$
* @package  Net
* @access   public
*/
class Net_Ping
{

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
    * @param  string    $host           hostname
    * @param  int       $count          count of the pings
    * @param  int       $packet_size    ping packet size
    * @param  bool      $quiet          to set or not the "-q" ping param
    * @param  int       $maxwait        seconds to wait for a response
    * @return mixed  String on error or array with the result
    * @access public
    */
    function ping($host, $counts = 5, $packet_size = 32, $quiet = false, $maxwait = 10)
    {
        $q = $quiet ? '-q' : '';
        $cmd = $this->ping_path." $q -c $counts -s $packet_size -w $maxwait $host";

        exec($cmd, $result);

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

    /**
    * Check if a host is up by pinging it
    *
    * @param string $host   The host to test
    * @param bool $severely If some of the packages did reach the host
    *                       and severely is false the function will return true
    * @return bool True on success or false otherwise
    *
    * @notes Output taken from ping of netkit-base-0.10-37
    */
    function checkHost($host, $severely = true)
    {
        $res = $this->ping($host, 10, 32, true);
        if ($res == PING_HOST_NOT_FOUND) {
            return false;
        }
        $line = preg_split('|\s+|', $res[3]);
        if (!is_numeric($line[0]) || !is_numeric($line[3]) ||
            $line[2] != 'transmitted,' || $line[5] != 'received,') {
            ob_start();
            var_dump($line);
            $rep = ob_get_contents();
            ob_end_clean();
            trigger_error("Output format seems not to be supported, please report ".
                          "the following to pear-dev@lists.php.net, including your ".
                          "version of ping or netkit-base:\n $rep");
            return false;
        }
        // [0] => transmitted, [3] => received
        if ($line[0] != $line[3]) {
            if ($line[3] == 0 || $severely) {
                return false;
            }
        }
        return true;
    }
}
?>
