<?php
require_once 'Lottery.php';
require_once 'Sorters/SimpleSorter.php';

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
   require_once 'vendor/phpunit/phpunit/PHPUnit/Autoload.php';
   require_once 'vendor/phpunit/phpunit/PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $lottery;
    private $balls;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^I have a pool of balls$/
     */
    public function iHaveAPoolOfBalls()
    {
        $this->lottery = new Lottery(new SimpleSorter());
        $this->lottery->preparePool();
    }

    /**
     * @When /^I draw a (\d+) balls$/
     */
    public function iDrawABalls($number)
    {
        for($i=0; $i<$number; $i++) {
            $this->balls[] = $this->lottery->drawBall();
        }
    }

    /**
     * @Then /^I should get ordered list of drawed balls every time$/
     */
    public function iShouldGetOrderedListOfDrawedBallsEveryTime()
    {
        for($i=0;$i<sizeof($this->balls);$i++) {
            assertEquals($i+1, sizeof($this->balls[$i]));
            $balls = $this->balls[$i];
            sort($balls);
            assertEquals($this->balls[$i], $balls);
        }
    }
}
