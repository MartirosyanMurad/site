# Сервис Site

#### Назначение

Этот сервис предназначен для отдачи, информации о текущем балансе и о транзакциях пользователей

#### Принцип работы и взаимосвязь с другими сервисами

Зависит от сервиса [balance](https://github.com/MartirosyanMurad/balance)

#### Способ запуска/разворачивания

Важно отметить что для этого сервиса необходимо чтобы была поднята база в проекте `balance` смотри [README](https://github.com/MartirosyanMurad/balance/blob/master/README.md)

После скачивания приложения через `git pull` необходимо в директории проекта выполнить следующие команды
- `composer install` - для установления зависимостей
- `.env.example` скопировать в `.env`
- после выполняем `php artisan serve`


После этого заходим `http://127.0.0.1:8000` и проходим регистрацию.
После регистрации мы заходим в аккаунт.
На главной странице мы должны увидеть текущий баланс и историю транзакций.
