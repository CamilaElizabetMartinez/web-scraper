<?php

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class EventScraper
{
    private $driver;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function scrapeEvent($eventUrl)
    {
        $this->driver->get($eventUrl);
        $this->driver->wait(30)->until(
            WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('body'))
        );

        try {
            $text = $this->driver->findElement(WebDriverBy::cssSelector('.styles_listingsContainer__FIaQR[data-testid="listings-container"]'))->getText();
            return $this->processText($text);
        } catch (Exception $e) {
            echo "No se pudo encontrar el título principal.\n";
            return [];
        }
    }

    private function processText($text)
    {
        $lines = explode("\n", $text);
        $listing = [];
        $currentListing = [];
        $counter = 0;

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || $line === "ea") {
                continue;
            }

            $currentListing[] = $line;

            if (preg_match('/^\$\d+/', $line)) {
                $price = str_replace('ea', '', $line);
                $listing[] = [
                    'type_ticket' => isset($currentListing[0]) ? $currentListing[0] : '',
                    'quantity_ticket' => isset($currentListing[1]) ? $currentListing[1] : '',
                    'description' => isset($currentListing[2]) && !preg_match('/^\$\d+/', $currentListing[2]) ? $currentListing[2] : '',
                    'price' => $price
                ];

                $currentListing = [];
                $counter++;
                if ($counter >= 9) {
                    break;
                }
            }
        }

        return $listing;
    }
}