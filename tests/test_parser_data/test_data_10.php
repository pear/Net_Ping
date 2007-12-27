<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING 10.134.33.137: (10.134.33.137): 56 data bytes";
$input[] = "64 bytes from 10.134.33.137: icmp_seq=0 ttl=61 time=0 ms";
$input[] = "64 bytes from 10.134.33.137: icmp_seq=1 ttl=61 time=0 ms";
$input[] = "64 bytes from 10.134.33.137: icmp_seq=2 ttl=61 time=0 ms";
$input[] = "";
$input[] = "----10.134.33.137 PING Statistics----";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max = 0/0/0 ms";

$expect['min'] = 0;
$expect['avg'] = 0;
$expect['max'] = 0;
$expect['ttl'] = 61;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '10.134.33.137';
$expect['icmpseq'][0] = 0;
$expect['icmpseq'][1] = 0;
$expect['icmpseq'][2] = 0;

?>