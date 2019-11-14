<?php

namespace Softspring\BehatSeleniumContext\Js;

use WebDriver\Exception;

trait Scroll
{
    /**
     * @Then /^(?:|I )scroll "(?P<elementId>(?:[^"]|\\")*)" into view$/
     */
    public function iScrollIntoView(string $elementId) {
        $function = <<<JS
(function(){
  var elem = document.getElementById("$elementId");
  elem.scrollIntoView(true);
})()
JS;
        try {
            $this->getSession()->executeScript($function);
        } catch(Exception $e) {
            throw new \Exception("ScrollIntoView failed");
        }
    }
}