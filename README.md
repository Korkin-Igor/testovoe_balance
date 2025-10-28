<h3>Приложение для работы с балансом пользователей</h3>

<h4>Инструкция для запуска</h4>
```
git clone https://github.com/Korkin-Igor/testovoe_balance.git # установка проекта
cp project/.env.example project/.env # создаем .env (не забудьте заполнить)
ln -s project/.env deploy/.env # оставляем ссылку в deploy на .env
cd deploy
docker compose up -d --build # собираем проект
docker compose exec app php artisan key:generate # генерируем ключ для приложения
docker compose exec app php artisan migrate --seed # заполняем БД тестовыми данными
```
Проект доступен по ссылке <a href="http://localhost:8000">localhost:8000/api</a> <br>
Интерфейс для взаимодействия с БД доступен по ссылке <a href="http://localhost:8080">localhost:8080</a>

<h4>Положить сервера</h4>
```
docker compose down
```

<h4>Для запуска в следующий раз</h4>
```
docker compose up -d
```
