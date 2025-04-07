# SedoTMP PHP API Client

## Overview

This PHP client library provides a convenient wrapper around the Sedo Traffic Monetization Platform (TMP) API. It uses the Swagger-generated models and API files and adds a layer of abstraction to make it easier to use.

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

use Sedo\SedoTMPClient;

// Create a client instance with path to .env file
$client = new SedoTMPClient(__DIR__ . '/.env');

// Use the Content API
$articles = $client->content()->getArticles();

// Use the Platform API
$campaigns = $client->platform()->getContentCampaigns();
```

### Content API Examples

```php
<?php

// Get a list of articles with pagination
$page = new \Sedo\SedoTMP\Content\Model\Pageable();
$page->setPage(0);
$page->setSize(10);
$articles = $client->content()->getArticles($page);

// Get a specific article by ID
$article = $client->content()->getArticle('article-id');

// Create a new article
$createArticle = new \Sedo\SedoTMP\Content\Model\CreateArticle();
$createArticle->setTitle("Example Article Title");
$createArticle->setExcerpt("This is an example article excerpt.");
$createArticle->setText("This is the main content of the example article.");
$createArticle->setCategoryId("category-id");
$createArticle->setLocale("en-US");

$newArticle = $client->content()->createArticle($createArticle);

// Generate an article
$generateArticle = new \Sedo\SedoTMP\Content\Model\GenerateArticle();
$generateArticle->setTopic("Artificial Intelligence in Modern Business");
$generateArticle->setLocale("en-US");

// Process asynchronously
$generatedArticle = $client->content()->generateArticle($generateArticle, true);
```

### Platform API Examples

```php
<?php

// Get a list of content campaigns
$campaigns = $client->platform()->getContentCampaigns();

// Get a specific campaign by ID
$campaign = $client->platform()->getContentCampaign('campaign-id');

// Create a content campaign with an existing article
$existingArticle = new \Sedo\SedoTMP\Platform\Model\ExistingArticle();
$existingArticle->setType('existing');
$existingArticle->setId('article-id');

// Create a new campaign
$createCampaign = new \Sedo\SedoTMP\Platform\Model\CreateCampaign();
$createCampaign->setType('create');
$createCampaign->setName("Example Campaign");
$createCampaign->setTargetUrl("https://example.com/landing-page");

// Create the content campaign request body
$contentCampaign = new \Sedo\SedoTMP\Platform\Model\ContentcampaignsBody();
$contentCampaign->setPublishDomainName("example-domain.info");
$contentCampaign->setArticle($existingArticle);
$contentCampaign->setCampaign($createCampaign);

$newCampaign = $client->platform()->createContentCampaign($contentCampaign);
```

### Custom Authentication

You can provide your own authenticator implementation:

```php
<?php

use Sedo\Auth\AuthenticatorInterface;
use Sedo\SedoTMPClient;

class CustomAuthenticator implements AuthenticatorInterface
{
    public function getAccessToken(): string
    {
        // Implement your custom authentication logic here
        return 'your-access-token';
    }
}

// Create the client with custom authenticator
$authenticator = new CustomAuthenticator();
$client = new SedoTMPClient(null, $authenticator);
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

- `example.php`: Basic usage examples
- `content_campaign_workflow.php`: Complete workflow for creating a content campaign


## Development / Create the API from the swagger docs

### Platform Models / API
```
 docker run --rm -v ${PWD}:/local swaggerapi/swagger-codegen-cli-v3 generate \
 -i /local/api-docs/platform-api.yaml \
 -l php \
 -o /local \
 -c /local/swagger-platform.config.json
```

### Content Models / API
```
 docker run --rm -v ${PWD}:/local swaggerapi/swagger-codegen-cli-v3 generate \
 -i /local/api-docs/content-api.yaml \
 -l php \
 -o /local \
 -c /local/swagger-content.config.json
```
