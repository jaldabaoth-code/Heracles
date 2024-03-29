<?php

require '../../vendor/autoload.php';

use Heracles4\Arena;
use Heracles4\Shield;
use Heracles4\Hero;
use Heracles4\Weapon;
use Heracles4\Monster;

session_start();

if (!empty($_GET['reset'])) {
    unset($_SESSION['arena']);
}

$arena = $_SESSION['arena'] ?? null;

/* Initialization */
if (!$arena instanceof Arena) {
    $heracles = new Hero('Heracles', 30, 6, 'heracles.svg');
    $horse1 = new Monster('Mare 1', 25, 12, 'horse.svg');
    $horse2 = new Monster('Mare 2', 25, 12, 'horse.svg');
    $horse3 = new Monster('Mare 3', 25, 12, 'horse.svg');
    $horse4 = new Monster('Mare 4', 25, 12, 'horse.svg');
    $arena = new Arena($heracles, [$horse1, $horse2, $horse3, $horse4]);
    $heracles->setX(0);
    $heracles->setY(0);
    $horse1->setX(3);
    $horse1->setY(2);
    $horse2->setX(3);
    $horse2->setY(3);
    $horse3->setX(4);
    $horse3->setY(3);
    $horse4->setX(6);
    $horse4->setY(6);
    $sword = new Weapon(10);
    $bow = new Weapon(8, 5, 'bow.svg');
    $heracles->setWeapon($sword);
    $shield = new Shield();
    $heracles->setShield($shield);
}

$_SESSION['arena'] = $arena;

try {
    if (!empty($_GET['move']) && method_exists($arena, 'move')) {
        $arena->move($arena->getHero(), $_GET['move']);
    }
    if (isset($_GET['fight']) && method_exists($arena, 'battle')) {
        $arena->battle($_GET['fight']);
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            /* head included */
            include '../includes/head.html';
        ?>
        <title>Heracles Labours 4</title>
        <link rel="stylesheet" href="../assets/css/heracles4.css">
    </head>
    <?php
        /* navbar included */
        include '../includes/navbar.php';
    ?>
    <body>
        <header>
            <h2>Heracles - Workshop OOP 4</h2>
            <h3>Heracles vs Mares of Diomedes</h3>
            <a class="btn reset" href="?reset=reset">Restart the Game</a>
        </header>
        <main>
            <div class="error"><?= $error ?? ''; ?></div>
            <div class="fighters">
                <a href="#hero">
                    <div class="fighter">
                        <figure class="heracles">
                            <img src="<?= $arena->getHero()->getImage() ?>" alt="heracles">
                            <figcaption><?= $arena->getHero()->getName() ?></figcaption>
                        </figure>
                        <progress class="life" max="100"  value="<?= $arena->getHero()->getLife() ?>"></progress>
                    </div>
                </a>
                <?php foreach ($arena->getMonsters() as $monster) : ?>
                    <div class="fighter">
                        <figure class="monster">
                            <img src="<?= $monster->getImage() ?>" alt="monster">
                            <figcaption><?= $monster->getName() . '(' . $monster->getLife() . ')' ?></figcaption>
                        </figure>
                        <progress class="life" max="100" value="<?= $monster->getLife() ?>"></progress>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php include 'map.php' ?>
        </main>
        <?php include 'inventory.php' ?>
        <script src="../assets/js/move.js"></script>
    </body>
</html>
