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


$waitingList = ['Aaron Stone', 'Casey Smith', 'Ian Hope', 'Uma River'];
$priorityParticipants = [];


$individualName = 'Theo River';

//$priorityParticipants[] = $individualName;


$waitingList = ['Elliot Ford', 'Ian Cloud', 'Jenny Light', 'Kyle Rain', 'Lara Snow', 'Penny River', 'Zara Cliff'];

$priorityParticipants = ['Gina Bloom', 'Henry Cole', 'Jenny Light', 'Kyle Rain', 'Lara Snow', 'Nina Spark'];

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

// $backupCandidates are up to 3 from remaining $priorityParticipants, not in the waitinglist
$backupI = 0;
for ( ; $backupI < 3 && $priorityI < count($priorityParticipants); ++$priorityI) {
	if (in_array($priorityParticipants[$priorityI], $finalAttendees))
		continue;
	$backupCandidates[] = $priorityParticipants[$priorityI];
	++$backupI;
}

// If need be, top up $backupCandidates to 3 from remaining waitinglist
for ( ; $backupI < 3 && $waitingI < count($waitingList); ++$waitingI) {
	if (in_array($waitingList[$waitingI], $backupCandidates))
		continue;
	$backupCandidates[] = $waitingList[$waitingI];
	++$backupI;
}
//sort($backupCandidates);


// Which list is $individualName in ?
if 	(in_array($individualName,$finalAttendees))
	$individualStatus = 'Final Attendee';
elseif(in_array($individualName,$backupCandidates))
	$individualStatus = 'Backup Candidate';
elseif(in_array($individualName,$waitingList))	{
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

