<?php

namespace Softspring\BehatSeleniumContext\Js;

use WebDriver\Exception;

trait Click
{
    /**
     * @Then /^(?:|I )click on "(?P<elementId>(?:[^"]|\\")*)" element$/
     */
    public function click(string $elementId) {
        $function = <<<JS
(function(){
  var elem = document.getElementById("$elementId");
  elem.click();
})()
JS;
        try {
            $this->getSession()->executeScript($function);
        } catch(Exception $e) {
            throw new \Exception("Click failed");
        }
    }
}