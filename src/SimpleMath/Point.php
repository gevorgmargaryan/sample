<?php

namespace SimpleMath;

class Point implements PointInterface
{
    protected $x;
    protected $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return round($this->x, 4) . ' ' . round($this->y, 4);
    }

    public function getDistanceFromPoint(PointInterface $point): float
    {
        return sqrt(($point->x - $this->x) ** 2 + ($point->y - $this->y) ** 2);
    }

    public function deriveAverage(int $averageNumber): PointInterface
    {
        return new Point($this->x / $averageNumber, $this->y / $averageNumber);
    }

    public function product(PointInterface ...$points): PointInterface
    {
        foreach ($points as $point) {
            $this->x += $point->x;
            $this->y += $point->y;
        }

        return $this;
    }

    public function getTheFarthestDistanceFromPoints(PointInterface $first, PointInterface ...$rest): float
    {
        $max = $this->getDistanceFromPoint($first);

        foreach ($rest as $point) {
            $distance = $this->getDistanceFromPoint($point);
            if ($distance > $max) {
                $max = $distance;
            }
        }

        return $max;
    }
}
