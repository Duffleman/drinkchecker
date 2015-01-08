<?php namespace Duffleman\Contracts;

abstract class FoodItem implements FoodItemInterface {

    /**
     * Name of the consumable item
     * @var
     */
    protected $name;

    /**
     * How much alcohol in units the food contains
     * @var
     */
    protected $units;
    
    /**
     * Setters for the above variables.
     * @param $name
     * @param $units
     */
    function __construct($name, $units)
    {
        $this->name = $name;
        $this->units = $units;
    }

    /**
     * Allows the food to be consumed
     * @param \Duffleman\Contracts\PersonInterface $person
     * @param int                                  $quantity
     * @return mixed
     */
    public function consume(PersonInterface $person, $quantity = 1)
    {
        echo($person->name . ' consumes ' . $quantity . ' ' . $this->name . '.');

        return true;
    }

    /**
     * Getter for Units
     * @return mixed
     */
    public function units()
    {
        return $this->units;
    }

}