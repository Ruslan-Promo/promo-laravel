## Запуск Laravel
Запуск через консоль Ubuntu 20.04:
- Установить composer - https://getcomposer.org/download/

- Создать папку проекта, перейти в нее и выполнить команду:
```bash
git clone https://github.com/Ruslan-Promo/promo-laravel .
```
- Запустить проекта из папки 
```bash
./vendor/bin/sail up -d
```

- Сайт будет доступен по ссылке http://localhost

- Сменить ссылку на сайт можно в Windows/System32/drivers/etc/hosts

## Процесс создания переменных окружения и установке зависимостей

При запуске команды `./vendor/bin/sail up` генерируются переменные окружения (.env) и загружаются/подключаются зависимости из composer.json
