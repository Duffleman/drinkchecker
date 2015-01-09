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

You can build your own manager:


```php
$manager = new AlcoholManager;
$manager->push($person);

// Declare a round of JD & Cokes, 1 unit of alcohol per drink
$round = new DrinkingRound(new Drink('JD & Coke', 1));

$manager->startRound($round);
```

Will give each person a drink in that round, unless they have an override drink set. (See index.php for the example)