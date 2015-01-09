<?php

require 'vendor/autoload.php';

use Duffleman\Contracts\FoodItem as FoodContract;
use Duffleman\Contracts\Home as HomeContract;
use Duffleman\Contracts\Person as PersonContract;
use Duffleman\Entities\AlcoholManager;
use Duffleman\Entities\DrinkingRound;

class Drink extends FoodContract {

}

class Human extends PersonContract {

}

class Home extends HomeContract {

}

// Build our Manager
$manager = new AlcoholManager;

// Create our people
$personOne = new Human('Jake', 18, new Home('Chalk Farm Residence'));
$personTwo = new Human('George', 16, new Home('Whitechapel Mission'), new Drink('Archers and Lemonade', 2));

// Have our manager handle this person
$manager->push($personOne);
$manager->push($personTwo);

// Build a first round
$round = new DrinkingRound(new Drink('JD & Coke', 1));

// Run it!
$manager->startRound($round);

while ($manager->drunkPeople->count() == 0 AND $manager->totalDrinksConsumed <= 50)
{
	// Repeat the previously used round
    $manager->repeat();
}

// Stats
foreach ($manager->people as $person)
{
    echo '<br><br>';
    $status = ($person->isDrunk() ? 'drunk' : 'sober');
    echo $person->name . ' is currently ' . $status . ', and has consumed a total of ' . $person->drinksConsumed . ' drinks, which is ' . $person->unitsConsumed . ' units of alcohol.';
    echo '<br>';
    echo 'That is ' . $person->over() . ' over his set limit.';
}