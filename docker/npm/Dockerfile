FROM node:22-alpine

WORKDIR /src

RUN apk update \
    && apk upgrade \
    && apk add --no-cache --upgrade bash \
    && apk add --upgrade \
                  libpng-dev \
                  gcc \
                  g++ \
                  make
