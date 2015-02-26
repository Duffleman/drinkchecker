<?php namespace Duffleman\Entities;

use Duffleman\Contracts\PersonInterface;
use Illuminate\Support\Collection;

class AlcoholManager
{
    /**
     * Collection of people this Manager handles.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $people;
    /**
     * Stores the last round that cycled.
     *
     * @var
     */
    private $lastRound;
    /**
     * Stores the total amount of drinks consumed while this manager has been active.
     *
     * @var
     */
    protected $totalDrinksConsumed;
    /**
     * Number of total rounds this manager has handled.
     *
     * @var
     */
    protected $totalRounds;
    /**
     * A collection of people who are drunk.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $drunkPeople;

    /**
     * Initiators.
     */
    public function __construct()
    {
        $this->people = new Collection();
        $this->drunkPeople = new Collection();
    }

    /**
     * @param \Duffleman\Contracts\PersonInterface $person
     */
    public function push(PersonInterface $person)
    {
        $this->people->push($person);
    }

    /**
     * @param \Duffleman\Entities\DrinkingRound $round
     */
    public function startRound(DrinkingRound $round)
    {
        $this->lastRound = $round;
        $this->totalRounds += 1;
        foreach ($this->people as $person) {
            $person->consume($round->drink);
            $this->totalDrinksConsumed += 1;
            if ($person->isDrunk()) {
                $this->drunkPeople->push($person);
            }
            echo("<br>"); // just for page formatting
        }
    }

    /**
     * @throws \Duffleman\Entities\Exception
     */
    public function repeat()
    {
        if (!$this->lastRound) {
            throw new Exception('Cannot repeat a round, you never declared a first round!');
        }
        $this->startRound($this->lastRound);
    }

    /**
     * @return int
     */
    public function drunkPeopleCount()
    {
        return count($this->drunkPeople);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
