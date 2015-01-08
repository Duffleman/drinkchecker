<?php namespace Duffleman\Contracts;

abstract class Person implements PersonInterface {

    /**
     * Name of the person
     * @var
     */
    protected $name;

    /**
     * Are they drunk?
     * @var bool
     */
    protected $isDrunk;

    /**
     * How many have they consumed?
     * @var int
     */
    protected $drinksConsumed;

    /**
     * Where do they live?
     * @var \Duffleman\Classes\Home\HomeInterface
     */
    protected $home;

    /**
     * How many units have they consumed?
     * @var
     */
    protected $unitsConsumed;
    
    /**
     * How many units of alcohol can they handle?
     * @var
     */
    protected $unitsAllowed;

    /**
     * @param                                       $name
     * @param                                       $unitsAllowed
     * @param int                                   $drinksConsumed
     * @param \Duffleman\Classes\Home\HomeInterface $home
     * @param bool                                  $isDrunk
     */
    function __construct($name, $unitsAllowed, HomeInterface $home = null, $drinksConsumed = 0, $isDrunk = false)
    {
        $this->drinksConsumed = $drinksConsumed;
        $this->unitsAllowed = $unitsAllowed;
        $this->home = $home;
        $this->isDrunk = $isDrunk;
        $this->name = $name;
    }

    /**
     * Allows for consuming a drink
     * @param \Duffleman\Contracts\FoodItemInterface $item
     * @param int                                    $quantity
     */
    public function consume(FoodItemInterface $item, $quantity = 1)
    {
        $item->consume($this, $quantity);
        $this->unitsConsumed += $item->units();
        $this->drinksConsumed += $quantity;
    }

    /**
     * Figure out if they are drunk
     * @return bool
     */
    public function isDrunk()
    {
        if ($this->unitsConsumed >= $this->unitsAllowed)
        {
            $this->isDrunk = true;
        }

        return $this->isDrunk;
    }

    /**
     * Send them home
     */
    public function goHome()
    {
        if (!$this->home)
        {
            echo('No home on record, trying to go to previously used home');
        } else
        {
            echo('Returning home to ' . $this->home->name);
        }
    }

    /**
     * Determine how far above their limit they are.
     * @return int
     */
    public function over()
    {
        if ($this->unitsAllowed >= $this->unitsConsumed)
        {
            return 0;
        }

        return $this->unitsConsumed % $this->unitsAllowed;
    }

    /**
     * Getters for all objects since nothing here is really private.
     * Other than their home.
     * @param $name
     * @return mixed
     */
    function __get($name)
    {
        if($name == 'home') {
            throw new Exception('The `home` variable is protected');
        }
        return $this->$name;
    }


}