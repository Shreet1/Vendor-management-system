<!DOCTYPE html>
<html>
<head>
  <title>Add Vendor</title>
</head>
<body>
  <h2>Add Vendor</h2>
  <form method="post" action="save_vendor.php">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Location:</label>
<input type="text" name="location" placeholder="Enter location" required><br><br>


    <label>WhatsApp Number (with country code):</label>
    <input type="text" name="whatsapp" placeholder="+919876543210" required><br><br>

    <label>Route Served:</label>
    <select name="route" required>
      <option value="">Select Route</option>
    <option value="All India">All India</option>
       <option value="MH Local">MH Local</option>
      <option value="South to South">South to South</option>
      <option value="Mumbai">Mumbai local</option>
      <option value="East to East">East to East</option>
      <option value="North to North">North to North</option>
      <option value="East to East">East to East</option>
      <option value="West to West">West to West</option>
      
      <option value="North to South">North to South</option>
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

    <label>Vehicle Type:</label>
    <select name="vehicle_type" required>
      <option value="">Select Vehicle Type</option>
      <option value="JCB">JCB</option>
      <option value="LCV">LCV</option>
      <option value="Container vehicle">Container vehicle</option>
      <option value="Trailer">Trailer</option>
      <option value="Taurus">Taurus</option>
      <option value="Hydraulic axle">Hydraulic axle</option>
    <option value="Lowbed">Lowbed</option>

    </select><br><br>

    <button type="submit">Add Vendor</button>
  </form>
  <br>
  <a href="search.php">Back to Search</a>
</body>
</html>