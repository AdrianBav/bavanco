<p align="center">
    <img src="http://microsites.adrianbavister.com/media/bavanco.png" alt="Bavanco">
</p>


## Introduction

This official bavanco website.


## Deployment

Steps to deploy this site:

### Git
Clone the **bavanco** repository into a new directory.

    cd /path/to/projects
    git clone git@github.com:AdrianBav/bavanco.git new-project-name


### Composer
The **composer.lock** file is used to list all the installed dependencies at a given time. On running **composer install** it looks for this file. If the command finds it, it will use the versions listed in this file - no matter how outdated! If there is no lock file, it will look for the newest versions of the required packages, generate a completely new composer.lock file, and proceed as usual.

    composer install --no-dev -o

Notice how we used **--no-dev** to prevent installing the dev packages and make the installation faster. We also used the option **-o** which is short for **--optimize-autoloader** and builds a classmap - a special file which turns all namespace-to-classes combinations (from the autoload section of composer.json) into a fixed pre-calculated array, which in most cases significantly speeds up autoloading.


### Directory Permissions
Directories within the **storage** and the **bootstrap/cache** directories should be writable by your web server.

Check which user PHP-FPM is running as, (commonly www-data)

    ps aux | grep php

Change owner of storage and bootstrap/cache laravel directories:

    cd /var/www/myapp
    sudo chown -R adrian:www-data storage bootstrap/cache


### Environment File
In a fresh Laravel installation, the root directory contains a **.env.example** file. If you install Laravel via Composer, this file will automatically be renamed to **.env**. Otherwise, you should rename the file manually.

    cp .env.example .env

Set the required values.

Most importantly, for production **APP_ENV** should be set to **'production'** and **debug** should be set to **'false'**. Use the **.env.example** file as a reference.

The next thing you should do is set your **application key** to a random string. If you installed Laravel via Composer or the Laravel installer, this key has already been set for you. Typically, this string should be 32 characters long. The key can be set in the .env environment file. **If the application key is not set, your user sessions and other encrypted data will not be secure!**

    php artisan key:generate


### Configuration Caching
To give your application a speed boost, you should cache all of your configuration files into a single file using the **config:cache** Artisan command. This will combine all of the configuration options for your application into a single file which will be loaded quickly by the framework.

    php artisan config:cache


### Database
To run all outstanding migrations for your application, use the migrate Artisan command.

    php artisan migrate

If you receive a **class not found** error when running migrations, try running the **dump-autoload** command and re-issuing the migrate command.

    composer dump-autoload

Some migration operations are destructive, meaning they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before these commands are executed. To force the commands to run without a prompt, use the **--force** flag:

    php artisan migrate –force

You may use the **db:seed** Artisan command to seed your database. By default, the **db:seed** command runs the **DatabaseSeeder** class, which may be used to call other seed classes. However, you may use the **--class** option to specify a specific seeder class to run individually:

    php artisan db:seed
    php artisan db:seed --class=UsersTableSeeder

### Compiling Assets
Before triggering Mix, you must first ensure that Node.js and NPM are installed on your machine.

    node -v
    npm -v

The next step is to install Laravel Mix.

    npm install

The last step is to run mix.
When run on production, assets will be automatically minimized.

    npm run production

**Note:** To clear out all compiled assets, run the following command:

    php artisan public:clear


### Public Assets
The photographs for this project are not checked into the repository. These need to be copied to the server seperatly.
To make them accessible from the web, you should create a symbolic link from **public/storage** to **storage/app/public.**

To create the symbolic link, you may use the **storage:link** Artisan command:

    php artisan storage:link

Lastly, upload the public assets to **storage/app/public.**


## Copyright Notice

Copyright © 2018 Bavanco
