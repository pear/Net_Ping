<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (72.14.221.99): 56 data bytes";
$input[] = "64 bytes from 72.14.221.99: icmp_seq=0 ttl=248 time=65.601 ms";
$input[] = "64 bytes from 72.14.221.99: icmp_seq=1 ttl=248 time=67.095 ms";
$input[] = "64 bytes from 72.14.221.99: icmp_seq=2 ttl=248 time=66.448 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 65.601/66.381/67.095/0.612 ms";

$expect['min'] = 65.601;
$expect['avg'] = 66.381;
$expect['max'] = 67.095;
$expect['stddev'] = 0.612;
$expect['ttl'] = 248;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '72.14.221.99';
$expect['icmpseq'][0] = 65.601;
$expect['icmpseq'][1] = 67.095;
$expect['icmpseq'][2] = 66.448;

?>