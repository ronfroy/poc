.EXPORT_ALL_VARIABLES:
.RECIPEPREFIX +=
.DEFAULT_GOAL := help
.PHONY: fixtures assets
COLOR_RESET = \033[0m
COLOR_ERROR = \033[31m
COLOR_INFO = \033[32m
COLOR_COMMENT = \033[33m
COLOR_TITLE_BLOCK  = \033[0;44m\033[37m
PROJECT ?= "Project"
UID = $(shell id -u)

## Initialize environment & application
init: docker-up sleep composer database fixtures yarn assets

## Restore environment & application
restore: docker-down docker-build init

## Spawn shell in app's container
php:
    docker-compose exec -u ${UID} app sh

## Spawn shell in node's container
node:
    docker-compose exec -u ${UID} node sh

## Start docker environment
docker-up:
    docker-compose up -d --remove-orphans

## Stop docker containers
docker-stop:
    docker-compose stop

## Down docker containers
docker-down:
    docker-compose down -v

## Restart docker environment
docker-restart:
    docker-compose restart

## Logs docker containers
docker-logs:
    docker-compose logs -f

## Rebuild docker containers
docker-build:
    docker-compose build

## Initialize database and schema
database:
    @-docker-compose exec -u ${UID} -T app bin/console doctrine:database:drop --force >/dev/null 2>&1 || true
    @docker-compose exec -u ${UID} -T app bin/console doctrine:database:create
    @docker-compose exec -u ${UID} -T app bin/console doctrine:schema:create

## Load database fixtures
fixtures:
    @docker-compose exec -u ${UID} -T app bin/console hautelook:fixtures:load

## Execute phpunit
phpunit:
    @docker-compose exec -u ${UID} -T app phpdbg -qrr -d memory_limit=-1 bin/phpunit $(file)

## Fix source code style
fix:
    @docker-compose exec -u ${UID} -T app vendor/bin/php-cs-fixer fix src --allow-risky=yes
    @docker-compose exec -u ${UID} -T app vendor/bin/php-cs-fixer fix tests --allow-risky=yes
    @docker-compose exec -u ${UID} -T node npm run fix

## Install vendors dependencies with composer
composer:
    docker-compose exec -u ${UID} -T app composer install --no-progress

## Install vendors dependencies with yarn
yarn:
    @docker-compose exec -u ${UID} -T node yarn install

## Build assets
assets:
    @docker-compose exec -u ${UID} -T node npm run build

## Wait 5 seconds
sleep:
    @sleep 5

## List available commands
help:
    @printf "${COLOR_TITLE_BLOCK}${PROJECT} Makefile${COLOR_RESET}\n"
    @printf "\n"
    @printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
    @printf " make [target] [arg=\"val\"...]\n\n"
    @printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
    @awk '/^[a-zA-Z\-\_0-9\@]+:/ { \
        helpLine = match(lastLine, /^## (.*)/); \
        helpCommand = substr($$1, 0, index($$1, ":")); \
        helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
        printf " ${COLOR_INFO}%-20s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
    } \
    { lastLine = $$0 }' $(MAKEFILE_LIST)
