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
require 'Suit.php';
require 'Player.php';
require 'Dealer.php';

session_start();

if (isset($_POST['restart'])) {
    unset($blackjack);
    unset($_SESSION['blackjack']);
}

if (!isset($_SESSION['blackjack'])) {
    $game = new Blackjack;
    $_SESSION['blackjack'] = new Blackjack();
} else {
    $game = $_SESSION['blackjack'];
}

if (isset($_POST['hit'])) {
    $game->getPlayer()->hit($game->getDeck());
    $_SESSION['blackjack'] = serialize($game);
}

if (isset($_POST['stand'])) {
    $game->getDealer()->hit($game->getDeck());
    $_SESSION['blackjack'] = $game;
}

if (isset($_POST['stand'])) {
    $blackjack->getDealer()->stand($blackjack->getDeck());
}

if (isset($_POST['surrender'])) {
    $game->getPlayer()->surrender();
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
        <?php foreach ($game->getDealer()->getCards() as $i => $card) { ?>
        <?php echo '<span class="card1">' . $card->getUnicodeCharacter(true) . '</span>';
        } ?>
        <span class="score">Points:<?php echo $game->getDealer()->getScore(); ?></span>

        <?php
        if ($game->getPlayer()->hasLost()) {
            echo "Dealer won the Game!!!";
        }
        ?>
    </div>

    <div>
        <h2>Player</h2>
        <?php
        foreach ($game->getPlayer()->getCards() as $i => $card) {
        ?>
        <?php
            echo '<span class="card1">' . $card->getUnicodeCharacter(true) . '</span>';
        }
        ?>
        <span class="score">Points:<?php echo $game->getPlayer()->getScore(); ?></span>
    </div>

    <form method="post">
        <button type="submit" class="btn btn-primary" name="hit">Hit</button>
        <button type="submit" class="btn btn-primary" name="stand">Stand</button>
        <button type="submit" class="btn btn-primary" name="surrender">Surrender</button>
        <button type="submit" class="btn btn-primary" name="restart">Restart</button>
    </form>

</body>

</html>

<style>
    body {
        text-align: center;
    }

    .card1 {
        font-size: 200px;

    }

    .score {
        font-size: 30px;
        font-weight: bold;
        padding-left: 20px;
    }

    h3 {
        font-size: 30px;
        color: red;
    }
</style>