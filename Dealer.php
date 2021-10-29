<?php
declare(strict_types=1);

class Dealer extends Player
{
    public function dealerHit(Deck $deck)
    {
        while ($this->getScore()<15){
            parent::hit($deck);
        }
    }
}