<?php
// enable errors so we can see problems
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Vendor Search</title>
</head>
<body>
  <h2>Search Vendors</h2>
  <form method="post" action="search_results.php">
    <label>Route:</label>
    <input type="text" name="route" required>
    <br><br>
    <label>Vehicle Type:</label>
    <input type="text" name="vehicle_type" required>
    <br><br>
    <button type="submit">Find Vendors</button>
  </form>
</body>
</html>




 