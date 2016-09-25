## Base Skeleton CMS

### Description

Base Skeleton is a CMS made with [Laravel 5.3](https://laravel.com) and running on [Docker](https://www.docker.com/) which 
supports the following functions:

* `Product` and `Article` (blog post) management.
* Classify `Products` and `Articles` by `Categories` ang `Tags`.
* Social authentication and interaction integrated (support login, like, share and comment with Facebook).
* `Cart` and `Order` management for `Product`.
* `Rating` and `Review` management for `Article`.

### Instruction

###### Requirement

* Docker
* Docker Compose

###### Installation

1. Go to project's `laradock` folder with `cd laradock` on your terminal.
2. Run `docker-compose up -d` to setup server's stacks.
3. Run `docker exec -it --user=laradock laradock_workspace_1 bash` to login the `workspace` container.
4. Run `composer install` to install PHP dependencies.
5. Run `php artisan migrate --seed` to create database schema and seed some default data.
6. Run `npm i` to install Javascript dependencies. If you're on Docker for Windows or a guest VM with Windows host, run 
the command above with `--no-bin-links` attribute.

###### Daily Usage

1. Go to `laradock` folder.
2. Run `docker-compose up -d` to start server.
3. Link to CMS page: `http://{ip_address}:8000/cms`, with credentials: `admin` / `admin`.

### Inspiration By

* [L5ESK](https://github.com/sroutier/laravel-5.1-enterprise-starter-kit)
* [Laradock](https://github.com/LaraDock/laradock)
* [Prestissimo for Composer](https://github.com/hirak/prestissimo)

### Plugins Included

* [Generator](https://github.com/laracasts/Laravel-5-Generators-Extended)
* [Debugbar](https://github.com/barryvdh/laravel-debugbar)
* [Carbon](https://github.com/briannesbitt/Carbon)
* [Gravatar](https://github.com/creativeorange/gravatar)
* [Eloquent Sluggable](https://github.com/cviebrock/eloquent-sluggable)
* [Flash](https://github.com/laracasts/flash)
* [Dialect](https://github.com/darrylkuhn/dialect)
* [Former](https://github.com/formers/former)
* [Laravel Elfinder](https://github.com/barryvdh/laravel-elfinder)
* [Shopping Cart](https://github.com/Crinsane/LaravelShoppingcart)
* [Laravel Stapler](https://github.com/CodeSleeve/laravel-stapler)
* [Socialite](https://github.com/laravel/socialite)
* [No Captcha](https://github.com/anhskohbo/no-captcha)
* ...