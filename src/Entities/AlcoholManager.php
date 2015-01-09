<?php namespace Duffleman\Entities;

use Duffleman\Contracts\PersonInterface;
use Illuminate\Support\Collection;

class AlcoholManager {

    protected $people;
    private $lastRound;
    protected $totalDrinksConsumed;
    protected $totalRounds;
    protected $drunkPeople;

    public function __construct()
    {
        $this->people = new Collection;
        $this->drunkPeople = new Collection;
    }

    public function push(PersonInterface $person)
    {
        $this->people->push($person);
    }

    public function startRound(DrinkingRound $round)
    {
        $this->lastRound = $round;
        $this->totalRounds += 1;
        foreach ($this->people as $person)
        {
            $person->consume($round->drink);
            $this->totalDrinksConsumed += 1;
            if ($person->isDrunk())
            {
                $this->drunkPeople->push($person);
            }
            echo("<br>"); // just for page formatting
        }
    }

    public function repeat()
    {
        if (!$this->lastRound)
        {
            throw new Exception('Cannot repeat a round, you never declared a first round!');
        }
        $this->startRound($this->lastRound);
    }

    function __get($name)
    {
        return $this->$name;
    }

}