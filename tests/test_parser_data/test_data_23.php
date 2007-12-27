<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (209.85.135.99) 56(84) bytes of data.";
$input[] = "64 bytes from mu-in-f99.google.com (209.85.135.99): icmp_seq=1 ttl=246 time=76.9 ms";
$input[] = "64 bytes from mu-in-f99.google.com (209.85.135.99): icmp_seq=2 ttl=246 time=179 ms";
$input[] = "64 bytes from mu-in-f99.google.com (209.85.135.99): icmp_seq=3 ttl=246 time=74.1 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 1999ms";
$input[] = "rtt min/avg/max/mdev = 74.137/110.333/179.887/49.195 ms";

$expect['min'] = 74.137;
$expect['avg'] = 110.333;
$expect['max'] = 179.887;
$expect['stddev'] = 49.195;
$expect['ttl'] = 246;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '209.85.135.99';
$expect['icmpseq'][1] = 76.9;
$expect['icmpseq'][2] = 179;
$expect['icmpseq'][3] = 74.1;

?>