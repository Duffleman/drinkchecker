<?php namespace Duffleman\Entities;

use Duffleman\Contracts\FoodItemInterface;

class DrinkingRound
{

    /**
     * Stores the specific drink for this round.
     * @var \Duffleman\Contracts\FoodItemInterface
     */
    public $drink;

    /**
     * @param \Duffleman\Contracts\FoodItemInterface $item
     */
    public function __construct(FoodItemInterface $item)
    {
        $this->drink = $item;
    }
}
