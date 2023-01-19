<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Octagon.php";

class OctagonCalculatorTest extends TestCase {
    public function setUp() : void {
        $this->testParameter = ["side"=>10,"perimeter"=>80,"area"=>482.842712];
        $this->Octagon = new Octagon($this->testParameter["side"]);
    }

    public function tearDown() : void {
        unset ($this->Octagon);
        unset($this->testParameter);
    }

    public function testInitiateClass()
    {
        $this->assertTrue(true);
        $this->assertInstanceOf("Octagon", $this->Octagon);
    }

    public function testCalculatePerimeterWithSideLength10() {
        $perimeter = $this->Octagon->getPerimeter();

        $this->assertEquals($this->testParameter["perimeter"], $perimeter);
    }

    public function testCalculateAreaOfAnOctagonWithSideLength10() {
        $area = $this->Octagon->getArea();

        $this->assertEquals($this->testParameter["area"], $area);

    }

}