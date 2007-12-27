<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (72.14.209.99): 56 data bytes";
$input[] = "64 bytes from 72.14.209.99: icmp_seq=0 ttl=239 time=119.040 ms";
$input[] = "64 bytes from 72.14.209.99: icmp_seq=1 ttl=239 time=101.597 ms";
$input[] = "64 bytes from 72.14.209.99: icmp_seq=2 ttl=239 time=106.619 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 101.597/109.085/119.040/7.332 ms";

$expect['min'] = 101.597;
$expect['avg'] = 109.085;
$expect['max'] = 119.040;
$expect['stddev'] = 7.332;
$expect['ttl'] = 239;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '72.14.209.99';
$expect['icmpseq'][0] = 119.040;
$expect['icmpseq'][1] = 101.597;
$expect['icmpseq'][2] = 106.619;

?>