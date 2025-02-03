## About Laravel

Simple SPA project configuration with docker-compose:

- clone git repository
- docker-compose build
- docker-compose up -d
- wait around 1min while is completed script with composer install and .env copy
- compile resources with
- docker exec -ti rickandmorty_npm_1 sh
- yarn install
- yarn prod

Technologies:

- PHP 8.2
- Vue 3
- Vue Router
- Tailwind
- Nginx

Api routes:
- /api/characters
- /api/characters/{id}
