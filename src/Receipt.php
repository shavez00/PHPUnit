<?php
namespace TDD;

class Receipt {
    public function total(array $items = [], $coupon = null){
        if(!is_null($coupon)) {
            if(is_string($coupon) & str_contains($coupon,'%')) {
                $coupon = str_replace('%','',$coupon);
                $coupon = (int)$coupon/100;
            } elseif(is_string($coupon)) {
                throw new \Exception('Illegal value for coupon, must be a percentage in the format of ##% or #.##');
            }
            return round(array_sum($items)-round((array_sum($items)*$coupon),2,PHP_ROUND_HALF_UP),2,PHP_ROUND_HALF_UP);
        }
        return array_sum($items);
    }

    public function tax(float $inputAmount, float $taxInput) {
        $output = NULL;
        try {
            $inputAmount = number_format($inputAmount, 2);
            $output = round(($inputAmount * $taxInput), 2, PHP_ROUND_HALF_UP);
            return $output;
        } catch (exception $e) {
            echo $e->getMessage();
        }
    }

    public function postTaxTotal($items, $tax, $coupon){
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}