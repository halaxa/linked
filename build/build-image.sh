#!/usr/bin/env sh

set -e

PHP_MINOR=$1
PHP_VERSION=$( (wget -qO- "https://hub.docker.com/v2/repositories/library/php/tags?page_size=100&name=$PHP_MINOR" \
  | grep -Po "[0-9]+\.[0-9]+\.[0-9]+(?=-)" \
    || echo "$PHP_MINOR") \
  | head -1 \
)

FROM_IMAGE="php:$PHP_VERSION-cli-alpine"
DOCKER_NAME="listed-php-$PHP_VERSION"

docker ps --all --format "{{.Names}}" | grep "$DOCKER_NAME" && docker rm -f "$DOCKER_NAME"

>&2 echo "Building $DOCKER_NAME from $FROM_IMAGE"

printf "
    FROM $FROM_IMAGE
    RUN apk add --update \
        autoconf \
        g++ \
        libtool \
        make \
        bash \
        linux-headers \
        git \
    && wget http://pear.php.net/go-pear.phar && php go-pear.phar \
        && docker-php-ext-enable opcache \
    && wget https://getcomposer.org/download/2.2.18/composer.phar -O /usr/local/bin/composer \
        && chmod +x /usr/local/bin/composer
" | docker build --quiet --tag "$DOCKER_NAME" - > /dev/null

echo "$DOCKER_NAME"
