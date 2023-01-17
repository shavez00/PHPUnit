<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Octagon.php";

class OctagonCalculatorTest extends TestCase {
    private $testParameter = ["side"=>10,"perimeter"=>80,"area"=>482.842712];

    public function testInitiateClass()
    {
        $octagonClass = new Octagon($this->testParameter["side"]);

        $this->assertTrue(true);
        $this->assertInstanceOf("Octagon", $octagonClass);
    }

    public function testCalculatePerimeterWithSideLength10() {
        $octagonCalculator = new Octagon($this->testParameter["side"]);
        $perimeter = $octagonCalculator->getPerimeter();

        $this->assertEquals($this->testParameter["perimeter"], $perimeter);
    }

    public function testCalculateAreaOfAnOctagonWithSideLength10() {
        $octagonAreaCalculator = new Octagon($this->testParameter["side"]);
        $area = $octagonAreaCalculator->getArea();

        $this->assertEquals($this->testParameter["area"], $area);

    }

}