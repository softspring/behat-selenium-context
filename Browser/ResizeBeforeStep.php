<?php

namespace Softspring\BehatSeleniumContext\Browser;

trait ResizeBeforeStep
{
    /**
     * @BeforeStep
     */
    public function beforeStep()
    {
        $this->getSession()->resizeWindow(1440, 900, 'current');
    }
}