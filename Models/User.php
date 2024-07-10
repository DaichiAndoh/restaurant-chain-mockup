<?php

namespace Models;

use DateTime;
use Interfaces\FileConvertible;

class User implements FileConvertible {
  protected int $id;
  protected string $firstName;
  protected string $lastName;
  protected string $email;
  protected string $hashedPassword;
  protected string $phoneNumber;
  protected string $address;
  protected DateTime $birthDate;
  protected DateTime $membershipExpirationDate;
  protected string $role;

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
    string $role
  ) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $this->phoneNumber = $phoneNumber;
    $this->address = $address;
    $this->birthDate = $birthDate;
    $this->membershipExpirationDate = $membershipExpirationDate;
    $this->role = $role;
  }

  public function getName(): string {
    return $this->firstName . ' ' . $this->lastName;
  }

  public function getRole(): string {
    return $this->role;
  }

  public function login(string $password): bool {
    return password_verify($password, $this->hashedPassword);
  }

  public function updateProfile(string $address, string $phoneNumber): void {
    $this->address = $address;
    $this->phoneNumber = $phoneNumber;
  }

  public function renewMembership(DateTime $expirationDate): void {
    $this->membershipExpirationDate = $expirationDate;
  }

  public function changePassword(string $newPassword): void {
    $this->hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
  }

  public function hasMembershipExpired(): bool {
    $currentDate = new DateTime();
    return $currentDate > $this->membershipExpirationDate;
  }

  public function toString(): string {
    return sprintf(
      "User: %d\nName: %d\n\n",
      $this->id,
      $this->firstName,
      $this->lastName,
    );
  }

  public function toHTML(): string {
    return sprintf("
      <div>
        <h2>User: %d</h2>
        <p>Name: %s %s</p>
      </div>
      <br>",
      $this->id,
      $this->firstName,
      $this->lastName,
    );
  }

  public function toMarkdown(): string {
    return sprintf("
      <div>
        <h2>User: %d</h2>
        <p>Name: %s %s</p>
      </div>
      <br>",
      $this->id,
      $this->firstName,
      $this->lastName,
    );
  }

  public function toArray(): array {
    return [
      'id' => $this->id,
      'firstName' => $this->firstName,
      'lastName' => $this->lastName,
    ];
  }
}
?>
