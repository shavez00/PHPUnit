<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../Octagon.php";

class OctagonCalculatorTest extends TestCase {
    function testInitiateClass()
    {
        $octagonClass = new Octagon(5);
    }

}