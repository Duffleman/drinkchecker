<?php namespace Duffleman\Entities;

use Duffleman\Contracts\FoodItemInterface;

class DrinkingRound {

    public $drink;

    public function __construct(FoodItemInterface $item)
    {
        $this->drink = $item;
    }

}