<?php

namespace Softspring\BehatSeleniumContext\Js;

use WebDriver\Exception;

trait Console
{
    /**
     * @Then Listen js errors
     */
    public function listenJSErrors() {
        $function = <<<JS
    testing = {errors: []};
    window.onerror = function(error, url, line) {
        testing.errors.push(error + ". Line: " + line);
    };
    
    console.log = function (param) {
        testing.errors.push("LOG: " +param.toString());
    };
    
    console.error = function (param) {
        testing.errors.push("ERROR: " +param.toString());
    };
JS;
        $this->getSession()->executeScript($function);
    }
    /**
     * @Then Check js errors
     */
    public function checkJSErrors() {
        $result = $this->getSession()->evaluateScript("testing.errors");
        $this->getSession()->evaluateScript("testing.errors = [];");

        foreach ($result as $line) {
            echo $line."\n";
        }
    }
}