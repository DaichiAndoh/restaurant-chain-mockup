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

  private function getEmployeesStr(): string {
    $employeesStr = '';
    foreach ($this->employees as $employee) {
      $employeesStr .= $employee->toString();
    }
    return $employeesStr;
  }

  public function toString(): string {
    return sprintf(
      "> RestaurantLocation\n- Name: %s\n- Employees:\n%s",
      $this->name,
      $this->getEmployeesStr()
    );
  }

  private function getEmployeesHTML(): string {
    $employeesHTML = '';
    foreach ($this->employees as $employee) {
      $employeesHTML .= $employee->toHTML();
    }
    return $employeesHTML;
  }

  public function toHTML(): string {
    return sprintf("
      <div style=\"border: 1px solid black; padding: 10px 20px; margin: 8px;\">
        <p><strong>Name:</strong> %s</p>

        <h4>Employees</h4>
        <div>
          %s
        </div>
      </div>",
      $this->name,
      $this->getEmployeesHTML()
    );
  }

  private function getEmployeesMd(): string {
    $employeesMd = '';
    foreach ($this->employees as $employee) {
      $employeesMd .= $employee->toMarkdown();
    }
    return $employeesMd;
  }

  public function toMarkdown(): string {
    return sprintf(
      "#### RestaurantLocation\n\n- Name:\n  - %s\n- Employees\n%s\n",
      $this->name,
      $this->getEmployeesMd()
    );
  }

  private function getEmployeesArray(): array {
    $employeesArray = [];
    foreach ($this->employees as $employee) {
      $employeesArray[] = $employee->toArray();
    }
    return $employeesArray;
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
