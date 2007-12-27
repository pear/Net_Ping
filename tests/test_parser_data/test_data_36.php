<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

// NOTE:
// These are *large* data payload combined with ping's "preload"
// feature to send a burst of packets leading to a lot of drops.

$input[] = "PING 209.92.3.80 (209.92.3.80): 4096 data bytes";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=5 ttl=51 time=514.913 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=6 ttl=51 time=555.432 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=7 ttl=51 time=639.796 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=8 ttl=51 time=728.011 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=9 ttl=51 time=810.509 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=10 ttl=51 time=895.370 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=11 ttl=51 time=984.419 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=12 ttl=51 time=1067.159 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=13 ttl=51 time=1150.382 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=14 ttl=51 time=1242.781 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=15 ttl=51 time=1315.147 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=16 ttl=51 time=1404.939 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=17 ttl=51 time=1484.208 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=18 ttl=51 time=1574.106 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=19 ttl=51 time=1655.877 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=20 ttl=51 time=1739.097 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=22 ttl=51 time=1903.032 ms";
$input[] = "4104 bytes from 209.92.3.80: icmp_seq=23 ttl=51 time=1989.882 ms";
$input[] = "";
$input[] = "--- 209.92.3.80 ping statistics ---";
$input[] = "25 packets transmitted, 18 packets received, 28% packet loss";
$input[] = "round-trip min/avg/max/stddev = 514.913/1203.059/1989.882/448.873 ms";

$expect['min'] = 514.913;
$expect['avg'] = 1203.059;
$expect['max'] = 1989.882;
$expect['stddev'] = 448.873;
$expect['ttl'] = 51;
$expect['bytesperreq'] = 4104;
$expect['received'] = 18;
$expect['transmitted'] = 25;
$expect['loss'] = 28;
$expect['bytestotal'] = 102600;
$expect['targetip'] = '209.92.3.80';
$expect['icmpseq'][5] = 514.913;
$expect['icmpseq'][6] = 555.432;
$expect['icmpseq'][7] = 639.796;
$expect['icmpseq'][8] = 728.011;
$expect['icmpseq'][9] = 810.509;
$expect['icmpseq'][10] = 895.370;
$expect['icmpseq'][11] = 984.419;
$expect['icmpseq'][12] = 1067.159;
$expect['icmpseq'][13] = 1150.382;
$expect['icmpseq'][14] = 1242.781;
$expect['icmpseq'][15] = 1315.147;
$expect['icmpseq'][16] = 1404.939;
$expect['icmpseq'][17] = 1484.208;
$expect['icmpseq'][18] = 1574.106;
$expect['icmpseq'][19] = 1655.877;
$expect['icmpseq'][20] = 1739.097;
$expect['icmpseq'][22] = 1903.032;
$expect['icmpseq'][23] = 1989.882;

?>