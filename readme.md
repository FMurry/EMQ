# EMQ - Electronic Retail Store

Emmanuel Mendoza, Frederic Murry, David Navarro, Michael Nguyen, Ha Nguyen
San Jose State University - Fall 2016 - CS 160 - Software Engineering

## Where to place the repository

Assuming that your on Windows.

Place this repository into your C:/xampp/htdocs folder

When complete, you should have all our repository files within C:/xampp/htdocs/emq folder

## Setting up the database

This needs to be done if it's your first time pulling the repository.

You'll need to create the database that will be used in laravel.

Start XAMPP with Apache and MySQL activated then visit this site on your browser.
[http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
On the left hand side you should see a small database icon with a green/white plus sign and the word New. Click it.
Then create a database with the name "emqdb"

Next you will open a console within your emq directory and run the following command

php artisan migrate:refresh --seed

Everything should now be setup.

[http://localhost/emq/public/](http://localhost/emq/public)

## Laravel Framework Helpful Links

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.
