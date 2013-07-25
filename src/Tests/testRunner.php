<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tmagiera
 * Date: 7/16/13
 * Time: 11:11 AM
 * To change this template use File | Settings | File Templates.
 */
require_once("SortersTest.php");
require_once("LotteryTest.php");

$tests = array("SortersTest", "LotteryTest");
foreach ($tests as $test) {
    echo "Running ".$test."\n\r";
    $test = new $test();
    $test->runTests();
}
