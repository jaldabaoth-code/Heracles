<?php

namespace Heracles4;

use Exception;

class Arena 
{
    private array $monsters;
    private Hero $hero;
    private int $size = 10;

    public function __construct(Hero $hero, array $monsters)
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
    }

    public function getDistance(Fighter $startFighter, Fighter $endFighter): float
    {
        $XDistance = $endFighter->getX() - $startFighter->getX();
        $YDistance = $endFighter->getY() - $startFighter->getY();
        return sqrt($XDistance ** 2 + $YDistance ** 2);
    }

    public function touchable(Fighter $attacker, Fighter $defender): bool
    {
        return $this->getDistance($attacker, $defender) <= $attacker->getRange();
    }

    /**
     * Get the value of monsters
     */ 
    public function getMonsters(): array
    {
        return $this->monsters;
    }

    /**
     * Set the value of monsters
     */ 
    public function setMonsters($monsters): void
    {
        $this->monsters = $monsters;
    }

    /**
     * Get the value of hero
     */ 
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     */ 
    public function setHero($hero): void
    {
        $this->hero = $hero;
    }

    /**
     * Get the value of size
     */ 
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @throws Exception
     */
    public function move(Fighter $fighter, string $direction)
    {
        $fighterX = $fighter->getX();
        $fighterY = $fighter->getY();
        switch ($direction) {
            case 'N':
                $fighterY--;
                break;
            case 'S':
                $fighterY++;
                break;
            case 'E':
                $fighterX++;
                break;
            case 'W':
                $fighterX--;
        }
        $monsters = $this->getMonsters();
        foreach ($monsters as $monster) {
            if ($fighterX === $monster->getX() && $fighterY === $monster->getY()) {
                throw new Exception('This case is already taken');
            }
        }
        if ($fighterY < 0 || $fighterY >= $this->getSize() || $fighterX < 0 || $fighterX >= $this->getSize()) {
            throw new Exception('This case is out of Arena');
        }
        $fighter->setX($fighterX);
        $fighter->setY($fighterY);
    }

    /**
     * @throws Exception
     */
    public function battle(int $id)
    {
        $monsters = $this->getMonsters();
        $monster = $monsters[$id];
        $hero = $this->hero;
        if ($monster->isAlive()) {
            if ($this->touchable($hero, $monster)) {
                $hero->fight($monster);
            } else {
                throw new Exception('Enemy is far from Hero, and you can\'t touch it');
            }
            if ($this->touchable($monster, $hero)) {
                $monster->fight($hero);
            } else {
                throw new Exception('You are far from enemy, and it can\'t touch you');
            }
        } else {
            $hero->setExperience($hero->getExperience()+$monster->getExperience());
            unset($this->monsters[$id]);
        }
    }
}
