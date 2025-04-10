# SedoTMP PHP API Client

## Overview

This PHP client library provides a convenient wrapper around the Sedo Traffic Monetization Platform (TMP) API. It uses the Swagger-generated models and API files and adds a layer of abstraction to make it easier to use.

[![Build Status](https://github.com/Sedo-com/sedotmp-client-php/actions/workflows/php-ci.yml/badge.svg](https://github.com/Sedo-com/sedotmp-client-php/actions?query=workflow%3ACI)

---

## Requirements

- PHP 8.3 or higher
- Composer
- Auth0 account for authentication

## Installation

Install the library via Composer:

```bash
composer require sedo-com/sedotmp-client-php
```

## Configuration

1. Copy the `.env.example` file to `.env` in your project root:

```bash
cp vendor/sedo-com/sedotmp-client-php/.env.example .env
```

2. Update the `.env` file with your Auth0 credentials and API configuration:

```
# Auth0 Configuration
AUTH0_DOMAIN=your-domain.auth0.com
AUTH0_CLIENT_ID=your-client-id
AUTH0_CLIENT_SECRET=your-client-secret
AUTH0_AUDIENCE=https://api.sedotmp.com

# API Configuration
API_HOST=https://api.sedotmp.com
DEBUG=false
```

## Usage

### Basic Usage

```php
<?php

require 'vendor/autoload.php';

use Sedo\SedoTMP\SedoTMPClient;

// Create a client instance with path to .env file
$client = new SedoTMPClient(__DIR__ . '/.env');

// Use the Content API
$articles = $client->content()->getArticles();

// Use the Platform API
$campaigns = $client->platform()->getContentCampaigns();
```

### Platform API Examples

```php
<?php

// Get a list of content campaigns
$campaigns = $client->platform()->getContentCampaigns();

// Get a specific campaign by ID
$campaign = $client->platform()->getContentCampaign('campaign-id');

// -> generate article anstatt existing article 

$createArticle = new CreateArticle();
$createArticle->setTitle('Example Article Title');
$createArticle->setExcerpt('This is an example article excerpt.');
$createArticle->setText('This is the main content of the example article. It contains multiple paragraphs and demonstrates how to create content using the API.');
$newArticle = $contentApiService->createArticle($createArticle);
    
// Create a new campaign
$createCampaign = new \Sedo\SedoTMP\OpenApi\Platform\Model\CreateCampaign();
$createCampaign->setType('create');
$createCampaign->setName("Example Campaign");
$createCampaign->setTargetUrl("https://example.com/landing-page");

// Create the content campaign request body
$contentCampaign = new \Sedo\SedoTMP\OpenApi\Platform\Model\ContentcampaignsBody();
$contentCampaign->setPublishDomainName("example-domain.info");
$contentCampaign->setArticle($newArticle);
$contentCampaign->setCampaign($createCampaign);

$newCampaign = $client->platform()->createContentCampaign($contentCampaign);
```

### Content API Examples

```php
<?php

// Get a list of articles with pagination
$page = new \Sedo\SedoTMP\OpenApi\Content\Model\Pageable();
$page->setPage(0);
$page->setSize(10);
$articles = $client->content()->getArticles($page);

// Get a specific article by ID
$article = $client->content()->getArticle('article-id');

// Create a new article
$createArticle = new \Sedo\SedoTMP\OpenApi\Content\Model\CreateArticle();
$createArticle->setTitle("Example Article Title");
$createArticle->setExcerpt("This is an example article excerpt.");
$createArticle->setText("This is the main content of the example article.");
$createArticle->setCategoryId("category-id");
$createArticle->setLocale("en-US");

$newArticle = $client->content()->createArticle($createArticle);

// Generate an article
$generateArticle = new \Sedo\SedoTMP\OpenApi\Content\Model\GenerateArticle();
$generateArticle->setTopic("Artificial Intelligence in Modern Business");
$generateArticle->setLocale("en-US");

// Process asynchronously
$generatedArticle = $client->content()->generateArticle($generateArticle, true);
```

## Available APIs

The library provides access to both Content and Platform APIs:

### Content API
- Articles management
- Categories management
- Domains management
- Media resources management
- Published articles management

### Platform API
- Content campaigns management

## Example Workflows

Check the `examples` directory for complete workflow examples:

### Available Examples

- **`[example.php](examples/example.php)`**: Basic usage examples demonstrating how to use the Content and Platform APIs.

- **`[simple_usage.php](examples/simple_usage.php)`**: A minimal example showing the basic setup and API calls.

- **`[content_campaign_example.php](examples/content_campaign_example.php)`**: Demonstrates how to:
  1. List content categories using GET `/categories`
  2. Create a content campaign with POST `/content-campaigns` with a publish domain and article
  3. Get details of the created campaign using GET `/content-campaigns/{{id}}`

- **`[csv_content_campaign_example.php](examples/csv_content_campaign_example.php)`**: Shows how to:
  1. Read campaign data from a CSV file (examples/example.csv)
  2. Create content campaigns based on the CSV data
  3. Get details of the created campaigns

### CSV Import Example

The [csv_content_campaign_example.php](examples/csv_content_campaign_example.php) demonstrates how to import campaign data from a CSV file. The CSV file should have the following structure:

```
publishDomainName;name;topics;locale;trafficSource;trackingMethod;s2sMetaPixelId;s2sMetaToken;ClickParam;s2sMetaClickEvent;s2sMetaLandingPageEvent;s2sMetaSearchEvent;postbacks EventName;postbacksClickIdParam;postbacksUrl;title;excerpt
```

Example CSV row:
```
myDomain.info;summer vacation;"""Summer vacation"",""All inclusive resort in Thailand"",""Cheap flights from USA""";en-US;META;s2s;string;string;string;string;string;string;CLICK;click_id;https://your-tracking-url.com/cf/cv?click_id={click_id}&payout={epayout};Summer vacation;The best summer vacation deals
```

### Running the Examples

To run any of the examples:

```bash
php examples/example_filename.php
```

Make sure you have set up your `.env` file with the proper credentials before running the examples.

## Development / Contributions

Requirements: Docker

- boot up the dev-environment using `make up`
- execute `make init`

You should now be able to log into the docker container using `make php`

Test the examples (make sure you have a `AUTH0_CLIENT_ID` and `AUTH0_CLIENT_SECRET` set up in your .env):

- log into the container using `make php`
- run `php examples/content_campaign_example.php`

For PR run the tests locally: 

- run tests: `make phpunit`
- run cs-fixer: `make php-cs-fix`
- run phpstan: `make phpstan`

### Create the API from the swagger docs

For generating the API/Model Classes to `lib/src/` we use [OpenAPITools/openapi-generator](https://github.com/OpenAPITools/openapi-generator)

**Note:**
The file [ObjectSerializer](lib/api/ObjectSerializer.php) is excluded from generating because it contains a reference to the `ModelInterface` - but this Interface is generated in two different Namespaces, which leads to problems in usage:
- `Sedo\SedoTMP\OpenApi\Content\Model\ModelInterface`
- `Sedo\SedoTMP\OpenApi\Platform\Model\ModelInterface`

So the `ObjectSerializer` is adjusted manually to support both namespaces and therefore excluded from re-generation in [.openapi-generator-ignore](.openapi-generator-ignore)

#### Platform/Content Models / API
```
    make generate
```

**Note:**
There is a phpstan baseline that contains unavoidable errors that can not be fixed without modifying a generated class which means these modifications need to be done everytime as well. 

