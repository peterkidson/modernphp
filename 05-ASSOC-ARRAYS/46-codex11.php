<?php

$hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];
$salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];
$itSalaries = ['Fiona' => 5300, 'George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400];


$br = isset($s) ? "<br>" : "";

$totalHrSalaries = $totalSalesSalaries = $totalItSalaries = 0;
foreach($hrSalaries as $salary)
	$totalHrSalaries += $salary;
foreach($salesSalaries as $salary)
	$totalSalesSalaries += $salary;
foreach($itSalaries as $salary)
	$totalItSalaries += $salary;

$totals['HR']		= $totalHrSalaries;
$totals['Sales']	= $totalSalesSalaries;
$totals['IT']		= $totalItSalaries;

$maxAmt = -1;
foreach($totals as $name => $total) {
	if ($total > $maxAmt) {
		$maxAmt = $total;
		$maxDept = $name;
	}
}

$companySalaries = array_merge($hrSalaries, $salesSalaries, $itSalaries);

$lowestSalaries = [];

$minSalary = PHP_INT_MAX;
$lowestSalaries['dummy'] = $minSalary;
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
//if ( count($backupCandidates) > 0) {
//	foreach ($backupCandidates as $backupCandidate) {
//		echo "Hey $backupCandidate, we want to inform you that you are one of our backup candidates. 🥳$br";
//	}
//}

