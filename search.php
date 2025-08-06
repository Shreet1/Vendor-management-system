<?php
// enable errors so we can see problems
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search Vendors</title>
</head>
<body>
  <h2>Search Vendors</h2>
  <form method="post" action="search_results.php">
    <label>Route:</label>
    <select name="route" required>
      <option value="">Select Route</option>
      <option value="All India">All India</option>

      <option value="North to South">North to South</option>
      <option value="MH Local">MH Local</option>
      <option value="South to South">South to South</option>
      <option value="Mumbai">Mumbai local</option>
      <option value="East to East">East to East</option>
      <option value="North to North">North to North</option>
      <option value="East to East">East to East</option>
      <option value="West to West">West to West</option>
      
      <option value="South to North">South to North</option>
      <option value="North to North-East">North to North-East</option>
      <option value="North-East to North">North-East to North</option>
      <option value="North to East">North to East</option>
      <option value="East to North">East to North</option>
      <option value="North to West">North to West</option>
      <option value="West to North">West to North</option>
      <option value="North-East to South">North-East to South</option>
      <option value="South to North-East">South to North-East</option>
      <option value="North-East to East">North-East to East</option>
      <option value="East to North-East">East to North-East</option>
      <option value="North-East to West">North-East to West</option>
      <option value="West to North-East">West to North-East</option>
      <option value="South to East">South to East</option>
      <option value="East to South">East to South</option>
      <option value="South to West">South to West</option>
      <option value="West to South">West to South</option>
      <option value="East to West">East to West</option>
      <option value="West to East">West to East</option>
    </select><br><br>

    <label>Specific Route (e.g. Mumbai to Chennai):</label>
    <input type="text" name="specific_route" required><br><br>

    <label>Vehicle Type:</label>
    <select name="vehicle_type" required>
      <option value="JCB">JCB</option>
      <option value="LCV">LCV</option>
      <option value="Container vehicle">Container vehicle</option>
      <option value="Trailer">Trailer</option>
      <option value="Taurus">Taurus</option>
      <option value="Hydraulic axle">Hydraulic axle</option>
    <option value="Lowbed">Lowbed</option>

    </select><br><br>

    <label>Cargo Size in feet:</label>
    <input type="text" name="size" placeholder="e.g. 20x10x30" required><br><br>

    <label>Cargo weight in metric tons:</label>
    <input type="text" name="weight" placeholder="e.g., 5 tons, 10 tons" required><br><br>

    <button type="submit">Find Vendors</button>
  </form>
</body>
</html>
