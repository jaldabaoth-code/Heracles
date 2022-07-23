<?php

namespace Heracles4;

class Monster extends Fighter
{
    public const DEFAULT_MONSTERXP = 500;
    public int $experience = self::DEFAULT_MONSTERXP;
}
