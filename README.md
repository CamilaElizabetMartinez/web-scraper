# Web Scraper

This project is a web scraper designed to extract ticket information from event pages. It uses Selenium WebDriver with PHP to navigate web pages and extract structured data.

## Project Structure

web-scraper/
├── config/
│   └── config.php
├── public/
│   └── index.php
├── src/
│   ├── EventScraper.php
│   └── WebDriverHelper.php
├── vendor/
├── composer.json
├── composer.lock
└── view.php


## Features

- Scrapes ticket information from event pages
- Extracts ticket type, quantity, description, and price
- Displays results in a formatted HTML view

## Requirements

- PHP 7.4+
- Composer
- Selenium Server
- Firefox WebDriver
- VPN: A VPN is required to access certain web pages that may be     geographically restricted.
- GuzzHttp: GuzzleHttp is needed to facilitate HTTP requests. You can install it using Composer:

## Configuration

The `config/config.php` file contains important configuration settings:

- `SELENIUM_SERVER_URL`: The URL of your Selenium server
- `USER_AGENT`: The user agent string to be used for requests

## Usage

1. Start your Selenium server.
2. Navigate to the `public` directory.
3. Run a PHP server: `php -S localhost:8000`.
4. Access the scraper by visiting `http://localhost:8000?url=EVENT_URL`
   Replace `EVENT_URL` with the URL of the event page you want to scrape.


### EventScraper

The `EventScraper` class is responsible for navigating to the event page and extracting the ticket information. It processes the raw text data into a structured format.

### WebDriverHelper

The `WebDriverHelper` class provides a method to create and configure the WebDriver instance used for scraping.

### View

The `view.php` file contains the HTML template for displaying the scraped ticket information in a formatted manner.

