<?php

namespace Heracles2;

class Shield {
    private int $protection = 10;
    private string $image = 'shield.svg';

    public function getDefense(): int
    {
        return $this->protection;
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
