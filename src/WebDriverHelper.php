<?php

require __DIR__ . '/../vendor/autoload.php';

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class WebDriverHelper
{
    public static function createDriver()
    {
        $capabilities = DesiredCapabilities::firefox();
        $capabilities->setCapability('moz:firefoxOptions', [
            'args' => [
                '--user-agent=' . USER_AGENT,
            ],
        ]);
        return RemoteWebDriver::create(SELENIUM_SERVER_URL, $capabilities);
    }
}