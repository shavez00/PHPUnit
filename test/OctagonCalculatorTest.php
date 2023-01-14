<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../Octagon.php";

class OctagonCalculatorTest extends TestCase {
    public function testInitiateClass()
    {
        $octagonClass = new Octagon(5);

        $this->assertTrue(true);
        $this->assertInstanceOf("Octagon", $octagonClass);
    }

    public function testCalculatePerimeterWithSideLength10() {
        $octagonCalculator = new Octagon(10);
        $perimeter = $octagonCalculator->getPerimeter();

        $this->assertEquals(80, $perimeter);
    }

    public function testCalculateAreaOfAnOctagonWithSideLength10() {
        $octagonAreaCalculator = new Octagon(10);
        $area = $octagonAreaCalculator->getArea();

        $this->assertEquals(482.842712, $area);

    }

}