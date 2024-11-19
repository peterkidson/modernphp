<?php


$names = [
		'Alex Reed',
		'Blake Jordan',
		'Casey Smith',
		'Drew Alex',
		'Elliot Ford',
		'Finley Harper',
		'Jordan Kay',
		'Kim Lee',
		'Liam Park',
		'Morgan Drew'
];
$n2 = ['peter','dana'];

$numbers = [123.456,4,67.88,6.5];
$nr = array_merge($numbers, [7,8,9]);

$e = explode(" ", "the quick brown fox");
$i = implode(" ", $e);

var_dump(array_keys($numbers));nl();
var_dump(array_values($numbers));nl();

$x = [$names,['peter','Dana'],'hello' ];
$y = array_merge($names,['peter','Dana'],$n2 );
$z = [...$names,'peter','Dana',...$n2 ];

print_r($x);

function nl() { echo "<br>"; }