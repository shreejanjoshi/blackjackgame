<?php
// ___________________________________________________
// function is_palindr($string)
// {
//     $string = strtolower($string);
//     $string = str_replace(' ', '', $string);
//     $pal_check = ($string == strrev($string));
//     return $pal_check;
// }

// $check_string = 'Race Car';

// if (is_palindr($check_string)) {
//     echo "<p>$check_string is a palindrome</p>";
// }
// ____________________________________________________

declare(strict_types=1);

session_start();

require 'blackjack.php';
require 'Card.php';
require 'Deck.php';
require 'example.php';
require 'player.php';
require 'Suit.php';


