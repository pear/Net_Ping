<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] ="PING example.com (192.0.34.166): 56 data bytes";
$input[] ="64 bytes from 192.0.34.166: icmp_seq=0 ttl=53 time=385.571 ms";
$input[] ="64 bytes from 192.0.34.166: icmp_seq=1 ttl=53 time=173.176 ms";
$input[] ="64 bytes from 192.0.34.166: icmp_seq=2 ttl=53 time=173.338 ms";
$input[] ="64 bytes from 192.0.34.166: icmp_seq=3 ttl=53 time=173.915 ms";
$input[] ="64 bytes from 192.0.34.166: icmp_seq=4 ttl=53 time=172.543 ms";
$input[] ="";
$input[] ="----example.com PING Statistics----";
$input[] ="5 packets transmitted, 5 packets received, 0.0% packet loss";
$input[] ="round-trip min/avg/max/stddev = 172.543/215.709/385.571/94.957 ms";

$expect['min'] = 172.543;
$expect['avg'] = 215.709;
$expect['max'] = 385.571;
$expect['stddev'] = 94.957;
$expect['ttl'] = 53;
$expect['bytesperreq'] = 64;
$expect['received'] = 5;
$expect['transmitted'] = 5;
$expect['loss'] = 0;
$expect['bytestotal'] = 320;
$expect['targetip'] = '192.0.34.166';
$expect['icmpseq'][0] = 385.571;
$expect['icmpseq'][1] = 173.176;
$expect['icmpseq'][2] = 173.338;
$expect['icmpseq'][3] = 173.915;
$expect['icmpseq'][4] = 172.543;

?>