<?php


$waitingList = ['Dawn White', 'Frank Smith', 'Bob Carter', 'Charlie Davis', 'Eve Black', 'Alice Brown',  'Bob Carter', 'Alice Brown', 'Charlie Davis', 'Grace Jones', 'Hank Green', 'Eve Black', 'Dawn White'];
$removeFromList = ['Dawn White', 'Charlie Davis'];

//$waitingList = ['Olivia Benson', 'Noah Gray', 'Emma Jones', 'Olivia Benson', 'Noah Gray'];
//$removeFromList = ['Olivia Benson', 'Emma Jones'];

//$waitingList = ['Jasper Mars', 'Luna Sky', 'Oscar Night'];
//$removeFromList = [];

//$waitingList = ['Lara Craft', 'Ned Stark', 'Olivia Pope', 'Peter Quill', 'Quincy Adams', 'Rachel Green'];
//$removeFromList = ['Rachel Green'];

sort($waitingList);
$waitingList = array_unique($waitingList);		// Remove duplicates

$cleanedWaitingList = [];
foreach($waitingList as $candidate) {				// Remove removals
	$remove = false;
	foreach($removeFromList as $removee) {
		if ($candidate == $removee) $remove = true;
	}
	if (!$remove) $cleanedWaitingList[] = $candidate;
}

$numSelected = min(5, count($cleanedWaitingList));

$selectedParticipants = [];
$unSelectedParticipants = [];
$i = 0;
for ( ; $i < $numSelected; ++$i) {
	$selectedParticipants[] = $cleanedWaitingList[$i];
}
for ( ; $i < count($cleanedWaitingList); ++$i)	{
	$unSelectedParticipants[] = $cleanedWaitingList[$i];
}

?>

<ul>
	<?php
		foreach ($selectedParticipants as $participant) : ?>
         <li><?= $participant ?> ✅</li>
		<?php endforeach; ?>
	<?php
		foreach ($unSelectedParticipants as $participant) : ?>
         <li><?= $participant ?> ❌</li>
		<?php endforeach; ?>
</ul>
