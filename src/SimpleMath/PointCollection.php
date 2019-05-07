<?php

namespace SimpleMath;

class PointCollection implements PointCollectionInterface
{
    private $items;

    public function __construct(PointInterface ...$items)
    {
        $this->items = $items;
    }

    public function getAverage(): PointInterface
    {
        $itemsCount = count($this->items);
        if (! $itemsCount) {
            throw new \Exception('Empty collection, can\'t calculate average.');
        }

        $itemsSum = new Point(0, 0);

        $itemsSum->product(...$this->items);
        return $itemsSum->deriveAverage($itemsCount);
    }

    public function add(PointInterface $item)
    {
        $this->items[] = $item;
    }

    public function findFarthestDistanceFromPoint(PointInterface $point): float
    {
        $itemsCount = count($this->items);
        if (! $itemsCount) {
            throw new \Exception('Empty collection, can\'t find farthest.');
        }

        return $point->getTheFarthestDistanceFromPoints(...$this->items);
    }
}
