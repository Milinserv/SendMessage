## SendMessage

### Развертывание

1) Vendor
- composer install

2) ENV file
- cp .env.example .env

3) Docker
- sail up
4) Migration
- sail artisan migrate

### Настройка API SMSC в .env
- Вставить в SMSC_LOGIN логин аккаунта с сайта smsc.ru
- Вставить в SMSC_PASSWORD пароль от аккаунта с сайта smsc.ru
