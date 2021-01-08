<?php

namespace Softspring\BehatSeleniumContext\Js;

use WebDriver\Exception;

trait Classes
{
    /**
     * @Then /^(?:|I )remove class "(?P<class>(?:[^"]|\\")*)" from "(?P<elementId>(?:[^"]|\\")*)"$/
     */
    public function removeClass(string $elementId, string $class) {
        $function = <<<JS
(function(){
  var elem = document.getElementById("$elementId");
  elem.classList.remove("$class");
})()
JS;
        try {
            $this->getSession()->executeScript($function);
        } catch(Exception $e) {
            throw new \Exception("Remove class failed");
        }
    }
}