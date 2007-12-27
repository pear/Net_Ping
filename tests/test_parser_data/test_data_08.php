<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "";
$input[] = "Pinging 209.92.3.80 with 32 bytes of data:";
$input[] = "";
$input[] = "Request timed out.";
$input[] = "Request timed out.";
$input[] = "Request timed out.";
$input[] = "";
$input[] = "Ping statistics for 209.92.3.80:";
$input[] = "    Packets: Sent = 3, Received = 0, Lost = 3 (100% loss),";

$expect['bytesperreq'] = 40; // 32b data plus 8b icmp header
$expect['received'] = 0;
$expect['transmitted'] = 3;
$expect['loss'] = 100;
$expect['bytestotal'] = 120;
$expect['targetip'] = '209.92.3.80';

?>