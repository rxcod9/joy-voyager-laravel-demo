[![Latest Version](https://img.shields.io/github/v/release/rxcod9/joy-voyager-datatable-laravel-demo?style=flat-square)](https://github.com/rxcod9/joy-voyager-datatable-laravel-demo/releases)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/rxcod9/joy-voyager-datatable-laravel-demo/tests?label=tests)
[![Total Downloads](https://img.shields.io/packagist/dt/joy/voyager-datatable-laravel-demo.svg?style=flat-square)](https://packagist.org/packages/joy/voyager-datatable-laravel-demo)

# **Voyager datatable** - laravel demo
By 🐼 [Ramakant Gangwar](https://github.com/rxcod9)

<hr>

Laravel Admin & BREAD System (Browse using DataTable)

## Installation Steps

### 1. Clone repo/Install Using Composer

You can clone/install the `Voyager datatable laravel demo` with the following commands:

```bash
git clone git@github.com:rxcod9/joy-voyager-datatable-laravel-demo.git
cd joy-voyager-datatable-laravel-demo

# OR Install using composer
composer create-project joy/voyager-datatable-laravel-demo
cd voyager-datatable-laravel-demo
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### 3. Run The Installer

Lastly, we can install voyager. You can do this either with or without dummy data.
The dummy data will include 1 admin account (if no users already exists), 1 demo page, 4 demo posts, 2 categories and 7 settings.

To install Voyager without dummy simply run

```bash
php artisan voyager:install
```

If you prefer installing it with dummy run

```bash
php artisan voyager:install --with-dummy
```

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

To check the datatable feature visit [http://localhost:8000/admin/users/datatable](http://localhost:8000/admin/users/datatable) or any bread [http://localhost:8000/admin/{slug}/datatable](http://localhost:8000/admin/{slug}/datatable).

## Creating an Admin User

If you did go ahead with the dummy data, a user should have been created for you with the following login credentials:

>**email:** `admin@admin.com`   
>**password:** `password`

NOTE: Please note that a dummy user is **only** created if there are no current users in your database.

If you did not go with the dummy user, you may wish to assign admin privileges to an existing user.
This can easily be done by running this command:

```bash
php artisan voyager:admin your@email.com
```

If you did not install the dummy data and you wish to create a new admin user you can pass the `--create` flag, like so:

```bash
php artisan voyager:admin your@email.com --create
```

And you will be prompted for the user's name and password.
