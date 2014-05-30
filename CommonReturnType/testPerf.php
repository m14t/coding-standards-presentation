<?php

include('CollectionWithNonstandardReturnTypes.php');
include('CollectionWithStandardReturnTypes.php');
include('ValueNotFoundException.php');

$searchTerm = 'm14t';
$iterations = 10000;

$c = new \m14t\CollectionWithNonstandardReturnTypes();
$cNonstandardRTStart = microtime(true);
for ($i = $iterations; $i > 0; $i--) {
    $key = $c->findByVal($searchTerm);
    if (false === $key) {
        //-- Handle case where the $searchTerm is not in our collection.
    }
}
$cNonstandardRTEnd = microtime(true);
$cNonstandardRTTime = $cNonstandardRTEnd - $cNonstandardRTStart;

//----------------------

$c = new \m14t\CollectionWithStandardReturnTypes();
$cStandardRTStart = microtime(true);
for ($i = $iterations; $i > 0; $i--) {
    try {
        $key = $c->findByVal($searchTerm);
    } catch (\m14t\ValueNotFoundException $e) {
        //-- Handle case where the $searchTerm is not in our collection.
    }
}
$cStandardRTEnd = microtime(true);

//-- Calculate the difference in time
$cStandardRTTime = $cStandardRTEnd - $cStandardRTStart;
$diffTime = $cStandardRTTime - $cNonstandardRTTime;
$diffTimePerIteration = $diffTime / $iterations;
$diffPercent = $diffTime / $cStandardRTTime;

printf(
    "Using Exceptions over %d iterations was %0.5fms slower per iteration (%0.2f%%).\n",
    $iterations,
    $diffTimePerIteration*1000,
    $diffPercent * 100
);
