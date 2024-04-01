## SendMessage

### Развертывание

1) Vendor
- composer install
2) Docker
- sail up
3) Migration
- sail artisan migrate
4) ENV
- cp .env.example .env

### Настройка API SMSC в .env
- Вставить в SMSC_LOGIN логин аккаунта с сайта smsc.ru
- Вставить в SMSC_PASSWORD пароль от аккаунта с сайта smsc.ru
