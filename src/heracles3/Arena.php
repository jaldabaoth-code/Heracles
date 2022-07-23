<?php

namespace Heracles3;

use Heracles3\Fighter;

class Arena
{
    private array $monsters = [];
    private ?Hero $hero;
    private int $size = 10;

    public function __construct(array $monsters, ?Hero $hero, int $size)
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
        $this->size = $size;
    }

    public function getHero(): Hero
    {
        return $this->hero;
    }

    public function setHero($hero)
    {
        $this->hero = $hero;
    }

    public function getMonsters(): array
    {
        return $this->monsters;
    }

    public function setMonsters($monsters)
    {
        $this->monsters = $monsters;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getDistance(?Fighter $first, ?Fighter $second): float
    {
        return sqrt((($second->getX()-$first->getX())**2) + (($second->getY()-$first->getY())**2));
    }

    public function touchable(?Fighter $attacker, ?Fighter $attacked)
    {
        if ($attacker->getRange() >= $this->getDistance($attacker, $attacked)) {
            return true;
        }
    }
}
