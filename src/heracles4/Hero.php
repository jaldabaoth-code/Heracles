<?php

namespace Heracles4;

class Hero extends Fighter
{
    public const DEFAULT_HEROXP = 1000;
    private ?Weapon $weapon = null;
    private ?Shield $shield = null;
    public int $experience = self::DEFAULT_HEROXP;

    public function getDamage(): int
    {
        $damage = $this->getStrength();
        if ($this->getWeapon() !== null) {
            $damage += $this->getWeapon()->getDamage();
        }
        return $damage;
    }

    public function getDefense(): int
    {
        $defense = $this->getDexterity();
        if ($this->getShield() !== null) {
            $defense += $this->getShield()->getProtection();
        }    
        return $defense;
    }

    /**
     * Get the value of range
     */ 
    public function getRange(): float
    {
        $range = $this->range;
        if ($this->getWeapon() instanceof Weapon) {
            $range += $this->getWeapon()->getRange();
        }
        return $range;
    }

    /**
     * Get the value of weapon
     */
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * Set the value of weapon
     */
    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * Get the value of shield
     */
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * Set the value of shield
     */
    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }
}
