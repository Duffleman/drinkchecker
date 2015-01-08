<?php

require 'vendor/autoload.php';

use Duffleman\Contracts\FoodItem as FoodContract;
use Duffleman\Contracts\Home as HomeContract;
use Duffleman\Contracts\Person as PersonContract;

class Drink extends FoodContract {}
class Human extends PersonContract {}
class Home extends HomeContract {}

// Create a person
$person = new Human('Jake', 18, new Home('Chalk Farm Residence'));

// While they are not drunk, or they've drank less than or equal to 15.
while (!$person->isDrunk() AND $person->drinksConsumed <= 15)
{
	// Drink another!
    $person->consume(new Drink('JD & Coke', 1));
    echo('<br>');
}

// Send the person home, they've finished drinking.
$person->goHome();

// Stats
echo('<br><br>');
echo $person->name . ' has consumed a total of ' . $person->drinksConsumed . ' drinks, which is ' . $person->unitsConsumed . ' units of alcohol.';
echo '<br>';
echo 'That is ' . $person->over() . ' over his set limit.';