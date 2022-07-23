<?php

namespace Heracles2;

class Weapon {
    private int $damage = 10;
    private string $image = 'sword.svg';

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getImage(): string
    {
        return '../assets/images/' . $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
