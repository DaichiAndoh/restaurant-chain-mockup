<?php
spl_autoload_extensions('.php'); 
spl_autoload_register();

require_once 'vendor/autoload.php';

use Models\Employee;
use Models\RestaurantLocation;
use Models\RestaurantChain;


$CHAIN_MIN_NUM = 1;
$CHAIN_MAX_NUM = 5;
$LOCATION_MIN_NUM = 1;
$LOCATION_MAX_NUM = 5;
$EMPLOYEE_MIN_NUM = 3;
$EMPLOYEE_MAX_NUM = 10;
$OUTPUT_FORMAT_DEFAULT = 'HTML';

function validateNumberInput(string $label, int $num, int $min, int $max): void {
  if (is_null($num)) {
    exit(sprintf("%s is required.", $label));
  }
  if ($num < $min || $num > $max) {
    exit(sprintf("%s is invalid value.", $label));
  }
}

function validateOutputFormat(string $format): void {
  if (is_null($format)) {
    exit("output-format is required.");
  }
  if (!in_array($format, ['html', 'markdown', 'json', 'text'])) {
    exit("output-format is invalid value.");
  }
}

// POSTリクエストからパラメータを取得
$chainMaxNum = $_POST['chain-max-num'] ?? $CHAIN_MAX_NUM;
$locationMaxNum = $_POST['location-max-num'] ?? $LOCATION_MAX_NUM;
$employeeMaxNum = $_POST['employee-max-num'] ?? $EMPLOYEE_MAX_NUM;
$outputFormat = $_POST['output-format'] ?? $OUTPUT_FORMAT_DEFAULT;

// パラメータを検証
$chainMaxNum = (int)$chainMaxNum;
$locationMaxNum = (int)$locationMaxNum;
$employeeMaxNum = (int)$employeeMaxNum;
$outputFormat = strtolower($outputFormat);

validateNumberInput(
  'chain-max-num',
  $chainMaxNum,
  $CHAIN_MIN_NUM,
  $CHAIN_MAX_NUM,
);
validateNumberInput(
  'location-max-num',
  $locationMaxNum,
  $LOCATION_MIN_NUM,
  $LOCATION_MAX_NUM,
);
validateNumberInput(
  'employee-max-num',
  $employeeMaxNum,
  $EMPLOYEE_MIN_NUM,
  $EMPLOYEE_MAX_NUM,
);
validateOutputFormat($outputFormat);

// 各種インスタンスを生成
$chains = [];
for ($i = 0; $i < $chainMaxNum; $i++) {
  $locationNum = rand(1, $locationMaxNum);
  $locations = [];
  for ($j = 0; $j < $locationNum; $j++) {
    $employees = Employee::employeesRandomGenerator($EMPLOYEE_MIN_NUM, $employeeMaxNum);
    $locations[] = RestaurantLocation::locationRandomGenerator($employees);
  }

  $chain = RestaurantChain::RandomGenerator($locations);
  $chains[] = $chain;
}

// レスポンス
if ($outputFormat === 'markdown') {
  header('Content-Type: text/markdown');
  header('Content-Disposition: attachment; filename="chains.md"');
  foreach ($chains as $chain) {
    echo $chain->toMarkdown();
  }
} elseif ($outputFormat === 'json') {
  header('Content-Type: application/json');
  header('Content-Disposition: attachment; filename="chains.json"');
  $chainsArray = array_map(fn($chain) => $chain->toArray(), $chains);
  echo json_encode($chainsArray);
} elseif ($outputFormat === 'text') {
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename="chains.txt"');
  foreach ($chains as $chain) {
    echo $chain->toString();
  }
} else {
  header('Content-Type: text/html');
  foreach ($chains as $chain) {
    echo $chain->toHTML();
  }
}
?>
