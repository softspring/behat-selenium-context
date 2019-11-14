<?php

namespace Softspring\BehatSeleniumContext;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception\ConnectionException;

class SeleniumContext extends MinkContext implements Context
{
    use Browser\Cookies;
    use Browser\Iframe;
    use Browser\ResizeBeforeStep;
    use Js\Console;
    use Js\Scroll;
    use Debug\Screenshot;
    use Tools\Wait;

    /**
     * SeleniumContext constructor.
     *
     * @param string $screenShotPath
     */
    public function __construct(string $screenShotPath)
    {
        $this->screenShotPath = $screenShotPath;
    }
}