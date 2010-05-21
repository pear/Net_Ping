<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Net_Ping_AllTests::main');
}

require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'Net_Ping_ResultTest.php';

class Net_Ping_AllTests
{
    /**
     * Runs the test suite.
     *
     * @return void
     * @static
     */
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    /**
     * Adds the Net_Ping test suite.
     *
     * @return object the PHPUnit_Framework_TestSuite object
     * @static
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Net_Ping Test Suite');
        $suite->addTestSuite('Net_Ping_ResultTest');
        return $suite;
    }

}

if (PHPUnit_MAIN_METHOD == 'Net_Ping_AllTests::main') {
    Net_Ping_AllTests::main();
}
?>
