<?php
// $Id$

// Define $input to be an array containing all of the output from some
// ping command

$input[] = "";
$input[] = "Ping www.l.google.com [209.85.129.147] mit 32 Bytes Daten: ";
$input[] = "";
$input[] = "Zeitberschreitung der Anforderung. ";
$input[] = "Zeitberschreitung der Anforderung. ";
$input[] = "Zeitberschreitung der Anforderung. ";
$input[] = "";
$input[] = "Ping-Statistik fr 209.85.129.147: ";
$input[] = "Pakete: Gesendet = 3, Empfangen = 0, Verloren = 3 (100% Verlust), ";

$expect['bytesperreq'] = 40; // 32b data plus 8b header (presumed)
$expect['received'] = 0;
$expect['transmitted'] = 3;
$expect['loss'] = 100;
$expect['bytestotal'] = 120;
$expect['targetip'] = '209.85.129.147';

?>