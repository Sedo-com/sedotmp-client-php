# SedoTMP PHP API Client

## Usage

Install the library:
- `composer require sedo-com/sedotmp-client-php`




## Development / Create the API from the swagger docs

### Platform Models / API
```
 docker run --rm -v ${PWD}:/local swaggerapi/swagger-codegen-cli-v3 generate \
 -i /local/api-docs/platform-api.yaml \
 -l php \
 -o /local
 -c /local/swagger-platform.config.json
```

### Content Models / API
```
 docker run --rm -v ${PWD}:/local swaggerapi/swagger-codegen-cli-v3 generate \
 -i /local/api-docs/content-api.yaml \
 -l php \
 -o /local
 -c /local/swagger-content.config.json
```
