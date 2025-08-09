<?php

// The Product class represents the base class for all products in the e-commerce system
class Product {
	protected $id;
	protected $name;
	protected $price;
	protected $description;

	// Constructor to initialize a new Product object with its properties
	public function __construct(string $id, string $name, float $price, string $description) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
	}

	public function getPrice(){
		return $this->price;
	}

	public function updatePrice($newPrice) {
		$this->price = $newPrice;
	}

	public function applyDiscount($percentage) {
		// Calculate the new price after applying the discount
		$discountedPrice = $this->price - ($this->price * ($percentage / 100));

		// Use updatePrice method to set the new price
		$this->updatePrice($discountedPrice);
	}
}

// Task 1: Define and Implement the Food Class
class Food extends Product {
	private $ingredients; // Stores a list of ingredients in the food item

	// Task 2: Get Macro Values
	private $macroNutrients; // Holds macronutrient information (e.g., carbs, proteins, fats)

	// Task 3: Caloric Calculation
	private $calories; // Represents the calculated total caloric content of the food item

	public function __construct(
		string $id,
		string $name,
		float $price,
		string $description,
		array $ingredients,
		array $macroNutrients
	) {

		$this->ingredients = $ingredients;
		$this->standardizeIngredients();

		// Task 2: Add health label
		if ($this->containsUnhealthyIngredients($ingredients)) {
			$description .= " Beware: Do not consume too much.";
		}

		parent::__construct($id, $name, $price, $description);

		// Task 3: Get Macro Values
		$this->macroNutrients = $macroNutrients;

		// Task 4: Caloric Calculation
		$this->updateCalories();
	}

	private function standardizeIngredients() {
		// Convert all ingredient names to lowercase for consistency
		foreach ($this->ingredients as $key => $ingredient) {
			$this->ingredients[$key] = strtolower($ingredient);
		}
	}

	// Helper method to check for unhealty ingredients
	private function containsUnhealthyIngredients($ingredients) {
		$unhealthyIngredients = ['palm oil', 'salt', 'sugar'];
		foreach ($ingredients as $ingredient) {
			if (in_array($ingredient, $unhealthyIngredients)) {
				return true;
			}
		}
		return false;
	}

	// Task 3: Get Macro Values

	public function getMacroInfo($macro) {
		// Retrieve specific macronutrient information, returning 0 if not found
		return $this->macroNutrients[$macro] ?? 0;
	}

	// Task 4: Caloric Calculation

	public function updateCalories() {
		// Calculate total calories based on macronutrients, assuming missing values as 0
		$carbs = $this->getMacroInfo('carbs');
		$proteins = $this->getMacroInfo('proteins');
		$fats = $this->getMacroInfo('fats');
		$this->calories = ($carbs + $proteins) * 4 + ($fats * 9);
	}

	// Task 5: Additional Discount Functionality

	public function applyDiscount($percentage) {
		// Apply the initial discount, then check for conditions to apply additional discounts
		parent::applyDiscount($percentage);
		if ($this->calories < 200) {
			// Apply an extra 10% discount for low-calorie foods
			$currentPrice = $this->getPrice();
			$newPrice = $currentPrice * 0.9;
			$this->updatePrice($newPrice);
		}
	}
}

$macroNutrients = ['carbs' => 30, 'proteins' => 20, 'fats' => 10];

$foodItem = new Food('1', 'Test Food Item', 1.99, 'Test description', ['ingredient1'], $macroNutrients);

echo "";

