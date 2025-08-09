<?php

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

	public function getPrice() {
		return $this->price;
	}

	public function updatePrice($newPrice) {
		$this->price = $newPrice;
	}

	public function discountCalc($oldprice,$percentage): float {
		return  $oldprice - ($oldprice * ($percentage / 100));
	}
	public function applyDiscount($percentage) {
		$this->updatePrice($this->discountCalc($this->price,$percentage));
	}
}

class Food extends Product {
	private $ingredients;
	private $macroNutrients;
	private $calories;


	public function __construct(string $id, string $name, float $price, string $description,
										 array $ingredients, array $macroNutrients) {
		parent::__construct($id, $name, $price, $description);
		$this->ingredients 		= $ingredients;
		$this->macroNutrients 	= $macroNutrients;
		$this->standardizeIngredients();
		$this->healthCheck();
		$this->updateCalories();
	}

	private function standardizeIngredients(): void {
		for ($i = 0; $i < count($this->ingredients); $i++) {
			$this->ingredients[$i] = strtolower($this->ingredients[$i]);
		}
	}

	private const badIngredients = ['palm oil', 'salt', 'sugar'];
	private function healthCheck(): void {
		$warning = false;
		foreach ($this->ingredients as $ingredient) {
			if (in_array($ingredient, self::badIngredients )) { $warning = true; }
		}
		if ($warning) {$this->description .= ' Beware: Do not consume too much.';}
	}

	public function getMacroInfo($nutrient): int {
		return $this->macroNutrients[$nutrient] ?? 0;
	}
	public function updateCalories(): void
	{
		$carbs = $this->getMacroInfo('carbs');
		$proteins = $this->getMacroInfo('proteins');
		$fats = $this->getMacroInfo('fats');
		$this->calories = ($carbs + $proteins) * 4 + ($fats * 9);
	}

	public function applyDiscount($percentage) {
		parent::applyDiscount($percentage);
		if ($this->calories < 200) { $this->updatePrice($this->discountCalc($this->price, 10)); }
	}

}

$initialPrice = 100;
$discountPercentage = 10;
$macroNutrients = ['carbs' => 50, 'proteins' => 25, 'fats' => 15];

$foodItem = new Food('1', 'Test Food Item', $initialPrice, 'Test description', ['ingredient1'], $macroNutrients);
$foodItem->applyDiscount($discountPercentage);


echo "";
