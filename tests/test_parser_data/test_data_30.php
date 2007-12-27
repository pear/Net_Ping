<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (209.85.129.104) 56(84) bytes of data.";
$input[] = "64 bytes from fk-in-f104.google.com (209.85.129.104): icmp_seq=1 ttl=245 time=21.3 ms";
$input[] = "64 bytes from fk-in-f104.google.com (209.85.129.104): icmp_seq=2 ttl=245 time=20.7 ms";
$input[] = "64 bytes from fk-in-f104.google.com (209.85.129.104): icmp_seq=3 ttl=245 time=21.5 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 received, 0% packet loss, time 1999ms";
$input[] = "rtt min/avg/max/mdev = 20.793/21.234/21.575/0.367 ms";

$expect['min'] = 20.793;
$expect['avg'] = 21.234;
$expect['max'] = 21.575;
$expect['stddev'] = 0.367;
$expect['ttl'] = 245;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '209.85.129.104';
$expect['icmpseq'][1] = 21.3;
$expect['icmpseq'][2] = 20.7;
$expect['icmpseq'][3] = 21.5;

?>