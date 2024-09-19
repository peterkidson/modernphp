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
$waitingList = [];

$priorityParticipants = ['Ava Stone', 'Dylan Marsh', 'Emma Lake', 'Grace Hill', 'Henry Cole', 'Kyle Brook', 'Lily Snow', 'Mason Cliff', 'Nora Field', 'Sophia Forest', 'Theo River'];

$individualName = 'Theo River';
///

$br = isset($s) ? "<br>" : "";
$finalAttendees = [];
$backupCandidates = [];

// Add up to first 5 priorityParticipants to $finalAttendees
$priorityI = 0;
for ( ; $priorityI < 5; ++$priorityI) {
	if ($priorityI > count($priorityParticipants)-1)
		break;
	$finalAttendees[] = $priorityParticipants[$priorityI];
}

// If need be, top up $finalAttendees to 5 from waitingList not already there due to being in the priorityList
$waitingI = 0;
for ( ; count($waitingList) > $waitingI && count($finalAttendees) < 5; ++$waitingI) {
	if (in_array($waitingList[$waitingI], $finalAttendees))
		continue; // Is next waitinglist already included (from $priorityParticipants)?
	$finalAttendees[] = $waitingList[$waitingI];
}
sort($finalAttendees);

// $backupCandidates are up to 3 from remaining $priorityParticipants, not in the $finalAttendees
$backupI = 0;
for ( ; $backupI < 3 && $priorityI < count($priorityParticipants); ++$priorityI) {
	if (in_array($priorityParticipants[$priorityI], $finalAttendees))
		continue;
	$backupCandidates[] = $priorityParticipants[$priorityI];
	++$backupI;
}

// If need be, top up $backupCandidates to 3 from remaining $finalAttendees
for ( ; $backupI < 3 && $waitingI < count($waitingList); ++$waitingI) {
	if (in_array($waitingList[$waitingI], $finalAttendees))
		continue;
	$backupCandidates[] = $waitingList[$waitingI];
	++$backupI;
}

// Which list is $individualName in ?
if 	(array_search($individualName,$finalAttendees))
	$individualStatus = 'Final Attendee';
elseif(array_search($individualName,$backupCandidates))
	$individualStatus = 'Backup Candidate';
elseif(array_search($individualName,$waitingList))	{
	$pos = array_search($individualName,$waitingList) - $waitingI + 1;
	$individualStatus = "Waiting, position $pos";
}
else
	$individualStatus = 'Not found';

if ( count($backupCandidates) > 0) {
	foreach ($backupCandidates as $backupCandidate) {
		echo "Hey $backupCandidate, we want to inform you that you are one of our backup candidates. 🥳$br";
	}
}

