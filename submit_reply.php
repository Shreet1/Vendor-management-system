<?php
$vendor_id = $_GET['vendor_id'];
?>

<form method="post" action="save_reply.php">
  <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
  <label>Company Name:</label>
  <input type="text" name="company" required>
  <label>Vehicle Type:</label>
  <input type="text" name="vehicle_type" required>
  <label>Price:</label>
  <input type="number" name="price" required>
  <button type="submit">Submit Quote</button>
</form>
