<?php

class AAC implements ArrayAccess
{
	public $propx = "john";

	public function offsetExists(mixed $offset): bool		// == isset
	{
		return isset($this->{$offset});
	}

	public function offsetGet(mixed $offset): mixed
	{
		return $this->{$offset};
	}

	public function offsetSet(mixed $offset, mixed $value): void
	{
	}

	public function offsetUnset(mixed $offset): void
	{
		// TODO: Implement offsetUnset() method.
	}
}

header('Content-Type: text/plain');

$p = new AAC();
echo "get: {$p['propx']}\n";
echo "get: {$p['propz']}\n";
//var_dump("nonexistent value: " . $p['nonexistent'])."\n";
//
//$p->propx = "jane";
//var_dump("propx set: " . $p['propx'])."\n";
//
//var_dump("propx exists: " .isset($p['propx']))."\n";
//var_dump("nonexistent exists: " .isset($p['nonexistent']))."\n";


