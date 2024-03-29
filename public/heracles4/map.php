<?php if (isset($arena)) : ?>
    <?php if (!$arena->getMonsters()) : ?>
        <p class="won">Heracles WON !!!</p>
    <?php endif; ?>
    <div class="map" style="--tiles-number: <?= $arena->getSize() ?>">
        <img class="compass" src="../assets/images/compass.svg" alt="compass">
        <?php for ($y = 0; $y < $arena->getSize(); $y++) : ?>
            <?php for ($x = 0; $x < $arena->getSize(); $x++) : ?>
                <div>
                    <?php foreach ($arena->getMonsters() as $id=>$fighter) : ?>
                        <?php if ($fighter->getX() === $x && $fighter->getY() === $y) : ?>
                            <a href="?fight=<?= $id ?>">
                                <img data-id="<?= $id ?>" title="Distance to Heracles = <?= method_exists($arena, 'getDistance') ? $arena->getDistance($arena->getHero(), $fighter) : '' ?>" class="monster <?= method_exists($arena, 'touchable') && $arena->touchable($arena->getHero(), $fighter)  ? 'touchable' : 'untouchable' ?>" src="<?= $fighter->getImage(); ?>" alt="">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($arena->getHero()->getX() === $x && $arena->getHero()->getY() === $y) : ?>
                        <img src="<?= $arena->getHero()->getImage(); ?>" alt="">
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        <?php endfor; ?>
    </div>
<?php else : ?>
    <p>Add fighters in Arena</p>
<?php endif; ?>
