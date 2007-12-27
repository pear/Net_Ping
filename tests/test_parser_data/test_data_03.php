<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "PING example.com (192.0.34.166): 56 data bytes";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=0 ttl=49 time=255.62 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=1 ttl=49 time=277.685 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=2 ttl=49 time=342.039 ms";
$input[] = "64 bytes from 192.0.34.166: icmp_seq=3 ttl=49 time=290.769 ms";
$input[] = "";
$input[] = "--- example.com ping statistics ---";
$input[] = "4 packets transmitted, 4 packets received, 0% packet loss";
$input[] = "round-trip min/avg/max = 255.62/291.528/342.039 ms";

$expect['min'] = 255.62;
$expect['avg'] = 291.528;
$expect['max'] = 342.039;
$expect['stddev'] = NULL;
$expect['ttl'] = 49;
$expect['bytesperreq'] = 64;
$expect['received'] = 4;
$expect['transmitted'] = 4;
$expect['loss'] = 0;
$expect['bytestotal'] = 256;
$expect['targetip'] = '192.0.34.166';
$expect['icmpseq'][0] = 255.62;
$expect['icmpseq'][1] = 277.685;
$expect['icmpseq'][2] = 342.039;
$expect['icmpseq'][3] = 290.769;

?>