# Message buses in the Symfony project
The repository contains the code used in the series of posts about the Messenger component.

## Codebase versions
Each version of the codebase has its own branch.
Currently viewed version is the result of [Event bus in Symfony application](https://karoldabrowski.com/blog/event-bus-in-symfony-application/).

## Requirements
* PHP 7.2.5 or greater
* MySQL 5.7 or greater
* Composer

## Project Setup
1. Clone the repository
```bash
git clone https://github.com/karol-dabrowski/messenger-symfony-example.git -b event_bus
cd ./messenger-symfony-example
composer install
cp .env .env.local
```
2. Edit `.env.local` file and paste your MySQL database credentials in `DATABASE_URL`.
3. Create database (if it doesn't exist already) and run migrations.
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```
4. Run local server
```bash
php -S localhost:8000 -t public
```

## Author
[Karol Dabrowski](https://karoldabrowski.com/)

## License
Released under the MIT license.