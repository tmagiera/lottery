<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tmagiera
 * Date: 7/16/13
 * Time: 11:11 AM
 * To change this template use File | Settings | File Templates.
 */
require_once("../Lottery.php");
require_once("../Sorters/MockedSorter.php");

class LotteryTest {

    public function runTests() {
        $this->fullLotteryDraw();
        echo "All successful\n\r";
    }

    public function fullLotteryDraw() {
        $sorter = new MockedSorter();
        $lottery = new Lottery($sorter);
        $lottery->preparePool();

        $repeats = 15;
        for($i=0;$i<$repeats;$i++) {
            $ballsDrawed = $lottery->drawBall();
            if (count($ballsDrawed) !== $i+1) {
                echo "Incorect ball quantity".count($ballsDrawed);
                return false;
            }
            $ball = end($ballsDrawed);
            if (!is_numeric($ball) OR $ball < 0 OR $ball > 59) {
                echo "Incorect ball number:".$ball;
                return false;
            }
        }
    }
}