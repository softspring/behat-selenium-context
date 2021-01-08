<?php

namespace Softspring\BehatSeleniumContext\Tools;

use Behat\Mink\Driver\Selenium2Driver;

trait StartSession
{
    /**
     * @Given /^A new selenium session is started$/
     */
    public function startNewSession()
    {
        $driver = $this->getSession()->getDriver();

        if (!$driver instanceof Selenium2Driver) {
            throw new \Exception('Invalid driver');
        }

        if (!$driver->isStarted()) {
            $driver->start();
        }
    }
}