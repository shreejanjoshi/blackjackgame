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

require 'Blackjack.php';
require 'Card.php';
require 'Deck.php';
require 'Player.php';
require 'Suit.php';

session_start();

if (!isset($_SESSION['blackjack'])) {
    $game = new Blackjack;
    $_SESSION['blackjack'] = new Blackjack();
}

if($_SERVER["REQUEST_METHOD"]== "POST"){

    if(isset($_POST['hit'])){
        $game->getPlayer()-> hit($game->getDeck());
        $_SESSION['blackjack'] = serialize($game);
    }

    if(isset($_POST['stand'])){
        $game->getDealer()-> hit($game->getDeck());
        $_SESSION['blackjack'] = serialize($game);
    }

    if(isset($_POST['stand'])) {
        $blackjack->getDealer()->stand($blackjack->getDeck());
        $_SESSION['blackjack'] = $blackjack;
      }

    if(isset($_POST['surrender'])){
        $game->getPlayer()->lost=true;
        $_SESSION['blackjack'] = serialize($game);
        $outcome = "Player lose";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <h2>Dealer</h2>
        <p><strong><?php foreach($game->getDealer()->getScore() as $)
        ?></strong></p>
    </div>

    <div>
        <h2>Plater</h2>
        <p><strong>Point= <?php ?></strong></p>
    </div>

    <form method="post">
        <button type="submit" class="btn btn-primary" name="hit">Hit</button>
        <button type="submit" class="btn btn-primary" name="stand">Stand</button>
        <button type="submit" class="btn btn-primary" name="surrender">Surrender</button>
    </form>

</body>

</html>