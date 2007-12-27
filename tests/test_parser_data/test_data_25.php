<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (209.85.129.104): 56 data bytes";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 0 packets received, 100% packet loss";

$expect['bytesperreq'] = 64;
$expect['received'] = 0;
$expect['transmitted'] = 3;
$expect['loss'] = 100;
$expect['bytestotal'] = 192;
$expect['targetip'] = '209.85.129.104';

?>