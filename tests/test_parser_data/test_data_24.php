<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "";
$input[] = "Ping www.l.google.com [209.85.129.147] mit 32 Bytes Daten:";
$input[] = "";
$input[] = "Antwort von 209.85.129.147: Bytes=32 Zeit=22ms TTL=246";
$input[] = "Antwort von 209.85.129.147: Bytes=32 Zeit=22ms TTL=246";
$input[] = "Antwort von 209.85.129.147: Bytes=32 Zeit=21ms TTL=246";
$input[] = "";
$input[] = "Ping-Statistik fr 209.85.129.147:";
$input[] = "Pakete: Gesendet = 3, Empfangen = 3, Verloren = 0 (0% Verlust),";
$input[] = "Ca. Zeitangaben in Millisek.:";
$input[] = "Minimum = 21ms, Maximum = 22ms, Mittelwert = 21ms";

$expect['min'] = 21;
$expect['avg'] = 21;
$expect['max'] = 22;
$expect['ttl'] = 246;
$expect['bytesperreq'] = 32; // expicitly stated in success packet lines
$expect['received'] = 3;
$expect['transmitted'] = 3;
$expect['loss'] = 0;
$expect['bytestotal'] = 96;
$expect['targetip'] = '209.85.129.147';
$expect['icmpseq'][1] = 22; // generated seq nums
$expect['icmpseq'][2] = 22;
$expect['icmpseq'][3] = 21;

?>