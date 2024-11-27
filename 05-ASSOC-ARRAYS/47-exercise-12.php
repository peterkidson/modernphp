<?php

$hrSalaries 	= ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];
$salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];
$itSalaries 	= ['Fiona' => 5300, 'George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400, 'Peter' => 4800];


$br = isset($s) ? "<br>" : "";

$companySalaries = array_merge($hrSalaries, $salesSalaries, $itSalaries);

$lowestSalaries = [];

$minSalary = PHP_INT_MAX;
$lowestSalaries = [];
foreach($companySalaries as $person => $salary) {
	if ($salary <= $minSalary) {
		foreach($lowestSalaries as $lowestName => $lowestSalary) {
			if ($salary < $lowestSalary) {
				unset($lowestSalaries[$lowestName]);
			}
		}
		$minSalary = $salary;
		$lowestSalaries[$person] = $salary;
	}
}

echo "";