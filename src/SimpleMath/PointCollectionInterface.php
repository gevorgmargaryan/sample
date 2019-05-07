<?php

namespace SimpleMath;

interface PointCollectionInterface
{
    /**
     * Calculates average point.
     *
     * @return PointInterface
     */
    public function getAverage(): PointInterface;

    /**
     * Finds the furthest point from the given point.
     *
     * @param PointInterface $point
     * @return float
     */
    public function findFarthestDistanceFromPoint(PointInterface $point): float;
}
