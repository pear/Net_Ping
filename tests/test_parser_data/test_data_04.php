<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING oracle.com: (148.87.9.44): 56 data bytes";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=0 ttl=245 time=891 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=1 ttl=245 time=882 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=2 ttl=245 time=868 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=3 ttl=245 time=848 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=5 ttl=245 time=820 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=7 ttl=245 time=773 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=8 ttl=245 time=855 ms";
$input[] = "64 bytes from 148.87.9.44: icmp_seq=9 ttl=245 time=865 ms";
$input[] = "";-
$input[] = "---oracle.com PING Statistics----";
$input[] = "10 packets transmitted, 10 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max = 773/848/891 ms";

$expect['min'] = 773;
$expect['avg'] = 848;
$expect['max'] = 891;
$expect['stddev'] = NULL;
$expect['ttl'] = 245;
$expect['bytesperreq'] = 64;
$expect['received'] = 10;
$expect['transmitted'] = 10;
$expect['loss'] = 0;
$expect['bytestotal'] = 640;
$expect['targetip'] = '148.87.9.44';
$expect['icmpseq'][0] = 891;
$expect['icmpseq'][1] = 882;
$expect['icmpseq'][2] = 868;
$expect['icmpseq'][3] = 848;
$expect['icmpseq'][5] = 820;
$expect['icmpseq'][7] = 773;
$expect['icmpseq'][8] = 855;
$expect['icmpseq'][9] = 865;

?>