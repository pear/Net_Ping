<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (72.14.221.104) 56(84) bytes of data.";
$input[] = "64 bytes from fg-in-f104.google.com (72.14.221.104): icmp_seq=1 ttl=245 time=31.5 ms";
$input[] = "64 bytes from fg-in-f104.google.com (72.14.221.104): icmp_seq=2 ttl=245 time=53.6 ms";
$input[] = "64 bytes from fg-in-f104.google.com (72.14.221.104): icmp_seq=3 ttl=245 time=32.0 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 2000ms";
$input[] = "rtt min/avg/max/mdev = 31.579/39.088/53.636/10.288 ms";

$expect['min'] = 31.579;
$expect['avg'] = 39.088;
$expect['max'] = 53.636;
$expect['stddev'] = 10.288;
$expect['ttl'] = 245;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '72.14.221.104';
$expect['icmpseq'][1] = 31.5;
$expect['icmpseq'][2] = 53.6;
$expect['icmpseq'][3] = 32.0;

?>