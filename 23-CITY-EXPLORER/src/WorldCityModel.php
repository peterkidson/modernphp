<?php

class WorldCityModel
{
	public function __construct(
		public int		$id,
		public string	$city,
		public string	$cityAscii,
		public float	$lat,
		public float	$lng,
		public string	$country,
		public string	$iso2,
		public string	$iso3,
		public string	$adminName,
		public string	$capital,
		public int		$population, ) {
	}
	public static function pseudoConstructor(array $cityArr): WorldCityModel {
		return new WorldCityModel(
			$cityArr['id'],
			$cityArr['city'],
			$cityArr['city_ascii'],
			(float)$cityArr['lat'],
			(float)$cityArr['lng'],
			$cityArr['country'],
			$cityArr['iso2'],
			$cityArr['iso3'],
			$cityArr['admin_name'],
			$cityArr['capital'],
			$cityArr['population'],
		);
	}
	public function fullName(): string {
		return "$this->city ({$this->flag()} $this->country)";
	}
	public function flag() : string {
		return countryFlag($this->iso2);
	}
}