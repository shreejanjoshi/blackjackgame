<?php

class Player{

    private $cards = array();
    private $lost = false;

    //8.1 Make it expect the Deck object as a parameter.
    function __construct($deck)
    {
        //8.3 Now draw 2 cards for the player.
        for ($i=0; $i <2 ; $i++) { 
            $this->cards = $deck->drawCard();
        }
    }

    public function hit(){

    }

    public function surrender(){
        
    }

    public function getScore(){

    }

    public function hasLost(){
        
    }
}