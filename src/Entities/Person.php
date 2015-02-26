<?php namespace Duffleman\Entities;

use Duffleman\Contracts\FoodItemInterface;
use Duffleman\Contracts\HomeInterface;
use Duffleman\Contracts\PersonInterface;

class Person implements PersonInterface
{
    /**
     * Name of the person.
     *
     * @var
     */
    protected $name;

    /**
     * Are they drunk?
     *
     * @var bool
     */
    protected $isDrunk;

    /**
     * How many have they consumed?
     *
     * @var int
     */
    protected $drinksConsumed;

    /**
     * Where do they live?
     */
    protected $home;

    /**
     * How many units have they consumed?
     *
     * @var
     */
    protected $unitsConsumed;

    /**
     * How many units of alcohol can they handle?
     *
     * @var
     */
    protected $unitsAllowed;

    /**
     * Sets the override drink.
     *
     * @var \Duffleman\Contracts\FoodItemInterface
     */
    protected $override;

    /**
     * @param                                       $name
     * @param                                       $unitsAllowed
     * @param int                                   $drinksConsumed
     * @param \Duffleman\Classes\Home\HomeInterface $home
     * @param bool                                  $isDrunk
     */
    public function __construct($name, $unitsAllowed, HomeInterface $home = null, FoodItemInterface $overrideDrink = null, $drinksConsumed = 0, $isDrunk = false)
    {
        $this->drinksConsumed = $drinksConsumed;
        $this->unitsAllowed = $unitsAllowed;
        $this->home = $home;
        $this->isDrunk = $isDrunk;
        $this->name = $name;
        $this->override = $overrideDrink;
    }

    /**
     * Allows for consuming a drink.
     *
     * @param \Duffleman\Contracts\FoodItemInterface $item
     * @param int                                    $quantity
     */
    public function consume(FoodItemInterface $item, $quantity = 1)
    {
        $item = $this->override ?: $item;
        $item->consume($this, $quantity);
        $this->unitsConsumed += $item->units();
        $this->drinksConsumed += $quantity;
    }

    /**
     * Figure out if they are drunk.
     *
     * @return bool
     */
    public function isDrunk()
    {
        if ($this->unitsConsumed >= $this->unitsAllowed) {
            $this->isDrunk = true;
        }

        return $this->isDrunk;
    }

    /**
     * Send them home.
     */
    public function goHome()
    {
        if (!$this->home) {
            echo('No home on record, trying to go to previously used home');
        } else {
            echo('Returning home to '.$this->home->name);
        }
    }

    /**
     * Determine how far above their limit they are.
     *
     * @return int
     */
    public function over()
    {
        if ($this->unitsAllowed >= $this->unitsConsumed) {
            return 0;
        }

        return $this->unitsConsumed % $this->unitsAllowed;
    }

    /**
     * Getters for all objects since nothing here is really private apart from their home.
     * Other than their home.
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if ($name == 'home') {
            throw new Exception('The `home` variable is protected');
        }

        return $this->$name;
    }
}
