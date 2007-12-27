<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING www.l.google.com (209.85.129.104): 56 data bytes";
$input[] = "64 bytes from 209.85.129.104: icmp_seq=0 ttl=248 time=67.344 ms";
$input[] = "64 bytes from 209.85.129.104: icmp_seq=1 ttl=248 time=66.289 ms";
$input[] = "64 bytes from 209.85.129.104: icmp_seq=2 ttl=248 time=64.838 ms";
$input[] = "";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "3 packets transmitted, 3 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max/stddev = 64.838/66.157/67.344/1.027 ms";

$expect['min'] = 64.838;
$expect['avg'] = 66.157;
$expect['max'] = 67.344;
$expect['stddev'] = 1.027;
$expect['ttl'] = 248;
$expect['bytesperreq'] = 64;
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 192;
$expect['targetip'] = '209.85.129.104';
$expect['icmpseq'][0] = 67.344;
$expect['icmpseq'][1] = 66.289;
$expect['icmpseq'][2] = 64.838;

?>