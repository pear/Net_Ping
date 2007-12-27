<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (64.233.183.104) 56(84) bytes of data.";
$input[] = "64 bytes from nf-in-f104.google.com (64.233.183.104): icmp_seq=1 ttl=243 time=66.0 ms";
$input[] = "64 bytes from nf-in-f104.google.com (64.233.183.104): icmp_seq=2 ttl=243 time=66.5 ms";
$input[] = "64 bytes from nf-in-f104.google.com (64.233.183.104): icmp_seq=3 ttl=243 time=67.0 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 2007ms";
$input[] = "rtt min/avg/max/mdev = 66.009/66.556/67.064/0.431 ms";

$expect['min'] = 66.009;
$expect['avg'] = 66.556;
$expect['max'] = 67.064;
$expect['stddev'] = 0.431;
$expect['ttl'] = 243;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '64.233.183.104';
$expect['icmpseq'][1] = 66.0;
$expect['icmpseq'][2] = 66.5;
$expect['icmpseq'][3] = 67.0;

?>