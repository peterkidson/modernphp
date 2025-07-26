<?php

class Room
{
	public $roomNumber;
	public $rate;

	function __construct(int $roomNumber, float $rate)
	{
		$this->roomNumber	= $roomNumber;
		$this->rate			= $rate;
	}

	public function getRoomNumber(): int
	{
		return $this->roomNumber;
	}

	public function calculateCost(int $numberOfDays): float
	{
		return round(max(0, $numberOfDays) * $this->rate, 2);
	}
}

