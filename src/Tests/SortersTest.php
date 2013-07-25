<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tmagiera
 * Date: 7/16/13
 * Time: 11:11 AM
 * To change this template use File | Settings | File Templates.
 */
require_once("../Sorters/SimpleSorter.php");

class SortersTest {

    public function runTests() {
        $this->ballSorter();
        echo "All successful\n\r";
    }

    public function ballSorter() {
        $pool = array(4, 0, 59, 8);
        $expectedPools = array(
            array(4),
            array(0, 4),
            array(0, 4, 59),
            array(0, 4, 8, 59)
        );

        $sorter = new SimpleSorter();

        $alreadySorted = array();
        for ($i=0; $i<sizeof($pool);$i++) {
            $ballsToSort = array_slice($pool, 0, $i+1);
            $ballsExpected = $expectedPools[$i];

            $balls = $sorter->sortPool($alreadySorted, end($ballsToSort));
            if ($balls !== $ballsExpected) {
                echo "Wrong sorting order, was:".print_r($balls, true).", should be:".print_r($ballsExpected, true);
                return false;
            }

            $alreadySorted = $balls;
        }
    }
}