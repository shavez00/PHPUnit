<?php
use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase {
    public function setUp() : void {
        $this->Receipt = new Receipt();
    }

    public function tearDown() : void {
        unset($this->Receipt);
    }

    /**
     * @dataProvider provideSubtotal
     */
    public function testSubtotal($items, $expected) {
        $output = $this->Receipt->subtotal($items);
        $this->assertEquals(
            $expected,
            $output,
            "When summing the Subtotal should equal {$expected}"
        );
    }

    public function provideSubtotal() {
        return [
            'integers' => [[1,2,5,8], 16],
            'negative' => [[-1,2,5,8], 14],
            'float' => [[5,8,25,12.5], 50.5]
        ];
    }

    public function testSubtotalAndCoupon() {
        $input = [0,2,5,8];
        $coupon = 0.2;
        $output = $this->Receipt->subtotal($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            'When summing the subtotal should equal 12'
        );
    }

    public function testSubtotalAndCouponException() {
        $this->expectException(\Exception::class);
        $input = [0,2,5,8];
        $coupon = '20';
        $output = $this->Receipt->subtotal($input, $coupon);
    }

    public function testTax() {
        $inputAmount = 10.00;
        $taxInput = 0.10;
        $output = $this->Receipt->tax($inputAmount, $taxInput);
        $this->assertEquals(
            1,
            $output,
            'The tax calculation should equal 1.00'
        );
    }

    public function testPostTaxTotal() {
        $items=[1,2,5,8];
        $tax=0.20;
        $coupon=null;
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['tax','total'])
            ->getMock();
        $Receipt->expects($this->once())
            ->method('total')
            ->with($items, $coupon)
            ->will($this->returnValue(10.0));
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(10.0, $tax)
            ->will($this->returnValue(1));
        $result = $Receipt->postTaxTotal([1,2,5,8],0.20,null);
        $this->assertEquals(
            11,
            $result,
            'The tax calculation should equal 11'
        );
    }
}