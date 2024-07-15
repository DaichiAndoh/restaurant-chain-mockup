# restaurant-chain-mockup

## Usage

```
$ cd restaurant-chain-mockup
$ php -S localhost:8000
```

## Class Diagram

![ClassDiagram](/docs/diagrams/ClassDiagram.png)

## Sequence Diagram

![SequenceDiagram](/docs/diagrams/SequenceDiagram.png)

## Pages

### /

![Home](/docs/pages/Home.png)

### /form.php

![Form](/docs/pages/Form.png)

#### Output Format: HTML

![FormOutputHtml](/docs/pages/FormOutputHtml.png)

#### Output Format (download): Markdown

```:markdown
## RestaurantChain: 957

- Name:
  - Schultz-Bergnaum
- Website:
  - http://www.turcotte.info/ullam-ea-nulla-ducimus-cupiditate-aut-animi-atque

### RestaurantLocations

#### RestaurantLocation

- Name:
  - Ferry, Terry and Murray
- Employees
  - Employee: 8682
    - Name:
      - Dell Miller
    - Role:
      - member
    - JobTitle:
      - Materials Engineer
  - Employee: 5459
    - Name:
      - Chyna Streich
    - Role:
      - member
    - JobTitle:
      - Orthotist OR Prosthetist
...
...
...
```

#### Output Format (download): Json

```:json
[
  {
    "chainId": 88,
    "name": "Howe, Howe and Price",
    "website": "http:\/\/www.marvin.info\/laudantium-recusandae-velit-necessitatibus-inventore",
    "restaurantLocations": [
      {
        "name": "Lesch-Okuneva",
        "employees": [
          {
            "id": 5843,
            "firstName": "Angelita",
            "lastName": "Ratke",
            "role": "leader",
            "jobTitle": "Podiatrist"
          },
          {
            "id": 500,
            "firstName": "Lenna",
            "lastName": "Koelpin",
            "role": "manager",
            "jobTitle": "Health Practitioner"
          },
...
...
...
```

#### Output Format (download): Text

```:text
==========
RestaurantChain: 547
- Name: Kuvalis, Hegmann and Maggio
- Website: http://smitham.info/quo-quia-sunt-aut-ut-et-quibusdam-ut.html
- RestaurantLocations:
> RestaurantLocation
- Name: Satterfield Group
- Employees:
>> Employee: 484
- Name: Keshawn Zieme
- Role: leader
- JobTitle: Coating Machine Operator
>> Employee: 730577
- Name: Michale Weber
- Role: leader
- JobTitle: General Farmworker
>> Employee: 3081246
- Name: Clyde Stoltenberg
- Role: manager
- JobTitle: Soil Scientist OR Plant Scientist
> RestaurantLocation
- Name: Robel Ltd
- Employees:
>> Employee: 775115
- Name: Nickolas Stiedemann
- Role: manager
- JobTitle: Power Plant Operator
...
...
...
```
