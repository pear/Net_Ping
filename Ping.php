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
// |          Jan Lehnardt  <jan@php.net>                                 |
// |                                                                      |
// +----------------------------------------------------------------------+
//
// $Id$

require_once "PEAR.php";
require_once "OS/Guess.php";

define('PING_FAILED', 'execution of ping failed');
define('PING_HOST_NOT_FOUND', 'unknown host');
define('PING_INVALID_ARGUMENTS', 'invalid argument array');

/**************************TODO*******************************************/
/*
return an object with ping results, make raw, ping data optional
*/

/**
* Wrapper class for ping calls
*
* Usage:
*
* <?php
*   require_once "Net_Ping/Ping.php";
*   $ping = new Net_Ping;
*   $ping->setArgs(array("count" => 5),
*                        "size"  => 32),
*                        "ttl"   => 512)
*                        )
*                  );      
*   var_dump($ping->ping("example.com"));
* ?>
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
    *
    * @var string
    * @access private
    */
    var $_ping_path = "";

    /**
    * Array with the result from the ping execution
    *
    * @var array
    * @access private
    */
    var $_result = array();
   
    /**
    * OS_Guess instance
    *
    * @var object
    * @access private
    */
    var $_OS_Guess = "";
    
    /**
    * OS_Guess->getSysname result
    *
    * @var string
    * @access private
    */
    var $_sysname = "";
    
    /**
    * Ping command arguments
    *
    * @var array
    * @access private
    */
    var $_args = array();
    
    /**
    * Indicates if an empty array was given to setArgs (not used yet)
    *
    * @var boolean
    * @access private
    */
    var $_noArgs = true;

    /**
    * Contains the argument->option relation
    * 
    * @var array
    * @access private
    */
    var $_argRelation = array();

    
    /**
    * Constructor for the Class
    *
    * @access private
    */
    function Net_Ping()
    {
        $this->_OS_Guess = new OS_Guess;    
        $this->_sysname  = $this->_OS_Guess->getSysname();
        
        $this->_setPingPath();
        $this->_initArgRelation();
    }

    /**
    * Set the arguments array
    *
    * @param array $args Hash with options
    * @return mixed true or PEAR_error
    * @access public
    */
    function setArgs($args)
    {
        if (!is_array($args)) {
            return PEAR::raiseError(PING_INVALID_ARGUMENTS);
        }
        
        /* accept empty arrays, but set flag*/
        if (0 == count($args)) {
            $this->_noArgs = true;
        } else {
           $this->_noArgs = false;
        }
        
        $this->_args = $args;
        
        return true;
    }
    
    /**
    * Sets the system's path to the ping binary
    *
    * @access private
    */
    function _setPingPath()
    {
        if ("windows" == $this->_sysname) {
            $this->_ping_path = "ping";
        } else {
            $this->_ping_path = exec("which ping"); /* FIXME: windows */
        }    
        
    }
    
    /**
    * Creates the argument list according to platform differences
    *
    * @return string Argument line
    * @access private
    */
    function _createArgList()
    {
        $retval     = array();
        
        $timeout    = "";
        $iface      = "";
        $ttl        = "";
        $count      = "";
        $quiet      = "";
        $size       = "";
        $seq        = "";
        
        foreach($this->_args AS $option => $value) {
            if(!empty($option) && NULL != $this->_argRelation[$this->_sysname][$option]) {
                ${$option} = $this->_argRelation[$this->_sysname][$option]." ".$value." ";
             }   
        }
        
        switch($this->_sysname) {

        case "sunos":
             if ($size || $count || $iface) {
                 /* $size and $count must be _both_ defined */
                 $seq = " -s ";
                 if ($size == "") {
                     $size = " 56 ";
                 }
                 if ($count == "") {
                     $count = " 5 ";
                 }
             }
             $retval[0] = $iface.$seq.$ttl;
             $retval[1] = $size.$count;
             break;

        case "freebsd":
             $retval[0] = $quiet.$count.$ttl.$timeout;
             $retval[1] = "";
             break;

        case "netbsd":
             $retval[0] = $quiet.$count.$iface.$size.$ttl.$timeout;
             $retval[1] = "";
             break;
             
        case "linux":
             $retval[0] = $quiet.$count.$ttl.$size.$timeout;
             $retval[1] = "";
             break;
        
        case "windows":
             $retval[0] = $count.$ttl.$timeout;
             $retval[1] = "";
             break;     
             
        default:
             $retval[0] = "";
             $retval[1] = "";
             break;
        }

        return($retval); 
    }
  
    /**
    * Execute ping
    *
    * @param  string    $host   hostname
    * @return mixed  String on error or array with the result
    * @access public
    */
    function ping($host)
    {
      
        $argList = $this->_createArgList();
        $cmd = $this->_ping_path." ".$argList[0]." ".$host." ".$argList[1];
        exec($cmd, $this->_result);

        if (!is_array($this->_result)) {
            return PING_FAILED;
        }

        if (count($this->_result) == 0) {
            return PING_HOST_NOT_FOUND;
        } else {
            return $this->_result;
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
        $this->setArgs(array("count" => 10,
                             "size"  => 32,
                             "quiet" => null,
                             "timeout" => 10
                             )
                       );
        $res = $this->ping($host);
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

    /**
    * Creates the argument list according to platform differences
    *
    * @return string Argument line
    * @access private
    */
    function _initArgRelation()
    {
        $this->_argRelation = array(
                                    "sunos" => array (
                                                        "timeout"   => NULL,
                                                        "ttl"       => "-t",
                                                        "count"     => " ",
                                                        "quiet"     => "-q",
                                                        "size"      => " ",
                                                        "iface"     => "-i"
                                                        ),
                                    "freebsd" => array (
                                                        "timeout"   => "-t",
                                                        "ttl"       => "-m",
                                                        "count"     => "-c",
                                                        "quiet"     => "-q",
                                                        "size"      => NULL,
                                                        "iface"     => NULL
                                                        ),

                                    "netbsd" => array (
                                                        "timeout"   => "-w",
                                                        "iface"     => "-I",
                                                        "ttl"       => "-T",
                                                        "count"     => "-c",
                                                        "quiet"     => "-q",
                                                        "size"      => "-s"
                                                        ),

                                    "openbsd" => array (
                                                        "timeout"   => "-w",
                                                        "iface"     => "-I",
                                                        "ttl"       => "-t",
                                                        "count"     => "-c",
                                                        "quiet"     => "-q",
                                                        "size"      => "-s"
                                                        ),

 /* we don't know yet what's darwin's signature 
                                    "darwin" => array (
                                                        "timeout"   => "-w",
                                                        "iface"     => "-I",
                                                        "ttl"       => "-t",
                                                        "count"     => "-c",
                                                        "quiet"     => "-q",
                                                        "size"      => NULL
                                                        ),
*/
                                    "linux" => array (
                                                        "timeout"   => "-t",
                                                        "iface"     => NULL,
                                                        "ttl"       => "-m",
                                                        "count"     => "-c",
                                                        "quiet"     => "-q",
                                                        "size"      => NULL
                                                        ),
                                    "windows" => array (
                                                        "timeout"   => "-w",
                                                        "iface"     => NULL,
                                                        "ttl"       => "-i",
                                                        "count"     => "-n",
                                                        "quiet"     => NULL,
                                                        "size"      => NULL
                                                        )

                               );                     

                                                   
    }
}
?>
