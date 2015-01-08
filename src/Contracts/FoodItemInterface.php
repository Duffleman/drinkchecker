<?php namespace Duffleman\Contracts;

interface FoodItemInterface {

    /**
     * Setters for the class
     * @param $name
     * @param $units
     */
    public function __construct($name, $units);

    /**
     * Allows the food to be consumed
     * @param \Duffleman\Contracts\PersonInterface $person
     * @param int                                  $quantity
     * @return mixed
     */
    public function consume(PersonInterface $person, $quantity = 1);

    /**
     * Getter for units in the food item.
     * @return mixed
     */
    public function units();
}