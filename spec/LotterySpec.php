<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LotterySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Lottery');
    }

    function it_draw_a_single_ball() {
        $balls = $this->drawBall();
        $balls->shouldBeArray();
        $balls->shouldHaveCount(1);
    }

    function it_draw_a_few_balls() {
        $draws = 15;
        $balls = array();
        for ($i=0; $i<$draws;$i++) {
            $balls = $this->drawBall();
        }
        $balls->shouldHaveCount($draws);
    }
}
