<?php

function render($view, $params)
{
	foreach ($params as $key => $value) {
		${$key} = $value;
	}
	// == extract($params);
	ob_start();
	require __DIR__ . '/views/pages/' . $view . '.php';
	$contents = ob_get_clean();

	require __DIR__ . '/views/layouts/main.view.php';
}

$name = 'Lauren';
$varname = 'name';

render('index.view', [
	'name'   => ${$varname},
	'sum'    => 321
]);

echo "";