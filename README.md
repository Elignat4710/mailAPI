## Пособие по установке проекта

1. ПО которое должно быть установлено
    - PHP
    - MySQL
    - Redis
    - NodeJS npm
    - Composer
2. Создаем БД `create database mailAPI`
3. Устанавливаем все зависимости `npm install && composer install`
4. Запускаем ВЕБПАК `npm run dev`
5. Создаем файл в проекте `.env` по примеру `.env.example`. Настраиваем подключение к БД MySQL и подключение к MAILGUN по примеру
6. Делаем миграции всех таблиц `php artisan migrate`
7. Устанавливаем ключ шифрования сессий и кук `php arisan key:generate`
8. Включаем horizon `php artisan horizon`

## Endpoints

| endpoint      | method | value                            |
| ------------- | ------ | -------------------------------- |
| ' / '         | GET    | Страница с таблицей ЛОГОВ        |
| ' /form '     | GET    | Страница с формой для веб версии |
| ' /send '     | POST   | Отправка формы в веб приложении  |
| ' /api/send ' | POST   | Отправка запроса по API          |

## Пример отправки запроса JSON

Пример запроса:

```json
{
    email: mail@example.com,
    date:'2021-03-30 00:00:00,
    body: 'Hello!!!''
}
```

Пример ответа:

```json
{
    "body": "test server postman2",
    "date": "2021-04-01 20:38:10",
    "email": "eligant4710@gmail.com",
    "updated_at": "2021-04-01T17:37:03.000000Z",
    "created_at": "2021-04-01T17:37:03.000000Z",
    "id": 5
}
```

# Конец
