<?php

header('Content-Type: text/plain; charset=utf-8');

//$message = "Happy 30th birthday!";
//$message = "Happy 20th birthday!";
//
//$matchesFound = $matchesFound2 = null;
//
//preg_match_all('/\d/', $message, $matchesFound);
//preg_match_all('/\d\w/', $message, $matchesFound2);
//
//var_dump($matchesFound, $matchesFound2);

//$matches = null;
//$string = "The quick brown fox jumps over the lazy dog. The quick white dog plays in the yard.";
//$r = preg_match('/quick (\w*) (\w*)/', $string, $matches);
//
//echo "€";
$message = 'The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00';
//var_dump(preg_match('/([$€]) ([0-9]+\.[0-9]{2})/u', $message, $matches));
//var_dump($matches);
//var_dump($r);

$result = preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', ' $0 $1 ~~~ $2', $message);
var_dump($result);

echo "";