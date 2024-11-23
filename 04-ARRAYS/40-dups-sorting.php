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

		$playlist 				= ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon'];
		$songRecommendations	= ['Ocean Waves', 'City Nights', 'Rising Sun', 'Dancing Shadows', 'Eclipse'];
		$s = sort($playlist);

		if (isset($playlist)) {
			if (count($playlist) > 0) {
				echo "Your lastly added song was: '{$playlist[count($playlist)-1]}'.";
			}
			if (count($playlist) <= 3) {
				$playlist[] = $songRecommendations[rand(0,count($songRecommendations )-1)];
			}
			if (count($playlist) > 10) {
				unset($playlist[0]);
			}
		}


		function b(bool $b)
		{
			return $b ? 'true' : 'false';
		}
		?></pre>

</body>
</html>


