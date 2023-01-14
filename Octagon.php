<?php

class Octagon {
    private $sideLength = null;
    public function __construct($sideLength) {
        $this->sideLength = $sideLength;
    }

    public function getPerimeter() {
        return $this->sideLength*8;
    }

    public function getArea() {
        return round((2*pow($this->sideLength,2))*(1+sqrt(2)),6);
    }
}