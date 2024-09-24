This Laravel app is just a test sample to practice skills

### How to run the API

Make sure you have PHP and Composer installed globally on your computer.

Clone the repo and enter the project folder

```
git clone https://github.com/insanexxx/test-laravel-project.git
cd test-laravel-project-master
```

Install the app

```
composer install
cp .env.example .env
```

Generate application key and perform migrations

```
php artisan key:generate
php artisan migrate --seed
```

Run the web server

```
php artisan serve
```

That's it. Now you can use the api, i.e.

```
http://127.0.0.1:8000/api/articles
```

Or you can run the deploy.bat file which will do everything for you