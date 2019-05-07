<?php

namespace SimpleMath;

class Vector extends Point implements VectorInterface
{
    const DEGREE_TO_RADIAN = 1 / 180 * M_PI;

    public function __construct(float $magnitude, float $direction)
    {
        $radian = $direction * static::DEGREE_TO_RADIAN;
        parent::__construct(
            $magnitude * cos($radian),
            $magnitude * sin($radian)
        );
    }

    public function add(VectorInterface $vector): VectorInterface
    {
        parent::product($vector);

        return $this;
    }
}
