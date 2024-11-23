<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="simple.css" />
	<title>Document</title>
</head>
<body>


	<pre><?php

		$playlist = ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon'];

		if (empty($playlist)) {
			echo "Your playlist needs an update. Time to discover more music!";
		} else {
			if (in_array("Sunny Days",$playlist)) {
				echo "You have great taste! 'Sunny Days' always lifts the mood!";
			} else {
				if (count($playlist) >= 2) {
					$playlist[1] = 'Solar Whispers';
				}
			}
		}



		function b(bool $b)
		{
			return $b ? 'true' : 'false';
		}
		?></pre>

</body>
</html>


