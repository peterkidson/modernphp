<?php

require __DIR__ . '/zfunctions.php';


class Magic {
	private array $attr;

	public function __construct(array $ctor) {
		$this->attr = $ctor;
	}

	public function getAttributes() {
		return $this->attr;
	}

	public function __get($key) {
		if (isset($this->attr[$key])) {
			return $this->attr[$key];
		}
		return null;
	}
	public function __set($key, $value) {
		$this->attr[$key] = $value;
	}
	public function __isset($key) {
		return isset($this->attr[$key]);
	}
	public function __unset($key) {
		unset($this->attr[$key]);
	}
}
header('Content-Type: text/plain');
$magic = new Magic(['setupsize' => 123, 'setupmess' => 'Hello World']);
dumparr(ksize: 12, arr: $magic->getAttributes(),nl:2);

echo "get succeed >".$magic->setupmess."<\n";						// __get
echo "get fail >"   .$magic->junk."<\n\n";

$magic->added = 'Added this one';										// __set
dumparr( arr: $magic->getAttributes(),nl: 2);

echo "added there? " . b((isset($magic->added))) . PHP_EOL;		// __isset
echo "junk there?  " . b((isset($magic->junk)))  . PHP_EOL.PHP_EOL;

unset($magic->setupmess);													// __unset
unset($magic->junk);

dumparr(ksize: 12, arr: $magic->getAttributes(),nl:2);

