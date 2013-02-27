<?php
  require_once "Net/Ping.php";
  $ping = Net_Ping::factory();
  if(PEAR::isError($ping)) {
    echo $ping->getMessage();
  } else {
    $ping->setArgs(array('count' => 2));
    var_dump($ping->ping('example.com'));
  }
?>
