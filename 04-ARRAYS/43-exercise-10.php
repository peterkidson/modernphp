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


///////////////////////
$waitingList = ['Drew Alex', 'Elliot Ford'];

$priorityParticipants = ['Alex Reed', 'Drew Alex', 'Sam Taylor', 'Zane Pryor'];

$individualName = 'Theo River';
///////////////////////

$br						= isset($s) ? "<br>" : "";
$finalAttendees		= [];
$backupCandidates		= [];
$MAX_ATTENDEES			= 5;
$NUM_BACKUPS			= 3;

// Add up to first $MAX_ATTENDEES priorityParticipants (np dups) to $finalAttendees
$finalAttendees 	= array_slice($priorityParticipants, 0, $MAX_ATTENDEES);
$p 					= sizeof($finalAttendees);

// If need be, top up $finalAttendees to $MAX_ATTENDEES from waitingList not already there due to being in the priorityList
for ($w = 0; $w < count($waitingList)  &&  count($finalAttendees) < $MAX_ATTENDEES; ++$w) {
	if (in_array($waitingList[$w], $finalAttendees))	continue; // Is next waitinglist already included (from $priorityParticipants)?
	$finalAttendees[] = $waitingList[$w];
}
sort($finalAttendees);

//  up to $NUM_BACKUPS $backupCandidates (not in the $finalAttendees)
$b = 0;

for ( ; $b < $NUM_BACKUPS  &&  $p < count($priorityParticipants); ++$p) {
	if (in_array($priorityParticipants[$p], $finalAttendees))	continue;
	$backupCandidates[] = $priorityParticipants[$p];
	++$b;
}

for ( ; $b < $NUM_BACKUPS && $w < count($waitingList); ++$w) {
	if (in_array($waitingList[$w], $finalAttendees))	continue;
	$backupCandidates[] = $waitingList[$w];
	++$b;
}

if ( count($backupCandidates) > 0) {
	foreach ($backupCandidates as $backupCandidate) {
		echo "Hey $backupCandidate, we want to inform you that you are one of our backup candidates. 🥳$br";
	}
}

// Which list is $individualName in ?
if 	(in_array($individualName,$finalAttendees))
	$individualStatus = 'Final Attendee';
elseif(in_array($individualName,$backupCandidates))
	$individualStatus = 'Backup Candidate';
elseif(in_array($individualName,$waitingList))	{
	$pos = array_search($individualName,$waitingList) - $w + 1;
	$individualStatus = "Waiting, position $pos";
}
elseif(in_array($individualName,$priorityParticipants))	{
	$pos = array_search($individualName,$priorityParticipants) - $p + 1;
	$individualStatus = "Waiting, position $pos";
}
else {
	$individualStatus = 'Not found';
}

echo $individualStatus;
