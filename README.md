# Приложение для работы с балансом пользователей

## Инструкция для запуска
```bash
git clone https://github.com/Korkin-Igor/testovoe_balance.git # установка проекта
cd testovoe_balance
cp project/.env.example project/.env # создаем .env (не забудьте заполнить)
cd deploy
ln -s ../project/.env .env # оставляем ссылку в deploy на .env
docker compose up -d --build # собираем проект
docker compose exec app php artisan key:generate # генерируем ключ для приложения
docker compose exec app php artisan migrate --seed # заполняем БД тестовыми данными
```
Проект доступен по ссылке <a href="http://localhost:8000">localhost:8000/api</a> <br>
Интерфейс для взаимодействия с БД доступен по ссылке <a href="http://localhost:8080">localhost:8080</a>

## Положить сервера
```bash
docker compose down
```

## Для запуска в следующий раз
```bash
docker compose up -d
```
