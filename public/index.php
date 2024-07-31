<?php
require_once '../vendor/autoload.php';

use Models\Employee;
use Models\RestaurantLocation;
use Models\RestaurantChain;

$chainMax = $_GET['chainMax'] ?? 5;
$locationMax = $_GET['locationMax'] ?? 5;
$chainMax = (int)$chainMax;
$locationMax = (int)$locationMax;

$chainCount = rand(1, $chainMax);
$restaurantChains = [];
for ($i = 0; $i < $chainCount; $i++) {
  $locationCount = rand(1, $locationMax);
  $restaurantLocations = [];
  for ($j = 0; $j < $locationCount; $j++) {
    $employees = Employee::employeesRandomGenerator(3, 10);
    $restaurantLocations[] = RestaurantLocation::locationRandomGenerator($employees);
  }

  $restaurantChain = RestaurantChain::RandomGenerator($restaurantLocations);
  $restaurantChains[] = $restaurantChain;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Chain Mockup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container w-50 my-4">
      <h1 class="text-center">Restaurant Chains</h1>
      <div class="mt-4">
        <?php foreach ($restaurantChains as $restaurantChain): ?>
        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $restaurantChain->getName(); ?>
            </h4>
            <h6 class="card-subtitle text-body-secondary">
              <?php echo $restaurantChain->getWebsite(); ?>
            </h6>
  
            <div class="accordion mt-3" id="accordionExample">
              <?php foreach ($restaurantChain->getLocations() as $i => $location): ?>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $restaurantChain->getChainId() + $i; ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $location->getName(); ?>
                  </button>
                </h2>
                <div id="collapse<?php echo $restaurantChain->getChainId() + $i; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p class="mb-1">
                      <strong>Address:</strong>
                      <?php echo sprintf('%s %s, %s %s', $location->getAddress(), $location->getCity(), $location->getState(), $location->getZipCode()); ?>
                    </p>
                    <p class="m-0">
                      <strong>Status:</strong>
                      <?php echo $location->getIsOpen() ? 'Open' : 'Closed'; ?>
                    </p>

                    <div class="w-100 my-3 border-top"></div>

                    <h5>Employees(<?php echo $location->getEmployeeCount(); ?>)<h5>
                    <ul class="list-group">
                      <?php foreach ($location->getEmployees() as $employee): ?>
                      <li class="list-group-item">
                        <p class="m-0 mb-1 fs-5 fw-normal"><?php echo $employee->getName(); ?></p>
                        <p class="m-0 fs-6 text-secondary fw-light fst-italic"><?php echo $employee->getJobTitle() . ', ' . $employee->getRole(); ?></p>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
