<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[]="PING example.com: 64 byte packets";
$input[]="64 bytes from 192.0.34.166: icmp_seq=0. time=257. ms";
$input[]="64 bytes from 192.0.34.166: icmp_seq=1. time=280. ms";
$input[]="64 bytes from 192.0.34.166: icmp_seq=2. time=231. ms";
$input[]="";
$input[]="----example.com PING Statistics----";
$input[]="3 packets transmitted, 3 packets received, 0% packet loss";
$input[]="round-trip (ms)  min/avg/max = 231/256/280";

$expect['min'] = 231;
$expect['max'] = 280;
$expect['avg'] = 256;
$expect['stddev'] = NULL;
$expect['ttl'] = NULL;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '192.0.34.166';
$expect['icmpseq'][0] = 257;
$expect['icmpseq'][1] = 280;
$expect['icmpseq'][2] = 231;

?>