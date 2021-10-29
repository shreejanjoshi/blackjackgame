<?php

class Player
{

    private $cards = array();
    private $lost = false;
    private const maxValue = 21;

    //8.1 Make it expect the Deck object as a parameter.
    function __construct($deck)
    {
        //8.3 Now draw 2 cards for the player.
        for ($i = 0; $i < 2; $i++) {
            $this->cards = $deck->drawCard();
        }
    }

    public function hit($deck)
    {
        $this->cards = $deck->drawCard();

        if ($this->getScore() > self::maxValue) {
            return $this->lost = true;
        }
    }

    public function surrender()
    {
        $this->lost = true;
    }

    public function getScore()
    {

        $score = 0;

        //runs throught cards and gets value
        foreach ($this->cards as $cardx) {
            $score += $cardx->getValue();
        }

        return $score;
    }

    public function hasLost()
    {
        return $this->lost;
    }
}
