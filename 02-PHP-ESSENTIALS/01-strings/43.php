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
		'Sol Taylor', // Not in the waiting list but has priority
		'Sue Taylor', // Not in the waiting list but has priority
		'Zane Pryor',  // Not in the waiting list but has priority
		'Zbignew Pryor',  // Not in the waiting list but has priority
		'Zoltan Pryor',  // Not in the waiting list but has priority
];

$individualName = 'Alex Reed';
$s = true;


///
$waitingList = ['Alex Reed', 'Blake Jordan', 'Casey Smith', 'Drew Alex', 'Finn Harlow', 'Jordan Kay'];	// 9
$priorityParticipants = ['Alex Reed', 'Blake Jordan', 'Casey Smith', 'Drew Alex'];



$waitingList = ['Ava Stone', 'Dylan Marsh', 'Emma Lake', 'Grace Hill', 'Henry Cole', 'Kyle Brook', 'Lily Snow', 'Mason Cliff', 'Nora Field', 'Sophia Forest'];

$priorityParticipants = [];

$individualName = 'Nora Field';



$br = isset($s) ? "<br>" : "";
$finalAttendees = [];
$backupCandidates = [];

$waitingList2 = array_merge($priorityParticipants,$waitingList);
$waitingList3 = array_unique($waitingList2);
$waitingList = [];
foreach($waitingList3 as $waiting)
	$waitingList[] = $waiting;

// Add up to first 5 now waiting to $finalAttendees
$waitingI = 0;
for ( ; $waitingI < 5; ++$waitingI) {
	if ($waitingI > count($waitingList)-1)
		break;
	$finalAttendees[] = $waitingList[$waitingI];
}
sort($finalAttendees);

// Add up to 3 now waiting to $backupCandidates
$backupI = 0;
for ( ; $backupI < 3 && $waitingI < count($waitingList); ++$waitingI) {
	if (in_array($waitingList[$waitingI], $finalAttendees))
		continue;
	$backupCandidates[] = $waitingList[$waitingI];
	++$backupI;
}
sort($backupCandidates);

if ( count($backupCandidates) > 0) {
	foreach ($backupCandidates as $backupCandidate) {
		echo "Hey $backupCandidate, we want to inform you that you are one of our backup candidates. 🥳$br";
	}
}

// Which list is $individualName in ?
if 	(array_search($individualName,$finalAttendees) !== false)
	$individualStatus = 'Final Attendee';
elseif(array_search($individualName,$backupCandidates) !== false)
	$individualStatus = 'Backup Candidate';
elseif(($key = array_search($individualName,$waitingList)) !== false)	{
	$pos = array_search($key, array_keys($waitingList)) - $waitingI + 1;
	$individualStatus = "Waiting, position $pos";
}
else
	$individualStatus = 'Not found';


echo $individualStatus;
