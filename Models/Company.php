<?php

namespace Models;

use Interfaces\FileConvertible;

class Company implements FileConvertible {
  protected string $name;
  protected int $foundingYear;
  protected string $description;
  protected string $website;
  protected string $phone;
  protected string $industry;
  protected string $ceo;
  protected bool $isPubliclyTraded;
  protected string $country;
  protected string $founder;
  protected int $totalEmployees;

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
    int $totalEmployees
  ) {
    $this->name = $name;
    $this->foundingYear = $foundingYear;
    $this->description = $description;
    $this->website = $website;
    $this->phone = $phone;
    $this->industry = $industry;
    $this->ceo = $ceo;
    $this->isPubliclyTraded = $isPubliclyTraded;
    $this->country = $country;
    $this->founder = $founder;
    $this->totalEmployees = $totalEmployees;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getFoundingYear(): string {
    return $this->foundingYear;
  }

  public function getDescription(): string {
    return $this->description;
  }

  public function getWebsite(): string {
    return $this->website;
  }

  public function getPhone(): string {
    return $this->phone;
  }

  public function getIndustry(): string {
    return $this->industry;
  }

  public function getCeo(): string {
    return $this->ceo;
  }

  public function getIsPubliclyTraded(): bool {
    return $this->isPubliclyTraded;
  }

  public function getCountry(): string {
    return $this->country;
  }

  public function getFounder(): string {
    return $this->founder;
  }

  public function getTotalEmployees(): int {
    return $this->totalEmployees;
  }

  public function toString(): string {
    return sprintf(
      "Company: %s\nFoundingYear: %d\nDescription: %s\nWebsite: %s\n\n",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website
    );
  }

  public function toHTML(): string {
    return sprintf("
      <div>
        <h2>Company: %s</h2>
        <p>FoundingYear: %d</p>
        <p>Description: %s</p>
        <p>Website: %s</p>
      </div>",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website
    );
  }

  public function toMarkdown(): string {
    return sprintf("
      ## Company: %s

      - FoundingYear
        - %d
      - Description
        - %s
      - Website
        - %s",
      $this->name,
      $this->foundingYear,
      $this->description,
      $this->website
    );
  }

  public function toArray(): array {
    return [
      'name' => $this->name,
      'foundingYear' => $this->foundingYear,
      'description' => $this->description,
      'website' => $this->website,
    ];
  }
}
?>
