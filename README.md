# restaurant-chain-mockup

![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)

## URL

> [!WARNING]
> 現在このURLは無効です。

~~https://rcm.d-andoh.com/~~

## About

レストランチェーンのWebサイトのモックアップを生成します。
また、以下の項目を設定した上でモックアップを生成することも可能です。

| 設定項目 | 説明 |
| ---- | ---- |
| Chain Max Number | レストランチェーン数（1-5）  |
| Location Max Number | 各レストランチェーンが持つ店舗数（1-5） |
| Employee Max Number | 各店舗が雇用する従業員数（3-10） |
| Output Format | 出力形式（HTML, Markdown, Json, Text） |

## Usage, Pages

### / or /index.php

完全にランダムにモックアップが生成されます。

![Home](/docs/pages/Home.png)

### /form.php

各値を設定することで、それらを踏まえたモックアップを生成できます。

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

## Development

### Set UP

```
$ cd restaurant-chain-mockup
$ composer install
$ php -S localhost:8000 -t Public
```

### Class Diagram

![ClassDiagram](/docs/diagrams/ClassDiagram.png)

### Sequence Diagram

![SequenceDiagram](/docs/diagrams/SequenceDiagram.png)
