# Blogging Test

Just a little PHP test using Larrvel to build a small blogging system


## Features

- Allows user to register and make blog posts
- Allows users to comment on blog posts
- Allows users to like blog posts

## Tech

Bog uses a few of open source projects to work properly:

- [PHP](https://www.php.net/releases/8.0/en.php) - PHP web language
- [Composer](https://getcomposer.org/) - package installer for PHP
- [Laravel](https://laravel.com/) - MVC framework using PHP
- [Twitter Bootstrap] - great UI boilerplate for modern web apps
- [node.js] - evented I/O for the backend


## Installation

First step would be to clone this repo, this would create a blog folder. From this folder, you will run the installation steps

#### 1. Install PHP:
Laravel requires PHP. You can install PHP using your system's package manager or by downloading it from the official PHP website.

On Ubuntu/Debian:
```sh
sudo apt update
sudo apt install php php-cli php-mbstring php-dom php-mysql
```

On MacOS:
```sh
brew install php@8.0
```

#### 2. Install Composer:
Composer is a dependency manager for PHP. You'll need Composer to install Laravel and its dependencies.

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

#### 3. Install Node.js and npm:
Laravel Mix, the build tool used in Laravel for asset compilation, requires Node.js and npm.

On Ubuntu/Debian:
You can install Node.js and npm using apt.

```sh
sudo apt install nodejs npm
```

On MacOS:
You can install Node.js and npm using Homebrew.

```sh
brew install node
```


#### 4. Verify Installation:
After installing PHP, Composer, Node.js, and npm, you can verify the installations by running the following commands:
```sh
php --version
composer --version
node --version
npm --version
```

#### 5. Install MySQL Server:
You can install MySQL Server using your system's package manager or by downloading it from the official MySQL website.

On Ubuntu/Debian:
```sh
sudo apt update
sudo apt install mysql-server
```
On macOS:
You can install MySQL using Homebrew.
```sh
brew install mysql
```

For the next set of commands you will need to navigate to the project folder:

#### 1. Install Composer dependancies:
Laravel uses Composer to manage its dependencies. Run the following command to install all the required dependencies:

```sh
composer install
```

#### 2. Generate Application Key:
Laravel requires an application key for security purposes. Generate it using the following Artisan command:

```sh
php artisan key:generate
```

#### 3. Configure DB:
You will need to create a new database named "blog" on your MySQL install, you can use your favourite DB Client or the mysql command line.

Update your .env file with the following:
```sh
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=blog 
DB_USERNAME=root 
DB_PASSWORD= 
```

#### 4. Migrate DB:
Use the following Artisan commands to run migrations and seeder:
```sh
php artisan migrate
php artisan db:seed --class=UserSeeder
```

#### 5. Startup server:
At this point everything should be ready to go, you will need to open a separate terminal to run some npm commands. For now in this step we will startup the server:
```sh
php artisan serve
```

#### 6. Startup node:
This step will setup the ui packages neeed, open a separate terminal and navigate to your install folder.
```sh
npm i
npm run dev
```

At this point you would have two tabs open, one running the artisan server and one for the ndoe server. Browse to the url below, and you should be able to register a with the Seed User

username: blog@example.com
password: password

http://127.0.0.1:8000/login

## License

MIT

**Free Software, Hell Yeah!**
