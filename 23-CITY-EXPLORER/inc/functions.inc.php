<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function render($view, $params) {
    extract($params);

    ob_start();
    require __DIR__ . '/../views/pages/' . $view . '.php';
    $contents = ob_get_clean();
    
    require __DIR__ . '/../views/layouts/main.view.php';
}

const mb_a = 127462; // for what?
function countryFlag(string $iso2): string {
	$ord_a = ord('a');
	$iso2 = strtolower($iso2);
	if (strlen($iso2) !== 2) {
		echo "iso2 must be a two-letter ISO code";
		die;
	}
	$ch1 = mb_chr(mb_a + ord($iso2[0]) - $ord_a);
	$ch2 = mb_chr(mb_a + ord($iso2[1]) - $ord_a);
	return $ch1 . $ch2;
}

/**
 * This function will generate all the letters of the alphabet as 
 * an array: 
 * ['A', 'B', 'C', ... , 'X', 'Y', 'Z']
 */
function gen_alphabet() {
    $A = ord('A');
    $Z = ord('Z');

    $letters = [];
    for($x = $A; $x <= $Z; $x++) {
        $letters[] = chr($x);
    }
    return $letters;
}
