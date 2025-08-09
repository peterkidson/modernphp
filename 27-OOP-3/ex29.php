<?php
header('Content-Type: text/plain');

// The Product class represents the base class for all products in the e-commerce system.
class Product {
	protected $id;
	protected $name;
	protected $price;
	protected $description;

	// Constructor to initialize a new Product object with its properties.
	public function __construct(string $id, string $name, float $price, string $description) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
	}

	public function getPrice(): float {
		return $this->price;
	}
	public function updatePrice(float $price) : void {
		$this->price = $price;
	}
	public function applyDiscount(float $discount): void {
		$this->updatePrice($this->getPrice() * ((100 - $discount) / 100));
	}
}

class Electronics extends Product
{
	private $voltage;
	private $warranty;

	public function __construct(	string $id, string $name, float $price, string $description,
											int $voltage, string $warranty) {
		$this->voltage = $voltage;
		$this->warranty = $warranty;
		parent::__construct($id, $name, $price, $description);
	}
}

class Clothing extends Product {
	private	$size;
	private	$material;
	private $careInstructions;


	public function __construct(string $id, string $name, float $price, string $description,
										 string $size, string $material, $careInstructions) {
		$this->size =  $this->validateSize($size);
		$this->material = $material;
		if (is_array($careInstructions)) {
			$this->careInstructions = implode('; ',$careInstructions);
		} else {
			$this->careInstructions = $careInstructions;
		}
		parent::__construct($id, $name, $price, $description);
	}

	private $allowedSizes = ['XS', 'S', 'M', 'L', 'XL'];

	private function validateSize($size) {
		if (!in_array($size, $this->allowedSizes)) {
			return 'M'; // Default size
		}
		return $size;
	}

}

$electronics = new Electronics('item12', 'Phone12', 12.12, 'A nice phone', 12,'12 months',);
var_dump($electronics);

$clothing = new Clothing('cl`','shirt1',10.10, 't-shirt', 'XS','denim',['handwash']);
var_dump($clothing);
