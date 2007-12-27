<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (66.249.93.99): 56 data bytes";
$input[] = "64 bytes from 66.249.93.99: icmp_seq=0 ttl=247 time=5.704 ms";
$input[] = "64 bytes from 66.249.93.99: icmp_seq=1 ttl=247 time=5.524 ms";
$input[] = "64 bytes from 66.249.93.99: icmp_seq=2 ttl=247 time=5.712 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 5.524/5.647/5.712/0.087 ms";

$expect['min'] = 5.524;
$expect['avg'] = 5.647;
$expect['max'] = 5.712;
$expect['stddev'] = 0.087;
$expect['ttl'] = 247;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '66.249.93.99';
$expect['icmpseq'][0] = 5.704;
$expect['icmpseq'][1] = 5.524;
$expect['icmpseq'][2] = 5.712;

?>