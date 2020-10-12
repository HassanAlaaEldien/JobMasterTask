# JobMaster Task



## How to build the project:

At first you have to create a new database then run:

```bash
composer install
```

After composer install create .env file and set database configuration in .env file by running:

```bash
mv .env.example .env
```

Then run migration to create basic tables needed for this app:
```bash
php artisan migrate
```

Then generate application encryption key:

```bash
php artisan key:generate
```

Then link storage file to public folder by:

```bash
php artisan storage:link
```

Then to make the project up and running:

```bash
php artisan serve
```

Also, you can see demo uploaded here:

```bash
https://task.appaths.com/
```
