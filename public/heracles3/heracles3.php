<?php

require '../../vendor/autoload.php';

use Heracles3\Shield;
use Heracles3\Weapon;
use Heracles3\Fighter;
use Heracles3\Hero;
use Heracles3\Monster;
use Heracles3\Arena;

$heracles = new Hero('Heracles', 20, 6, 'heracles.svg');
$bird1 = new Monster('Bird', 25, 12, 'bird.svg');
$bird2 = new Monster('Bird', 25, 12, 'bird.svg');
$bird3 = new Monster('Bird', 25, 12, 'bird.svg');
$sword = new Weapon();
$heracles->setWeapon($sword);
$bow = new Weapon(10, 8, 'bow.svg');
$heracles->setWeapon($bow);
$shield = new Shield();
$heracles->setShield($shield);
$heracles->setX(5);
$heracles->setY(3);
$bird1->setX(2);
$bird1->setY(2);
$bird2->setX(1);
$bird2->setY(1);
$bird3->setX(3);
$bird3->setY(3);
$monsters = [$bird1, $bird2, $bird3];
$arena = new Arena($monsters, $heracles, 10);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            /* head included */
            include '../includes/head.html';
        ?>
        <link rel="stylesheet" href="../assets/css/heracles3.css">
        <title>Heracles Labours 3</title>
    </head>
    <?php
        /* navbar included */
        include '../includes/navbar.php';
    ?>
    <body>
        <header>
            <h2>Heracles - Workshop OOP 3</h2>
            <h3>Heracles vs Stymphalian Birds</h3>
            <a class="btn reset" href="?reset=reset">Restart the Game</a>
        </header>
        <main>
            <div class="fighters">
                <a href="#hero">
                    <figure class="heracles">
                        <img src="<?= $heracles->getImage() ?>" alt="heracles">
                        <figcaption><?= $heracles->getName() ?></figcaption>
                    </figure>
                </a>
            </div>
            <?php include 'map.php' ?>
        </main>
        <?php include 'inventory.php' ?>
    </body>
</html>
