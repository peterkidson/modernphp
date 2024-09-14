<?php


$waitingList = [
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
$priorityParticipants = [
		'Jordan Kay', // In the waiting list and has priority
		'Sam Taylor', // Not in the waiting list but has priority
		'Zane Pryor'  // Not in the waiting list but has priority
];

$waitingList = ['Eva Grant', 'Ian Hope', 'Olivia Jane'];
$priorityParticipants = [];

$individualName = 'Alex Reed';

$priorityParticipants[] = $individualName;

$finalAttendees = [];
// Add up to 5 priorityPartitipants
$i = 0;
for ( ; $i < 5; ++$i) {
	if ($i < count($priorityParticipants)-1)
		$finalAttendees[] = $priorityParticipants[$i];
}
// Top up to 5 from waitingList
for ($w=0 ; $i < 5 && $w < count($waitingList); ++$i, ++$w) {
	$finalAttendees[] = $waitingList[$w];
}
var_dump($finalAttendees);
