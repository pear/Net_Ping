<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING example.com (192.0.34.166): 56 data bytes";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=0 ttl=49 time=174.300 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=1 ttl=49 time=174.174 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=2 ttl=49 time=181.501 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=3 ttl=49 time=184.189 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=4 ttl=49 time=205.475 ms";
$input[] = "";
$input[] = "--- example.com ping statistics ---";
$input[] = "5 packets transmitted, 5 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 174.174/183.928/205.475/11.472 ms";

$expect['min'] = 174.174;
$expect['avg'] = 183.928;
$expect['max'] = 205.475;
$expect['stddev'] = 11.472;
$expect['ttl'] = 49;
$expect['bytesperreq'] = 64;
$expect['received'] = 5;
$expect['transmitted'] = 5;
$expect['loss'] = 0;
$expect['bytestotal'] = 320;
$expect['targetip'] = '192.0.34.166';
$expect['icmpseq'][0] = 174.300;
$expect['icmpseq'][1] = 174.174;
$expect['icmpseq'][2] = 181.501;
$expect['icmpseq'][3] = 184.189;
$expect['icmpseq'][4] = 205.475;


?>