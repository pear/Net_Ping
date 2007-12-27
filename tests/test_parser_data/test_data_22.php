<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING 209.92.3.80: (209.92.3.80): 56 data bytes";
$input[] = "";
$input[] = "----209.92.3.80 PING Statistics----";
$input[] = "3 packets transmitted, 0 packets received, 100% packet loss";

$expect['bytesperreq'] = 64;
$expect['received'] = 0;
$expect['transmitted'] = 3;
$expect['loss'] = 100;
$expect['bytestotal'] = 192;
$expect['targetip'] = '209.92.3.80';

?>