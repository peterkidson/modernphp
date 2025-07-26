<?php

$table		= new Amenity(name: 'Table', movable: false, description: 'Mahagony table and chairs.');
$expresso	= new Amenity(name: 'Espresso Machine', movable: true, description: 'Single serve espresso machine with complimentary coffee pods.');
$balcony		= new Amenity(name: 'Balcony View', movable: false, description: 'Private balcony with ocean view.');

$room1 = new Room(1,100,	[$expresso, $balcony]);
//$room1 = new Room(1,100,	[]);
$room2 = new Room(2, 50, 	[$table]);

$d1_1 = $room1->createDescription();
$d1 = $room1->createDescription();
$d2 = $room2->createDescription();

echo "";

class Room {
	public $roomNumber;
	public $rate;
	public $amenities = [];
	function __construct(int $roomNumber, float $rate, array $amenities) {
		$this->roomNumber	= $roomNumber;
		$this->rate			= $rate;
		foreach($amenities as $amenity) {
			$this->amenities[]	= $amenity;
		}
	}
	public function getRoomNumber(): int {
		return $this->roomNumber;
	}
	public function calculateCost(int $numberOfDays): float {
		return round(max(0, $numberOfDays) * $this->rate, 2);
	}
	public function createDescription(): string {
		$description = '';
		foreach($this->amenities as $amenity) {
			$description .= $amenity->description . " ";
		}
		return $description;
	}
}
class Amenity {
	public $name;
	public $description;
	public $movable;
	public function __construct(string $name, bool $movable, string $description) {
		$this->name				= $name;
		$this->description	= $description;
		$this->movable			= $movable;
	}

}

