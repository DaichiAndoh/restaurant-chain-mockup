<?php

namespace Models;

use DateTime;
use Faker\Factory;
use Models\User;

class Employee extends User {
  private string $jobTitle;
  private float $salary;
  private DateTime $startDate;
  private array $awards;

  public function __construct(
    int $id,
    string $firstName,
    string $lastName,
    string $email,
    string $password,
    string $phoneNumber,
    string $address,
    DateTime $birthDate,
    DateTime $membershipExpirationDate,
    string $role,
    string $jobTitle,
    float $salary,
    DateTime $startDate,
    array $awards
  ) {
    parent::__construct(
      $id,
      $firstName,
      $lastName,
      $email,
      $password,
      $phoneNumber,
      $address,
      $birthDate,
      $membershipExpirationDate,
      $role
    );

    $this->jobTitle = $jobTitle;
    $this->salary = $salary;
    $this->startDate = $startDate;
    $this->awards = $awards;
  }

  public function getJobTitle(): string {
    return $this->jobTitle;
  }

  public function toString(): string {
    return sprintf(
      ">> Employee: %d\n- Name: %s\n- Role: %s\n- JobTitle: %s\n",
      $this->id,
      $this->firstName . ' ' . $this->lastName,
      $this->role,
      $this->jobTitle
    );
  }

  public function toHTML(): string {
    return sprintf("
      <div style=\"border: 1px solid black; padding: 10px 20px; margin: 8px;\">
        <p>id: %d</p>
        <p>Name: %s %s</p>
        <p>Role: %s</p>
        <p>JobTitle: %s</p>
      </div>",
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->role,
      $this->jobTitle
    );
  }

  public function toMarkdown(): string {
    return sprintf(
      "  - Employee: %d\n    - Name:\n      - %s\n    - Role:\n      - %s\n    - JobTitle:\n      - %s\n",
      $this->id,
      $this->firstName . ' ' . $this->lastName,
      $this->role,
      $this->jobTitle
    );
  }

  public function toArray(): array {
    return [
      'id' => $this->id,
      'firstName' => $this->firstName,
      'lastName' => $this->lastName,
      'role' => $this->role,
      'jobTitle' => $this->jobTitle
    ];
  }

  public static function employeeRandomGenerator(): Employee {
    $faker = Factory::create();

    return new Employee(
      $faker->randomNumber, // id
      $faker->firstName, // firstName
      $faker->lastName, // lastName
      $faker->email, // email
      $faker->password, // password
      $faker->phoneNumber, // phoneNumber
      $faker->address, // address
      $faker->dateTimeThisCentury, // birthDate
      $faker->dateTimeBetween('-10 years', '+10 years'), // membershipExpirationDate
      $faker->randomElement(['manager', 'leader', 'member']), // role
      $faker->jobTitle, // jobTitle
      $faker->randomFloat(1, 2000, 6000), // salary
      $faker->dateTime, // startDate
      $faker->words($faker->randomDigit), // awards
    );
  }

  public static function employeesRandomGenerator(int $min, int $max): array {
    $employees = [];
    $numOfEmployees = rand($min, $max);
    for ($i = 0; $i < $numOfEmployees; $i++) {
      $employees[] = self::employeeRandomGenerator();
    }
    return $employees;
  }
}
?>
