# drinkchecker
I was bored and wanted to test how Interfaces can be used as Type Hints for Dependency Injection


## Requirements
PHP 5.4, you may get away with 5.3 I'm not entirely sure.

## Usage

Download the repo, and use composer to grab the related packages.

```
composer install --no-dev
```

Then you can use a server of your choice, to host the files. Run `index.php` and you'll see how it works.

You can also build new people with their units allowed like this:

```php
$person = new Human('My Name', 20, new Home('My Home'));
$person->consume(new Drink('Vodka and Lemonade', 2));
```
