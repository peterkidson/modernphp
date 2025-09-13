<?php

function dumparr(array $arr,$ksize=10,$nl=1) {
	foreach ($arr as $key => $value) {
		$ktype = gettype($key);
		$vtype = gettype($value);
		$fmtkey = $ktype=='string' ? "%-{$ksize}s" : "%{$ksize}d";
		echo sprintf($fmtkey, $key) . ' => ' . q($vtype) . $value . q($vtype) . PHP_EOL;
	}
	for ($i=1; $i<$nl; $i++) {echo PHP_EOL;}
}

function q($type) {
	return $type=='string' ? '"' : '';
}
function b($bool) {
	return $bool? 'true' : 'false';
}