<?php

namespace Softspring\BehatSeleniumContext\Debug;

use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Mink\Driver\Selenium2Driver;

trait Screenshot
{
    /**
     * @var string
     */
    protected $screenShotPath;

    /**
     * Take screen-shot when step fails. Works only with Selenium2Driver.
     *
     * @AfterStep
     *
     * @param AfterStepScope $scope
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function takeScreenshotAfterFailedStep(AfterStepScope $scope)
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof Selenium2Driver) {
            return;
        }

        if (!is_dir($this->screenShotPath)) {
            mkdir($this->screenShotPath, 0777, true);
        }

        $filename = sprintf(
            '%s_%s_%s',
            $this->getMinkParameter('browser_name'),
            date('Ymd') . '-' . date('His'),
            uniqid('', true)
        );

        $this->saveScreenshot($filename . '.png', $this->screenShotPath);
        file_put_contents($this->screenShotPath . '/' . $filename . '.html', '' . $driver->getContent());
    }
}