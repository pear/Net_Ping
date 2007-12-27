<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (64.233.167.99): 56 data bytes";
$input[] = "64 bytes from 64.233.167.99: icmp_seq=0 ttl=248 time=1.763 ms";
$input[] = "64 bytes from 64.233.167.99: icmp_seq=1 ttl=248 time=1.752 ms";
$input[] = "64 bytes from 64.233.167.99: icmp_seq=2 ttl=248 time=1.903 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 1.752/1.806/1.903/0.069 ms";

$expect['min'] = 1.752;
$expect['avg'] = 1.806;
$expect['max'] = 1.903;
$expect['stddev'] = 0.069;
$expect['ttl'] = 248;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '64.233.167.99';
$expect['icmpseq'][0] = 1.763;
$expect['icmpseq'][1] = 1.752;
$expect['icmpseq'][2] = 1.903;

?>