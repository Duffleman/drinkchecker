<?php namespace Duffleman\Contracts;

abstract class Home implements HomeInterface {

    /**
     * Name of the home
     * @var
     */
    protected $name;

    /**
     * Sets the name
     * @param $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Getter for all variables since nothing is private.
     * In future, you would append an owner to this object and ensure only the owner can access the home details.
     * But for the purpose of this, and in the context this app will be run, it'll be fine.
     *
     * @param $var
     * @return mixed
     */
    public function __get($var)
    {
        return $this->$var;
    }


}