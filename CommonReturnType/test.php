<?php

include('CollectionWithNonstandardReturnTypes.php');
include('CollectionWithStandardReturnTypes.php');
include('ValueNotFoundException.php');

$searchTerm = 'm14t';

$c = new \m14t\CollectionWithNonstandardReturnTypes();
$key = $c->findByVal($searchTerm);
if (0 === $key) {
    echo "Search term '$searchTerm' is the first value in our collection!\n";
} elseif (false !== $key) {
    echo "Search term '$searchTerm' NOT is the first value in our collection!\n";
} else {
    //-- Handle case where the $searchTerm is not in our collection.
    echo "Search term '$searchTerm' not even in our collection!\n";
}


echo "\n=== vs ===\n\n";


$c = new \m14t\CollectionWithStandardReturnTypes();
try {
    $key = $c->findByVal($searchTerm);

    if (0 === $key) {
        echo "Search term '$searchTerm' is the first value in our collection!\n";
    } else {
        echo "Search term '$searchTerm' NOT is the first value in our collection!\n";
    }
} catch (\m14t\ValueNotFoundException $e) {
    //-- Handle case where the $searchTerm is not in our collection.
    echo "Search term '$searchTerm' not even in our collection!\n";
}
