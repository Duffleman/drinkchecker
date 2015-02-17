<?php namespace Duffleman\Entities;

use Duffleman\Contracts\HomeInterface;

class Home implements HomeInterface
{

    /**
     * Name of the home
     * @var
     */
    protected $name;

    /**
     * Sets the name
     * @param $name
     */
    public function __construct($name)
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
