@echo off
set PROJECT_DIR=C:\OSPanel\domains\
REM Директория по умолчани

cd %PROJECT_DIR%

REM Клонирование репозитория (если еще не клонирован)
IF NOT EXIST ".git" (
    git clone https://github.com/insanexxx/test-laravel-project.git .
)

REM Обновление репозитория
git pull origin master

REM Установка зависимостей
composer install

REM Копирование файла .env
IF NOT EXIST ".env" (
    copy .env.example .env
)

REM Генерация ключа приложения
php artisan key:generate

REM Выполнение миграций
php artisan migrate --seed

REM Запуск сервера (если нужно)
REM php artisan serve --host=0.0.0.0 --port=8000

echo Deployment completed successfully!
pause
