<?php

$companySalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];

$companySalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];


$br = isset($s) ? "<br>" : "";

$totalSalaries = 0;
foreach($companySalaries as $salary)
	$totalSalaries += $salary;

$averageSalary = $totalSalaries / count($companySalaries);

foreach($companySalaries as $name => $salary) {
	if ($salary < $averageSalary)
		$companySalaries[$name] = $salary + 200;
	elseif ($salary > $averageSalary)
		$companySalaries[$name] = $salary * .95;
}

$newTotalSalaries = 0;
foreach($companySalaries as $salary)
	$newTotalSalaries += $salary;

$diff = $newTotalSalaries - $totalSalaries;
$details = '';
if( $diff >= 0) {
	$details = "cost increase of \${$diff}";
}
else {
	$diff = -$diff;
	$details = "savings of \${$diff}";
}

echo "The net impact of the salary adjustments is a $details for the company.";

echo "";

