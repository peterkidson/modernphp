<?php

require __DIR__ . '/zfunctions.php';


class AAC implements ArrayAccess, Countable
{
	public $propx = "john";

	public function offsetExists(mixed $offset): bool {					// isset
		return isset($this->{$offset});
	}
	public function offsetGet(mixed $offset): mixed {						// get
		return $this->{$offset};
	}
	public function offsetSet(mixed $offset, mixed $propname): void {		// set
		$this->{$offset} = $propname;
	}
	public function offsetUnset(mixed $offset): void						// unset
	{
		// TODO: Implement offsetUnset() method.
	}
	public function count(): int {
		return 123;
	}
}

header('Content-Type: text/plain');

$p = new AAC();
echo "propx: {$p->propx}\n";

foreach (['propx','junk'] as $propname) {echo @"get ->$propname : {$p->$propname}\n";}

$p->junk = "not junk now!";   // deprecated
foreach (['propx','junk'] as $propname) {echo @"get ->$propname : {$p->$propname}\n\n";}

foreach (['propx','junk'] as $propname) {echo @"isset($propname) : " . b(isset($p->$propname)) . "\n";}
echo "\n";
unset($p->propx);
foreach (['propx','junk'] as $propname) {echo @"isset($propname) : " . b(isset($p->$propname)) . "\n";}



//
//$p->propx = "jane";
//var_dump("propx set: " . $p['propx'])."\n";
//
//var_dump("propx exists: " .isset($p['propx']))."\n";
//var_dump("nonexistent exists: " .isset($p['nonexistent']))."\n";


