<?php

include('CollectionWithNonstandardReturnTypes.php');
include('CollectionWithStandardReturnTypes.php');
include('ValueNotFoundException.php');

$searchTerm = 'm14t';

$c = new \m14t\CollectionWithNonstandardReturnTypes();
$key = $c->findByVal($searchTerm);
if (0 === $key) {
    echo "Search term '$searchTerm' is the first value in our collection!\n";
} else {
    //-- Uhh oh! We now have a different bug here! We mistakenly assumed that
    //   the `findByVal` method would always be able to find our value, which
    //   isn't the case here!
    echo "Search term '$searchTerm' NOT is the first value in our collection!\n";
}


echo "\n=== vs ===\n\n";


$c = new \m14t\CollectionWithStandardReturnTypes();
$key = $c->findByVal($searchTerm);
//-- This will now throw an exception when the key is not found instead of a 
//   confusing FALSE return value.

if (0 === $key) {
    echo "Search term '$searchTerm' is the first value in our collection!\n";
} else {
    echo "Search term '$searchTerm' NOT is the first value in our collection!\n";
}
