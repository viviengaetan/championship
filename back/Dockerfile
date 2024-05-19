#syntax=docker/dockerfile:1.7

# The different stages of this Dockerfile are meant to be built into separate images
# https://docs.docker.com/develop/develop-images/multistage-build/#stop-at-a-specific-build-stage
# https://docs.docker.com/compose/compose-file/#target

# Prod image
FROM registry.gitlab.com/viviengaetan/docker-php:8.3.6.1714642590-fpm-bookworm AS app_php

USER root

# Extra extension if needed
#RUN install-php-extensions pdo_mysql zip
RUN install-php-extensions pdo_pgsql

ENV PHP_MEMORY_LIMIT="128M"

USER application

# prevent the reinstallation of vendors at every changes in the source code
COPY --chown=application:application app/composer.* app/symfony.* ./
RUN set -eux; \
    if [ -f composer.json ]; then \
        composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress; \
        composer clear-cache; \
    fi

# copy sources
COPY --chown=application:application /app /app

RUN set -eux; \
    mkdir -p var/cache var/log; \
    if [ -f composer.json ]; then \
        composer dump-autoload --classmap-authoritative --no-dev; \
        composer dump-env prod; \
        composer run-script --no-dev post-install-cmd; \
        chmod +x bin/console; sync; \
    fi

###### DEV IMAGE ######
# dev env + xdebug + mysql client
FROM app_php AS app_php_dev

USER root

# Default configuration
ENV APP_ENV="dev" APP_DEBUG=1

RUN rm $PHP_INI_DIR/conf.d/app.prod.ini; \
    mv "$PHP_INI_DIR/php.ini" "$PHP_INI_DIR/php.ini-production"; \
    mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini";
COPY docker/fpm/app.dev.ini $PHP_INI_DIR/conf.d/

RUN install-php-extensions xdebug-stable;

USER application

RUN if [ -f composer.json ]; then \
        composer install --prefer-dist --no-progress; \
        composer clear-cache; \
    fi

RUN rm -f .env.local.php
