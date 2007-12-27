<?php
// $Id$

// This program doesn't do anything with the network. It simply uses the
// Net_Ping_Result class to parse various stored sets of output from
// various Ping commands against expected results. (See the
// 'test_parser_data' sub-directory.)
//
// Run this PHP program from the directory where it resides. (Because it
// tests the Ping.php in it's parent directory.) That's most likely
// accomplished by simply saying:
//
//   $ php -q ./test_parser.php
//
// However, if your command line PHP complains it cannot find PEAR.php,
// remember that you can set "ini variables" at the command line with:
//
//   $ php -d include_path=/path/to/pear/install -q ./test_parser.php
//
// And as a last attempt to be helpful... if you're wondering where
// PEAR is installed, look for the value of "PEAR directory" in
// Pear's configuration:
//
//   $ pear config-show


error_reporting(E_ALL|E_NOTICE);

// This should be run from within the "Net_Ping/tests/" directory. Make
// sure we get the Ping.php from our parent not the one from the main
// PEAR installation on this box.
require_once '../Ping.php';

$TPD_DIR = './test_parser_data';

// there should be a number of "test_data_<N>.php" files in our current
// working directory
if ( ! ($dh=opendir($TPD_DIR)) ) {
    trigger_error("Cannot open '".$TPD_DIR."' to look for test data files", E_USER_ERROR);
}
$saw_none = true;
while ( false !== ($file=readdir($dh)) ) {
    // ignore irrelevant nodes in the directory
    if ( !preg_match('/test_data_\d+\.php/i', $file) ) {
        continue;
    }

    // be sure the two arrays the data file will define are unset
    unset($input);
    unset($expect);
    print("file '".$file."'...\n");
    ob_start();
    require $TPD_DIR.'/'.$file;
    ob_end_clean();

    if ( !isset($input) || !is_array($input) || count($input)<1 ) {
        print("  ERROR: file doesn't seem to correctly define the \$input array.\n");
        continue;
    }
    $saw_none = false;

    // if not successful, this function will print messages of its own
    if ( test_net_ping($input, $expect) ) {
        print("  ok!\n");
    }
}
closedir($dh);

if ( $saw_none ) {
    trigger_error("There are no 'test_data_NN.php' files in './test_parser_data/'.", E_USER_ERROR);
}

function test_net_ping($input, $expect) {

    $errors = false;

    // Normally Net_Ping would do all the work of creating a
    // Net_Ping_Result. In fact, Net_Ping_Result no longer uses the
    // sysname for *anything*; but we go through the trouble (here) of
    // creating and invoking the Net_Ping_Result instance exactly like
    // Net_Ping would do on this system.
    $OS_Guess = new OS_Guess;
    $sysname  = $OS_Guess->getSysname();
    $npr = Net_Ping_Result::factory($input, $sysname);

    if ( PEAR::isError($npr) ) {
        print("  Net_Ping_Result factory() failed\n");
        return(false);
    }

    // An array of Net_Ping_Result methods (without their leadig "get")
    // which we'll test against values in the expect array. The keys in
    // the expect array are these names lowercased.
    $tests = array(
        'TargetIp',
        'Min','Max','Avg','Stddev',
        'TTL','BytesPerRequest','BytesTotal',
        'Transmitted','Received','Loss'
        );

    // Test all the simple values. If the expect array defines the key,
    // we compare values.
    foreach ( $tests as $test ) {
        $key    = strtolower($test);
        $method = 'get'.$test;
        if ( array_key_exists($key, $expect) && isset($expect[$key]) ) {
            if ( $expect[$key] != $npr->$method() ) {
                print("  mismatch for '".$test."'. (expected '".$expect[$key]."' got '".$npr->$method()."')\n");
                $errors = true;
            }
        }
    }

    $icmpseq = $npr->getICMPSequence();
    // detect ICMP sequence from Net_Ping_Parser, but none defined
    // in the expect array
    if (   is_array($icmpseq)
        && count($icmpseq) > 0
        && ( !array_key_exists('icmpseq',$expect) || !is_array($expect['icmpseq']) )
        ) {
        print("  WARNING: test file doesn't define an 'icmpseq' in \$expect, but Net_Ping_Result has detected successful packets\n");
        $errors = true;
    }
    // $expect has an array for ICMP sequence; detect variations in
    // Net_Ping_Result's performance
    if ( array_key_exists('icmpseq',$expect) && is_array($expect['icmpseq']) ) {
        // detect expected seqnum/time pairs that are missing or different 
        foreach ( array_keys($expect['icmpseq']) as $key ) {
            if ( ! array_key_exists($key, $icmpseq) ) {
                print("  ICMP sequence: expected '".$key."', not seen by the Net_Ping_Result parser\n");
                $errors = true;
            }
            else if ( $expect['icmpseq'][$key] != $icmpseq[$key] ) {
                print("  ICMP sequence: mismatch for seqnum '".$key."'. Expected '".$expect['icmpseq'][$key]."' got '".$icmpseq[$key]."'\n");
                $errors = true;
            }
        }
        // detect extraneous pairs from the parser
        foreach ( array_keys($icmpseq) as $key ) {
            if ( ! array_key_exists($key, $expect['icmpseq']) ) {
                print("  ICMP sequence: unexpected key/value '".$key."'/'".$icmpseq[$key]."' from the Net_Ping_Result parser\n");
                $errors = true;
            }
        }
    }

    unset($npr);
    return( ($errors?false:true) );
}

?>
