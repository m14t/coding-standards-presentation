<?php

namespace m14t;

class CollectionWithStandardReturnTypes
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
        $key = array_search($value, $this->data, true);
        
        if (false === $key) {
            throw new ValueNotFoundException();
        }

        return $key;
    }
}
