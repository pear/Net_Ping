<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (64.233.167.147) 56(84) bytes of data.";
$input[] = "64 bytes from py-in-f147.google.com (64.233.167.147): icmp_seq=1 ttl=240 time=68.2 ms";
$input[] = "64 bytes from py-in-f147.google.com (64.233.167.147): icmp_seq=2 ttl=240 time=65.7 ms";
$input[] = "64 bytes from py-in-f147.google.com (64.233.167.147): icmp_seq=3 ttl=240 time=65.0 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 2000ms";
$input[] = "rtt min/avg/max/mdev = 65.056/66.321/68.202/1.356 ms";

$expect['min'] = 65.056;
$expect['avg'] = 66.321;
$expect['max'] = 68.202;
$expect['stddev'] = 1.356;
$expect['ttl'] = 240;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '64.233.167.147';
$expect['icmpseq'][1] = 68.2;
$expect['icmpseq'][2] = 65.7;
$expect['icmpseq'][3] = 65.0;

?>