<?php
require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../config/config.php';
require __DIR__ . '/../src/WebDriverHelper.php';
require __DIR__ . '/../src/EventScraper.php';

$eventUrl = $_GET['url'] ?? null;
if ($eventUrl) {
    $driver = WebDriverHelper::createDriver();
    $scraper = new EventScraper($driver);

    $listing = $scraper->scrapeEvent($eventUrl);

    $driver->quit();

    require __DIR__ . '/../view.php';

} else {
    echo "Por favor, proporciona una URL válida.";
}