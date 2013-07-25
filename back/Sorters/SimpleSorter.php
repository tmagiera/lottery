<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tmagiera
 * Date: 7/16/13
 * Time: 11:11 AM
 * To change this template use File | Settings | File Templates.
 */
class SimpleSorter {

    public function sortPool(array $pool, $number) {
        $pool[] = $number;
        sort($pool);
        return $pool;
    }
}