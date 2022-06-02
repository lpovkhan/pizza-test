.PHONY: setup build run
.SILENT: ip host version

install: build down up laravel-setup

build:
	docker-compose build

logs:
	docker-compose logs -f;

up:
	docker-compose up -d

down:
	docker-compose down

restart:
	docker-compose restart

laravel-setup:
	[ -f backend/.env ] || cp backend/.env.example backend/.env
	docker-compose exec -T app-pizza  composer install || echo done
	docker-compose exec -T app-pizza  php artisan key:generate || echo done
	docker-compose exec -T app-pizza  php artisan storage:link || echo done
	docker-compose exec -T app-pizza  php artisan migrate || echo done
	docker-compose exec -T app-pizza  php artisan db:seed || echo done