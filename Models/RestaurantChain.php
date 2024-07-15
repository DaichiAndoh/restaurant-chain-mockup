<?php

namespace Models;

use Faker\Factory;
use Models\Company;
use Models\RestaurantLocation;

class RestaurantChain extends Company {
  private int $chainId;
  private array $restaurantLocations;
  private string $cuisineType;
  private int $numberOfLocations;
  private string $parentCompany;

  public function __construct(
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
    string $country,
    string $founder,
    int $totalEmployees,
    int $chainId,
    array $restaurantLocations,
    string $cuisineType,
    int $numberOfLocations,
    string $parentCompany,
  ) {
    parent::__construct(
      $name,
      $foundingYear,
      $description,
      $website,
      $phone,
      $industry,
      $ceo,
      $isPubliclyTraded,
      $country,
      $founder,
      $totalEmployees
    );

    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisineType = $cuisineType;
    $this->numberOfLocations = $numberOfLocations;
    $this->parentCompany = $parentCompany;
  }

  public function getChainId(): int {
    return $this->chainId;
  }

  public function getLocations(): array {
    return $this->restaurantLocations;
  }

  public function addLocation(RestaurantLocation $location): void {
    $this->restaurantLocations[] = $location;
  }

  public function printLocations(): void {
    for ($i = 0; count($this->restaurantLocations); $i++) {
      echo $this->restaurantLocations[$i]->getAddress();
    }
  }

  private function getLocationsStr(): string {
    $locationsStr = '';
    foreach ($this->restaurantLocations as $location) {
      $locationsStr .= $location->toString();
    }
    return $locationsStr;
  }

  public function toString(): string {
    return sprintf(
      "==========\nRestaurantChain: %d\n- Name: %s\n- Website: %s\n- RestaurantLocations:\n%s\n",
      $this->chainId,
      $this->name,
      $this->website,
      $this->getLocationsStr(),
    );
  }

  private function getLocationsHTML(): string {
    $locationsHTML = '';
    foreach ($this->restaurantLocations as $location) {
      $locationsHTML .= $location->toHTML();
    }
    return $locationsHTML;
  }

  public function toHTML(): string {
    return sprintf("
      <div style=\"width: 60%%; margin: 0 auto; padding: 10px 20px;\">
        <h2>RestaurantChain: %d</h2>
        <p><strong>Name:</strong> %s</p>
        <p><strong>Website:</strong> <a href=\"%s\" target=\"_blank\" rel=\"noopener noreferrer\">%s</a></p>

        <h4>RestaurantLocations:</h4>
        <div>
          %s
        </div>
      </div>",
      $this->chainId,
      $this->name,
      $this->website,
      $this->website,
      $this->getLocationsHTML()
    );
  }

  private function getLocationsMd(): string {
    $locationsMd = '';
    foreach ($this->restaurantLocations as $location) {
      $locationsMd .= $location->toMarkdown();
    }
    return $locationsMd;
  }

  public function toMarkdown(): string {
    return sprintf(
      "## RestaurantChain: %d\n\n- Name:\n  - %s\n- Website:\n  - %s\n\n### RestaurantLocations\n\n%s\n",
      $this->chainId,
      $this->name,
      $this->website,
      $this->getLocationsMd()
    );
  }

  private function getLocationsArray(): array {
    $locationsArray = [];
    foreach ($this->restaurantLocations as $location) {
      $locationsArray[] = $location->toArray();
    }
    return $locationsArray;
  }

  public function toArray(): array {
    return [
      'chainId' => $this->chainId,
      'name' => $this->name,
      'website' => $this->website,
      'restaurantLocations' => $this->getLocationsArray(),
    ];
  }

  public static function RandomGenerator(array $locations): RestaurantChain {
    $faker = Factory::create();

    return new RestaurantChain(
      $faker->company, // name
      $faker->year, // foundingYear
      $faker->paragraph, // description
      $faker->url, // website
      $faker->phoneNumber, // phone
      $faker->word, // industry
      $faker->name, // ceo
      $faker->boolean, // isPubliclyTraded
      $faker->country, // country
      $faker->name, // founder
      array_reduce($locations, fn($c, $l) => $c + $l->getEmployeeCount(), 0), // totalEmployees
      $faker->unique()->numberBetween(1, 1000), // chainId
      $locations, // restaurantLocations
      $faker->randomElement(['Italian', 'Chinese', 'Japanese', 'Mexican', 'American']), // cuisineType
      count($locations), // numberOfLocations
      $faker->company // parentCompany
    );
  }
}
?>
