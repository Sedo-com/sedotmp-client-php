SHELL = /bin/sh
UID := $(shell id -u)
GID := $(shell id -g)
SYSTEM := $(shell uname -s)
PROCESSOR := $(shell uname -p)

ifeq (${SYSTEM},Darwin)
compose := docker compose
else
compose := docker-compose
endif

exec-no-xdebug:= $(compose) exec -e XDEBUG_MODE=off -u www-data php	# we can not debug from outside of docker anyways?
exec-phpunit:= $(compose) exec -e XDEBUG_MODE=coverage -u www-data php	# only use coverage for phpunit to speed up a bit
exec:= $(compose) exec -u www-data php
exec-db := $(compose) exec db

help:                                                                           ## shows this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_\-\.]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: build
build:																				## Start the Docker Compose stack for the complete project
	USER_ID="${UID}" $(compose) up -d --build --remove-orphans

.PHONY: up
up:																				## Start the Docker Compose stack for the complete project
	USER_ID="${UID}" $(compose) up -d

.PHONY: down
down:																			## Bring down the Docker Compose stack for the complete project
	$(compose) down

init:
	$(exec) composer install --dev

.PHONY: php
php:																			## Bash in Docker container
	$(exec) bash || true

.PHONY: php-cs-fix
php-cs-fix:																		## run cs fixer
	$(exec-no-xdebug) vendor/bin/php-cs-fixer fix --allow-risky=yes

.PHONY: phpstan
phpstan:
	$(exec-no-xdebug) vendor/bin/phpstan analyse -c phpstan.neon

.PHONY: phpstan-baseline
phpstan-baseline:																## update phpstan baseline
	$(exec-no-xdebug) vendor/bin/phpstan --generate-baseline

.PHONY: phpunit
phpunit:																		## run cs fixer
	$(exec-phpunit) vendor/bin/phpunit -c phpunit.xml.dist $(OPTIONS)

.PHONY: composer
composer:																		## execute a composer command
	$(exec-no-xdebug) composer $(cmd)

generate-platform:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/api-docs/platform-api.yaml -g php -o /local -c /local/swagger-platform.config.json

generate-content:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/api-docs/content-api.yaml -g php -o /local -c /local/swagger-content.config.json

generate-platform-dry-run:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/api-docs/platform-api.yaml -g php -o /local -c /local/swagger-platform.config.json --dry-run

generate-content-dry-run:
	docker run --rm -v ${PWD}:/local openapitools/openapi-generator-cli generate -i /local/api-docs/content-api.yaml -g php -o /local -c /local/swagger-content.config.json --dry-run

generate:
	make generate-platform
	make generate-content
