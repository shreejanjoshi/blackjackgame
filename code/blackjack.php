<?php

class Blackjack{

    private $player;
    private $dealer;
    private $deck;

    function __construct()
    {
        //7.2 Create a new deck object
        $this->deck = new Deck();

        //7.3 Shuffle the cards with shuffle method on deck.
        $this->deck->shuffle();

        //7.1 Instantiate the Player class twice, insert it into the player property and a dealer property.
        //8.2 Pass this Deck from the Blackjack constructor.
        $this->player = new Player($this->deck);
        $this->dealer = new Player($this->deck);
    }

    public function getPlayer(){
        return $this->player;
    }

    public function getDealer(){
        return $this->dealer;
    }

    public function getDeck(){
        return $this->deck;
    }
}