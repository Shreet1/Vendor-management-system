<!DOCTYPE html>
<html>
<head>
  <title>Premier Logistics - Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 40px;
      background-color: #f9f9f9;
    }
    h1 {
      text-align: center;
    }
    .menu {
      max-width: 600px;
      margin: 0 auto;
      padding: 30px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .menu a {
      display: block;
      margin: 15px 0;
      padding: 12px 20px;
      background-color: #007BFF;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
      transition: background-color 0.3s ease;
    }
    .menu a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <h1>Premier Logistics Admin Panel</h1>
  <div class="menu">
    <a href="add_vendor.php">➕ Add Vendor</a>
    <a href="search.php">🔍 Search Vendors</a>
    <a href="view_replies.php">📊 View Quotes (Replies)</a>
    <a href="submit_reply.php?vendor_id=1">📝 Test Reply Form (Vendor View)</a>
    <!-- You can add more links here later like Reports, Settings, etc -->
  </div>
</body>
</html>
