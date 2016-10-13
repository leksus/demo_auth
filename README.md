demo_auth
=========

####Установка

composer update

####Запуск

php app/console server:start

переход на url http://127.0.0.1:8000/

####Режимы работы

Для авторизации необходимо пройти по url:

http://127.0.0.1:8000/auth/ABC

ABC - тестовый токен

В случае успешной авторизации отобразится строка: "Auth successful"

Разлогиниться можно с помощью профилировщика symfony: Actions Logout

