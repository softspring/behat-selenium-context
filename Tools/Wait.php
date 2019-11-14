<?php

namespace Softspring\BehatSeleniumContext\Tools;

trait Wait
{
    /**
     * @Then /^I wait ([0-9]+) seconds$/
     *
     * @param int $seconds
     */
    public function iWaitSomeSeconds(int $seconds)
    {
        $this->getSession()->wait($seconds * 1000);
    }
}