<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (72.14.221.147) 56(84) bytes of data.";
$input[] = "64 bytes from fg-in-f147.google.com (72.14.221.147): icmp_seq=1 ttl=247 time=3.98 ms";
$input[] = "64 bytes from fg-in-f147.google.com (72.14.221.147): icmp_seq=2 ttl=247 time=4.26 ms";
$input[] = "64 bytes from fg-in-f147.google.com (72.14.221.147): icmp_seq=3 ttl=247 time=4.36 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 2016ms";
$input[] = "rtt min/avg/max/mdev = 3.989/4.206/4.367/0.159 ms";

$expect['min'] = 3.989;
$expect['avg'] = 4.206;
$expect['max'] = 4.367;
$expect['stddev'] = 0.159;
$expect['ttl'] = 247;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '72.14.221.147';
$expect['icmpseq'][1] = 3.98;
$expect['icmpseq'][2] = 4.26;
$expect['icmpseq'][3] = 4.36;

?>