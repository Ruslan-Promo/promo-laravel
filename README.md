## Запуск Laravel
Запуск через консоль Ubuntu 20.04:

- Создать папку проекта, перейти в нее и установить Composer https://getcomposer.org/download/

- Выполнить команду:
```bash
git clone https://github.com/Ruslan-Promo/promo-laravel .
```
- Установить Sail:
```bash
composer require laravel/sail --dev
php artisan sail:install
```

- Установить все зависимости через Composer
```bash
composer install
```

- Запустить проекта из папки 
```bash
./vendor/bin/sail up
```

- Сайт будет доступен по ссылке http://localhost

- Сменить ссылку на сайт можно в Windows/System32/drivers/etc/hosts
Если используете Docker, то по подобию для host.docker.internal прописать свой домен
```
192.168.0.62 host.docker.internal
192.168.0.62 soglasie.test
```
- Выполнить миграции командой
```bash
php artisan migrate:refresh --seed
```
При этом будет добавлен администратор через seed https://laravel.com/docs/8.x/seeding

## Процесс создания переменных окружения и установке зависимостей

При запуске команды `./vendor/bin/sail up` генерируются переменные окружения (.env) и загружаются/подключаются зависимости из composer.json
