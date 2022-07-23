<?php

require '../../vendor/autoload.php';

use Heracles1\Fighter;


echo '<!DOCTYPE html>';
echo '<html lang="en">';
    echo '<head>';
        /* head included */
        include '../includes/head.html';
        echo '<link rel="stylesheet" href="../assets/css/heracles1.css">';
        echo '<title>Heracles Labours 1</title>';
    echo '</head>';
    /* navbar included */
    include '../includes/navbar.php';
    echo '<body>';
        $heracles = new Fighter('🧔 Heracles', 20, 6);
        $lion = new Fighter('🦁 Lion', 11, 13);
        $round = 1;
        echo '<h2>Heracles - Workshop OOP 1</h2>';
        echo '<h3>Heracles vs Nemean Lion</h3>';
        echo '<main>';
            echo '<a class="btn reset" href="?reset=reset">Restart the Game</a>';
            while($heracles->isAlive() && $lion->isAlive()) {
                echo '<section class="round">';
                    echo '<div>';
                        echo '🕛 ROUND ' . $round . PHP_EOL . ' : ';
                        $heracles->fight($lion);
                        $lion->fight($heracles);
                        echo $heracles->getName() . ' 💙' . $heracles->getLife() . PHP_EOL . ' <b>--- VS ---</b> ';
                        echo $lion->getName() . ' 💙' . $lion->getLife() . PHP_EOL;
                        $round++;
                    echo '</div>';
                echo '</section>';
            }
            if ($heracles->isAlive()) {
                $winner = $heracles;
                $loser = $lion;
            } else {
                $winner = $lion;
                $loser = $heracles;
            }
            echo '<b>🏆 '. $winner->getName() . ' is the winner (💙'. $winner->getLife() .') and '. $loser->getName(). ' is dead 💀</b>';
        echo '</main>';
    echo '</body>';
echo '</html>';
