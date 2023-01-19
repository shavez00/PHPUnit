<?php
namespace TDD;

class Receipt {
    public function total(array $items = []){
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
}