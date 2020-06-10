# SQL Injections in PHP: Practices to avoid

Code related to the blog post [SQL Injections in PHP](https://developer.okta.com/blog/2020/06/15/sql-injection-in-php).

## Prerequisites

* PHP 7
* [composer](https://getcomposer.org)
* PHP pdo_sqlite extension
* Optionally, pdo_mysql extension and an accessible MySQL server

## Install

Execute `composer install` to check dependencies and generate the needed autoload code. That will create the corresponding `vendor/`folder.

Execute `php -S localhost:8080` to launch a local HTTP server listening in port 8080.

Using your browser, access [http://localhost:8080/findStudent.php](http://localhost:8080/findStudent.php) to access
the vulnerable Find Student app.
