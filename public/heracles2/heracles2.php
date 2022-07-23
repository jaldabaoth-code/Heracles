<?php

require '../../vendor/autoload.php';

use Heracles2\Fighter;
use Heracles2\Weapon;
use Heracles2\Shield;

$heracles = new Fighter('Heracles', 20, 6, 'heracles.svg');
$boar = new Fighter('Erymanthian Boar', 25, 12, 'boar.svg');
$weapon = new Weapon();
$heracles->setWeapon($weapon);
$shield = new Shield();
$heracles->setShield($shield);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            /* head included */
            include '../includes/head.html';
        ?>
        <link rel="stylesheet" href="../assets/css/heracles2.css">
        <title>Heracles Labours 2</title>
    </head>
    <?php
        /* navbar included */
        include '../includes/navbar.php';
    ?>
    <body>
        <header>
            <h2>Heracles - Workshop OOP 2</h2>
            <h3>Heracles vs Erymanthian Boar</h3>
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
                <div class="fight">🗡️</div>
                <figure class="monster">
                    <img src="<?= $boar->getImage() ?>" alt="monster">
                    <figcaption><?= $boar->getName() ?></figcaption>
                </figure>
            </div>
            <?php
                $i = 1;
                while ($heracles->isAlive() && $boar->isAlive()) : ?>
                    <section class="round">
                        <h4 class="number">Round <?= $i ?></h4>
                        <?php $heracles->fight($boar); ?>
                        <?php $boar->fight($heracles); ?>
                        <div class="life">
                            <div><?= $heracles->getLife() ?></div>
                            <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $heracles->getLife() ?>"></progress>
                            <progress max="<?= Fighter::MAX_LIFE ?>" value="<?= $boar->getLife() ?>"></progress>
                            <div><?= $boar->getLife() ?></div>
                        </div>
                        <?php $i++; ?>
                    </section>
                <?php endwhile;
                if (!$heracles->isAlive()) {
                    $winner = $boar;
                    $loser = $heracles;
                } else {
                    $winner = $heracles;
                    $loser = $boar;
                }
            ?>
            <section class="win">
                <p>💀 <?= $loser->getName() ?> is dead</p>
                <p>🏆 <?= $winner->getName() ?> wins (remaining 💙 <?= $winner->getLife() ?>)</p>
            </section>
        </main>
        <?php include 'inventory.php' ?>
    </body>
</html>
