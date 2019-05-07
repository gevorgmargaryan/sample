<?php

namespace SimpleMath;

interface PointInterface
{
    /**
     * Calculates distance to the given point.
     *
     * @param PointInterface $point
     * @return float
     */
    public function getDistanceFromPoint(PointInterface $point): float;

    /**
     * Finds the furthest point from the given points.
     *
     * @param PointInterface $first
     * @param PointInterface ...$rest
     * @return float
     */
    public function getTheFarthestDistanceFromPoints(PointInterface $first, PointInterface ...$rest): float;

    /**
     * Calculates average point.
     *
     * @param int $averageNumber
     * @return PointInterface
     */
    public function deriveAverage(int $averageNumber): PointInterface;

    /**
     * Calculates product with the given point.
     *
     * @param PointInterface ...$points
     * @return PointInterface
     */
    public function product(PointInterface ...$points): PointInterface;
}
