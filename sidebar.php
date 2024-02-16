<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sidebar-files/css/sidebarstylesheet.css">
<link rel="stylesheet" href="sidebar-files/css/fontawesome.css">
<link rel="stylesheet" href="sidebar-files/fonts-6/css/all.css">

</head>

<style>
  <?php include "sidebar-files/css/sidebarstylesheet.css"?>
</style>

<body>

<div class="sidenav">
  <div class="title">
    <h4>LM ENTERPRISES</h4>
</div>
  <a href="index.php"><i class="fa-solid fa-chart-pie"></i>Dashboard</a>
  <a href="#">Customer</a>
  <a href="#">Supplier</a>
  <a href="order.php">Orders</a>


  <button class="dropdown-btn">Products 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="product.php">Products List</a>
    <a href="category.php">Category</a>
    <a href="brand.php">Brands</a>
    <a href="brand.php">Pricing</a>
  </div>

  <button class="dropdown-btn">Returns 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Sell Return list</a>
    <a href="#">Purchase <br>Return list</a>
  </div>

  <a href="user.php">Users</a>
  
  <div class="sidebar-footer">


      <div class="user-name">

            <button class="dropdown-btn"><?php echo $_SESSION["user_name"]; ?>
            
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
          </div>
      </div>

  </div>
  
</div>

<!-- <div class="main" style="margin: 0px 250px;">

</div> -->

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

</body>
</html> 
