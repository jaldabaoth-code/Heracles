<?php

namespace Heracles1;

class Fighter
{
    public const MAX_LIFE = 100;
    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life = self::MAX_LIFE;

    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function setLife(int $life): void
    {
        if ($life < 0) {
            $life = 0;
        }
        $this->life = $life;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function fight(Fighter $attacked)
    {
        $damage = rand(1, $this->getStrength());
        $damage -= $attacked->getDexterity();
        if ($damage < 0) {
            $damage = 0;
        }
        $newAttackedLife = $attacked->getLife() - $damage;
        $attacked->setLife($newAttackedLife);
    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }
}
