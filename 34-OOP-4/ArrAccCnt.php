<?php

require __DIR__ . '/zfunctions.php';

class AAC implements ArrayAccess, Countable
{
	public $propx = "john";

	// attribute name =  $offset

	public function offsetExists(mixed $offset): bool {					// isset
		return isset($this->{$offset});
	}
	public function offsetGet(mixed $offset): mixed {						// get
		return $this->{$offset};
	}
	public function offsetSet(mixed $offset, mixed $value): void {		// set
		$this->{$offset} = $value;
	}
	public function offsetUnset(mixed $offset ): void						// unset
	{
		unset($this->{$offset});
	}
	public function count(): int {
		return 123;
	}
}

header('Content-Type: text/plain');

$p = new AAC();
echo "->propx: {$p->propx}\n\n";

foreach (['propx','junk'] as $propname) {echo @"offsetGet ['$propname'] : {$p[$propname]}\n";}
echo "\n";

$p->junk = "not junk now!";   // deprecated
foreach (['propx','junk'] as $propname) {echo @"offsetGet ['$propname'] : {$p[$propname]}\n";}
echo "\n";

foreach (['propx','junk'] as $propname) {echo @"isset(['$propname']) : " . b(isset($p[$propname])) . "\n";}
echo "\n";

foreach (['propx','junk'] as $propname) {unset($p[$propname]);}
foreach (['propx','junk'] as $propname) {echo @"isset(['$propname']) : " . b(isset($p[$propname])) . "\n";}
echo "\n";


