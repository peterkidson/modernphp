<?php

$table		= new Amenity('Table',true,'Mahagony table and chairs.');
$expresso	= new Amenity('Espresso Machine',true,'Single serve espresso machine with complimentary coffee pods.');
$balcony		= new Amenity('Balcony View', false, 'Private balcony with ocean view.');
$wallsafe	= new Amenity('Wallsafe', false,'Wall Safe.');

$room1 = new Room(1,100,	[$expresso, $balcony]);
//$room1 = new Room(1,100,	[]);
$room2 = new Room(2, 50, 	[]);

//$room1->xaddAmenity($table);
$room1->xremoveAmenity($expresso->name);
//$room1->xremoveAmenity($expresso->name);
//$room1->xtransferAmenity($expresso->name, $room2);
//$room1->xtransferAmenity($table->name, $room2);
$zr1 = $room1->createDescription();
$zr2 = $room2->createDescription();

echo "";

class Room {  // with php 7.0
	public $roomNumber;
	public $rate;
	public $amenities = [];
	function __construct(int $roomNumber, float $rate, array $amenities) {
		$this->roomNumber	= $roomNumber;
		$this->rate			= $rate;
		foreach($amenities as $amenity) {
			$this->amenities[] = $amenity;
		}
	}
	public function getRoomNumber(): int {
		return $this->roomNumber;
	}
	public function calculateCost(int $numberOfDays): float {
		return round(max(0, $numberOfDays) * $this->rate, 2);
	}
	public function xaddAmenity(Amenity $amenity) {
		$this->addAmenity($amenity);
	}
	private function addAmenity(Amenity $amenity) {
		$this->amenities[] = $amenity;
	}
	public function xremoveAmenity(string $name) {
		$this->removeAmenity($name);
	}
	private function removeAmenity(string $name) {
		foreach($this->amenities as $key => $value) {
			if ($value->name == $name) {
				unset($this->amenities[$key]);
			}
		}
		$this->amenities = array_values($this->amenities); // Just to satisfy the clumsy tests !!!
	}
	public function xtransferAmenity(Room $to, string $name) {
		$this->transferAmenity($to, $name);
	}
	private function transferAmenity(Room $to, string $name) {
		foreach($this->amenities as $key => $value) {
			if ($value->name == $name && $value->movable) {
				$to->addAmenity($this->amenities[$key]);
				$this->removeAmenity($name);
			}
		}
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

