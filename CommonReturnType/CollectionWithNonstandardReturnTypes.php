<?php

namespace m14t;

class CollectionWithNonstandardReturnTypes
{
    private $data = array();

    public function __construct($arraySize = 1000)
    {
        //-- Fill the array with some arbitrary data
        for ($i=0; $i<$arraySize; $i++) {
            $this->data[dechex($i)] = $i;
        }
    }

    public function findByVal($value)
    {
        return array_search($value, $this->data, true);
    }
}
