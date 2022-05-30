# pizza-test

*How to install:*

- Clone repository
- Copy ./.env.example to ./.env
- Copy ./backend/.env.example to ./backend/.env
- Run docker-compose build
- Run docker-compose up -d
- Run "docker-compose exec app-pizza bash" end then "composer install", "php artisan migrate", "php artisan db:seed"