<?php namespace Duffleman\Contracts;

interface PersonInterface
{
    /**
     * Sets the name for the person.
     *
     * @param $name
     */
    public function __construct($name, $unitsAllowed);

    /**
     * Has the given person consume a food item.
     *
     * @param \Duffleman\Contracts\FoodItem $item
     *
     * @return mixed
     */
    public function consume(FoodItemInterface $item);

    /**
     * Checks to see if the person is drunk.
     *
     * @return mixed
     */
    public function isDrunk();

    /**
     * Sends the person home.
     *
     * @return mixed
     */
    public function goHome();

    /**
     * How far above the limit are they?
     *
     * @return mixed
     */
    public function over();
}
