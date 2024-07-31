<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Chain Mockup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4">
      <h1 class="text-center">Restaurant Chains</h1>
      <form action="download.php" method="post" class="w-50 my-4 mx-auto">
        <div class="mb-3">
          <label for="chain-max-num" class="form-label">Chain Max Number</label>
          <input type="number" class="form-control" id="chain-max-num" name="chain-max-num" placeholder="1-5" min="1" max="5" required>
        </div>
        <div class="mb-3">
          <label for="location-max-num" class="form-label">Location Max Number</label>
          <input type="number" class="form-control" id="location-max-num" name="location-max-num" placeholder="1-5" min="1" max="5" required>
        </div>
        <div class="mb-3">
          <label for="employee-max-num" class="form-label">Employee Max Number</label>
          <input type="number" class="form-control" id="employee-max-num" name="employee-max-num" placeholder="3-10" min="3" max="10" required>
        </div>
        <div class="mb-3">
          <label for="output-format" class="form-label">Output Format</label>
          <select class="form-select" id="output-format" name="output-format" aria-label="output-format-select">
            <option value="HTML" selected>HTML</option>
            <option value="Markdown">Markdown</option>
            <option value="JSON">JSON</option>
            <option value="Text">Text</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
