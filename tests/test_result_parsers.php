<?php
error_reporting(E_ALL);
require_once "Net/Ping.php";

$err = false;

function failure($os, $function)
{
  global $err;
 
  $err = true;
  return "Failure parsing ".$os." result: ".$function."\n";;
}

//$oses = array('linux', 'freebsd', 'netbsd', 'openbsd', 'darwin', 'hpux', 'aix', 'windows');
$oses = array('hpux', 'aix');

$result['aix'][] = "PING oracle.com: (148.87.9.44): 56 data bytes";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=0 ttl=245 time=891 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=1 ttl=245 time=882 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=2 ttl=245 time=868 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=3 ttl=245 time=848 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=4 ttl=245 time=863 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=5 ttl=245 time=820 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=6 ttl=245 time=816 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=7 ttl=245 time=773 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=8 ttl=245 time=855 ms";
$result['aix'][] = "64 bytes from 148.87.9.44: icmp_seq=9 ttl=245 time=865 ms";
$result['aix'][] = "";-
$result['aix'][] = "---oracle.com PING Statistics----";
$result['aix'][] = "10 packets transmitted, 10 packets received, 0% packet loss";
$result['aix'][] = "round-trip min/avg/max = 773/848/891 ms";

$expect['aix']['min'] = 773;
$expect['aix']['avg'] = 848;
$expect['aix']['max'] = 891;
$expect['aix']['ttl'] = 245;
$expect['aix']['bytesperreq'] = 64;
$expect['aix']['received'] = 10;
$expect['aix']['transmitted'] = 10;
$expect['aix']['bytestotal'] = 640;
$expect['aix']['targetip'] = '148.87.9.44';


$result['hpux'][]="PING example.com: 64 byte packets";
$result['hpux'][]="64 bytes from 192.0.34.166: icmp_seq=0. time=257. ms";
$result['hpux'][]="64 bytes from 192.0.34.166: icmp_seq=1. time=280. ms";
$result['hpux'][]="64 bytes from 192.0.34.166: icmp_seq=2. time=231. ms";
$result['hpux'][]="";
$result['hpux'][]="----example.com PING Statistics----";
$result['hpux'][]="3 packets transmitted, 3 packets received, 0% packet loss";
$result['hpux'][]="round-trip (ms)  min/avg/max = 231/256/280";

$expect['hpux']['min'] = 231;
$expect['hpux']['max'] = 280;
$expect['hpux']['avg'] = 256;
$expect['hpux']['ttl'] = NULL;
$expect['hpux']['bytesperreq'] = 64;
$expect['hpux']['received'] = 3;
$expect['hpux']['transmitted'] = 3;
$expect['hpux']['bytestotal'] = 192;
$expect['hpux']['targetip'] = NULL;

function test_net_ping($os, $result, $expect)
{
  $ping = Net_Ping_Result::factory($result, $os);

  if(PEAR::isError($ping) ) {
    echo failure($os, "factory()");
  }

  if( $expect['min'] !== $ping->getMin() ) {
    echo failure($os, "getMin()");
  }

  if( $expect['avg'] !== $ping->getAvg() ) {
    echo failure($os, "getAvg()");
  }

  if( $expect['max'] !== $ping->getMax() ) {
    echo failure($os, "getMax()");
  }

  if( $os !== $ping->getSystemName() ) {
    echo failure($os, "getSystemName()");
  }

  if( $expect['ttl'] !== $ping->getTTL() ) {
    echo failure($os, "getTTL()");
  }

  if( !is_array($ping->getICMPSequence()) ) {
    echo failure($os, "getICMPSequence()");
  }

  if( $expect['transmitted'] !== $ping->getTransmitted() ) {
    echo failure($os, "getTransmitted()");
  }

  if( $expect['received'] !== $ping->getReceived() ) {
    echo failure($os, "getReceived()");
  }

  if( $expect['bytesperreq'] !== $ping->getBytesPerRequest() ) {
    echo failure($os, "getBytesPerRequest()");
  }

  if( $expect['bytestotal'] !== $ping->getBytesTotal() ) {
    echo failure($os, "getBytesTotal()");
  }

  if( $expect['targetip'] !== $ping->getTargetIp() ) {
    echo failure($os, "getTargetIp()");
  }
}

foreach($oses AS $os) {
  test_net_ping($os, $result[$os], $expect[$os]);
}

if (true == $err) {
  echo "Testcases failed, see the errors above for details\n";
} else {
  echo "Testcases went through just fine, just go ahead :)\n";
}
?>