<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

// NOTE:
// - this is a sample of a ping in "flood" mode. Where it doesn't
//   produce output for each packet, but does send them fast enough
//   that many are often dropped.
// - it also has no "middle divider" blank line so the parser will
//   end up using the entire output as the "upper" and "lower"
//   portions further torturing the algorithms

$input[] = "PING www.l.google.com (64.233.169.147): 56 data bytes";
$input[] = "..........";
$input[] = "--- www.l.google.com ping statistics ---";
$input[] = "25 packets transmitted, 17 packets received, 32% packet loss";
$input[] = "round-trip min/avg/max/stddev = 34.424/43.360/61.058/7.068 ms";

$expect['bytesperreq'] = 64;
$expect['received'] = 17;
$expect['transmitted'] = 25;
$expect['loss'] = 32;
$expect['bytestotal'] = 1600;
$expect['targetip'] = '64.233.169.147';

?>