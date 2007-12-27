<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (66.249.93.147) 56(84) bytes of data.";
$input[] = "64 bytes from ug-in-f147.google.com (66.249.93.147): icmp_seq=1 ttl=247 time=5.17 ms";
$input[] = "64 bytes from ug-in-f147.google.com (66.249.93.147): icmp_seq=2 ttl=247 time=6.23 ms";
$input[] = "64 bytes from ug-in-f147.google.com (66.249.93.147): icmp_seq=3 ttl=247 time=6.01 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 2001ms";
$input[] = "rtt min/avg/max/mdev = 5.179/5.807/6.232/0.461 ms";

$expect['min'] = 5.179;
$expect['avg'] = 5.807;
$expect['max'] = 6.232;
$expect['stddev'] = 0.461;
$expect['ttl'] = 247;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '66.249.93.147';
$expect['icmpseq'][1] = 5.17;
$expect['icmpseq'][2] = 6.23;
$expect['icmpseq'][3] = 6.01;

?>