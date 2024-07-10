<?php

namespace Models;

use Faker\Factory;
use Interfaces\FileConvertible;
use Models\Employee;

class RestaurantLocation implements FileConvertible {
  private string $name;
  private string $address;
  private string $city;
  private string $state;
  private string $zipCode;
  private array $employees;
  private bool $isOpen;
  private bool $hasDriveThru;

  public function __construct(
    string $name,
    string $address,
    string $city,
    string $state,
    string $zipCode,
    array $employees,
    bool $isOpen,
    bool $hasDriveThru
  ) {
    $this->name = $name;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zipCode = $zipCode;
    $this->employees = $employees;
    $this->isOpen = $isOpen;
    $this->hasDriveThru = $hasDriveThru;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getAddress(): string {
    return $this->address;
  }

  public function getCity(): string {
    return $this->city;
  }

  public function getState(): string {
    return $this->state;
  }

  public function getEmployees(): array {
    return $this->employees;
  }

  public function getZipCode(): string {
    return $this->zipCode;
  }

  public function getIsOpen(): bool {
    return $this->isOpen;
  }

  public function getEmployeeCount(): int {
    return count($this->employees);
  }

  private function getEmployeesStr(): array {
    $employeesStrArray = [];
    for ($i = 0; count($this->employees); $i++) {
      $employeesStrArray[] = $this->employees[$i].toString();
    }
    return implode(', ', $employeesStrArray);
  }

  private function getEmployeesMd(): string {
    $employeesMd = '';
    for ($i = 0; count($this->employees); $i++) {
      $employeesMd .= $this->employees[$i].toMarkdown();
    }
    return $employeesMd;
  }

  private function getEmployeesArray(): array {
    $employeesArray = [];
    for ($i = 0; count($this->employees); $i++) {
      $employeesArray[] = $this->employees[$i].toArray();
    }
    return $employeesArray;
  }

  public function toString(): string {
    return sprintf(
      "RestaurantLocation\nName: %d\nEmployees: %s\n\n",
      $this->name,
      $this->getEmployeesStr()
    );
  }

  public function toHTML(): string {
    return sprintf("
      <div>
        <h2>RestaurantLocation</h2>
        <p>Name: %s</p>
        <p>Employees: %s</p>
      </div>
      <br>",
      $this->name,
      $this->getEmployeesStr()
    );
  }

  public function toMarkdown(): string {
    return sprintf("
      ## RestaurantLocations: %d

      - Name
        - %s %s
      - Employees
        %s",
      $this->chainId,
      $this->name,
      $this->getEmployeesMd()
    );
  }

  public function toArray(): array {
    return [
      'name' => $this->name,
      'employees' => $this->getEmployeesArray(),
    ];
  }

  public static function locationRandomGenerator(array $employees): RestaurantLocation {
    $faker = Factory::create();

    return new RestaurantLocation(
      $faker->company, // name
      $faker->address, // address
      $faker->city, // city
      $faker->state, // state
      $faker->postcode, // zipCode
      $employees, // employees
      $faker->boolean, // isOpen
      $faker->boolean, // hasDriveThru
    );
  }

  public static function locationsRandomGenerator(array $employeesList): array {
    $locations = [];
    for ($i = 0; $i < count($employeesList); $i++) {
      $locations[] = self::locationRandomGenerator($employeesList[$i]);
    }
    return $locations;
  }
}
?>
