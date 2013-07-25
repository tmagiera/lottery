<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tmagiera
 * Date: 7/16/13
 * Time: 11:11 AM
 * To change this template use File | Settings | File Templates.
 */
require_once("Sorter.php");

class Lottery {

    private $pool = array();
    private $drawedPool = array();
    private $sorter;

    public function __construct(Sorter $sorter) {
        $this->sorter = $sorter;
    }

    public function preparePool() {
        $this->pool = range(0, 59);
        shuffle($this->pool);
    }

    public function drawBall() {
        if (empty($this->pool)) {
            throw new PoolEmptyException();
            return false;
        }

        $drawedBall = array_shift($this->pool);
        $this->drawedPool = $this->sorter->sortPool($this->drawedPool, $drawedBall);
        return $this->drawedPool;
    }
}