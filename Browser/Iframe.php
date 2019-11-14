<?php

namespace Softspring\BehatSeleniumContext\Browser;

use Behat\Mink\Driver\Selenium2Driver;

trait Iframe
{
    /**
     * @When /^I switch to main frame$/
     * @When /^I switch to "([^"]*)" iframe$/
     */
    public function iSwitchToFrame(string $frameName = null)
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof Selenium2Driver) {
            return;
        }

        $this->getSession()->switchToIFrame($frameName);
    }
}