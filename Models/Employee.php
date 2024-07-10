<?php

namespace Models;

use DateTime;
use Faker\Factory;
use Models\User;
use Interfaces\FileConvertible;

class Employee extends User implements FileConvertible {
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

  public function getRole(): string {
    return $this->role;
  }

  public function getJobTitle(): string {
    return $this->jobTitle;
  }

  public function toString(): string {
    return sprintf(
      "Employee: %d\nName: %d\nRole: %s\nJobTitle: %s\n\n",
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->role,
      $this->jobTitle
    );
  }

  public function toHTML(): string {
    return sprintf("
      <div>
        <h2>Employee: %d</h2>
        <p>Name: %s %s</p>
        <p>Role: %s</p>
        <p>JobTitle: %s</p>
      </div>
      <br>",
      $this->id,
      $this->firstName,
      $this->lastName,
      $this->role,
      $this->jobTitle
    );
  }

  public function toMarkdown(): string {
    return sprintf("
      ## Employee: %d

      - Name
        - %s %s
      - Role
        - %s
      - JobTitle
        - %s\n",
      $this->id,
      $this->firstName,
      $this->lastName,
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