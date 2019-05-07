<?php

require_once 'Autoload.php';

use SimpleMath\Vector;
use SimpleMath\Point;
use SimpleMath\PointCollection;

$sampleInPath = $argv[1] ?? null;
if (! $sampleInPath || ! file_exists($sampleInPath)) {
    throw new Exception(sprintf('Sample file: %s with input data does not exists.', $sampleInPath));
}

$inputRes = fopen($sampleInPath, 'r');

while (fscanf($inputRes, "%d", $personsCount) > 0 && $personsCount) {
    $destinations = new PointCollection();
    for ($i = 0; $i < $personsCount; $i++) {
        $personDataString = fgets($inputRes);
        $personData = explode(' ', str_replace(['start ', 'walk ', 'turn '], '', $personDataString));

        $destinations->add(buildPersonData(...$personData));
    }

    $averageDestination = $destinations->getAverage();

    echo $averageDestination,
        ' ',
        round($destinations->findFarthestDistanceFromPoint($averageDestination), 4),
        PHP_EOL;
}

fclose($inputRes);

function buildPersonData($startX, $startY, $startDirection, $startMagnitude, ...$instructions): \SimpleMath\PointInterface
{
    $instruction = new Vector((float) $startMagnitude, (float) $startDirection);
    $nextDirection = $startDirection;
    $restInstructionsCount = count($instructions);
    for ($i = 0; $i < $restInstructionsCount; $i += 2) {
        $nextDirection += (float) $instructions[$i];
        $instruction->add(new Vector((float) $instructions[$i + 1], $nextDirection));
    }

    $startPoint = new Point($startX, $startY);

    return $startPoint->product($instruction);
}
