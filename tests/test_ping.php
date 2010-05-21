<?php
// $Id$

// This program runs a real ping test against the argument you specify.
// Run this PHP program from the directory where it resides. (Because it
// tests the Ping.php in it's parent directory.) That's most likely
// accomplished by simply saying:
//
//   $ php -q ./test_ping.php some.thing.toping
//
// However, if your command line PHP complains it cannot find PEAR.php,
// remember that you can set "ini variables" at the command line with:
//
//   $ php -d include_path=/path/to/pear/install -q ./test_ping.php some.thing.toping
//
// And as a last attempt to be helpful... if you're wondering where
// PEAR is installed, look for the value of "PEAR directory" in
// Pear's configuration:
//
//   $ pear config-show

error_reporting(E_ALL|E_NOTICE);

require_once 'Net/Ping.php';

if ( !isset($argv) || count($argv)<2 || '' == $argv[1] ) {
?>
I was expecting the name of some host to ping as an argument.
(There's lot of help in the comments at the top of this program.)
<?php
    exit;
}
$host = $argv[1];

$ping = Net_Ping::factory();

if ( PEAR::isError($ping) ) {
    echo $ping->getMessage();
}
else {
    $ping->setArgs(array('count' => 5));
    print("this can take a few seconds; probably 5-10 seconds...\n");
    $ping->ping($host);
    print_r($ping);
}

?>
