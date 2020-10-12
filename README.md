# JobMaster Task

## Requirements:

I am using PDFTOText package and behind the scenes this package leverages pdftotext. You can verify if the binary installed on your system by issueing this command:
```bash
which pdftotext
```
If it is installed it will return the path to the binary.

To install the binary you can use this command on Ubuntu or Debian:

```bash
apt-get install poppler-utils
```

On a mac you can install the binary using brew

```bash
brew install poppler
```

If you're on RedHat or CentOS use this:

```bash
yum install poppler-utils
```

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
