<?php

function echon($mess) {
	echo $mess . "<br>";
}
$x = 100;

$addition = function($a, $b) use ($x) {
	return $a + $b + $x;
};

echon ($addition(1, 2));

$taxRate = 0.05; // 5% tax rate

$calculateTotal = function ($price) use ($taxRate) {
	return $price + ($price * $taxRate);
};

echon ($calculateTotal(100)); // Intended to output: 105

$calculateTotal2 = function ($price, $taxRate) {
	return $price + ($price * $taxRate);
};

echon ($calculateTotal(100, $taxRate)); // Intended to output: 105

