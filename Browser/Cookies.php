<?php

namespace Softspring\BehatSeleniumContext\Browser;

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Exception\ExpectationException;

trait Cookies
{
    /**
     * @When /^I want to dump cookies$/
     * @throws \Exception
     */
    public function dumpCookies()
    {
        var_dump($this->getSeleniumDriver()->getWebDriverSession()->getAllCookies());
    }

    /**
     * @When /^I remove the "([^"]*)" cookie$/
     */
    public function removeCookie($cookieName)
    {
        $driver = $this->getSeleniumDriver();

        $session = $driver->getWebDriverSession();

        $session->deleteCookie($cookieName);
    }

    /**
     * @When /^I should have a "([^"]*)" cookie$/
     */
    public function hasCookie($cookieName)
    {
        $driver = $this->getSeleniumDriver();

        $session = $driver->getWebDriverSession();
        $cookies = $session->getCookie();
        $cookie = array_filter($cookies, function(array $cookie) use ($cookieName) { return $cookie['name'] == $cookieName; })[0] ?? null;

        if (!isset($cookie['name'])) {
            throw new ExpectationException("Missing expected '$cookieName' cookie", $driver);
        }
    }

    /**
     * @When /^I should not have a "([^"]*)" cookie$/
     */
    public function hasNotCookie($cookieName)
    {
        $driver = $this->getSeleniumDriver();

        $session = $driver->getWebDriverSession();
        $cookies = $session->getCookie();
        $cookie = array_filter($cookies, function(array $cookie) use ($cookieName) { return $cookie['name'] == $cookieName; })[0] ?? null;

        if (isset($cookie['name'])) {
            throw new ExpectationException("Existing not expected '$cookieName' cookie", $driver);
        }
    }

    public function setCookie()
    {
        $driver = $this->getSeleniumDriver();
//
//        $cookie =  array(
//            "domain" => "", <----- You can even add your domain here
//            "name" => $session->getName(),
//            "value" => $session->getId(),
//            "path" => "/",
//            "secure" => False
//        );
//        $driver->getWebDriverSession()->setCookie($cookie);
    }

    /**
     * @return Selenium2Driver
     * @throws \Exception
     */
    private function getSeleniumDriver(): Selenium2Driver
    {
        $driver = $this->getSession()->getDriver();

        if (!$driver instanceof Selenium2Driver) {
            throw new \Exception('Invalid driver');
        }

        return $driver;
    }
}