<?php

namespace Algo_33;
require_once "../vendor/autoload.php";

class StringMatchAlgo{

    /**
     * @var string
     */
    public $sourceArray;

    /**
     * @var string
     */
    public $targetArray;

    /**
     * ArrayMatchAlgo constructor.
     * @param array $sourceArray
     * @param array $targetArray
     */
    public function __construct(array $sourceArray, array $targetArray)
    {
        $this->sourceArray = $sourceArray;

        $this->targetArray = $targetArray;
    }

    public function matchThroughBF()
    {
        $sourceLen = count($this->sourceArray);
        $targetLen = count($this->targetArray);

        sleep(3);
    }
}