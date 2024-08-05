<h1>Welcome, <?php echo $_settings->userdata('firstname') . " " . $_settings->userdata('lastname') ?>!</h1>
<hr>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "omos_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Get the number of appointments booked
$numAppointments = $conn->query("SELECT COUNT(*) as count FROM appointment_user")->fetch_assoc()['count'];
$numFeedback = $conn->query("SELECT COUNT(*) as count FROM feedback")->fetch_assoc()['count'];


?>

<div class="container">
  <h1>Welcome, <?php echo $_settings->userdata('firstname') . " " . $_settings->userdata('lastname') ?>!</h1>
  <hr>

  <!-- Display popup notification -->
  <script>
    window.onload = function() {
        a = alert("Number of appointments booked: <?php echo $numAppointments; ?>")
        b = alert("You have total new mesages: <?php echo $numFeedback; ?>")
        if(a = undefined){
        window.location.href = "omos_edit/admin/?page=appointments.php"; 
        }
    }
  </script>

  <!-- Rest of your HTML content -->

</div>


<div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categories</span>
        <span class="info-box-number text-right h5">
          <?php
          $category = $conn->query("SELECT * FROM category_list where delete_flag = 0")->num_rows;
          echo format_num($category);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Products</span>
        <span class="info-box-number text-right h5">
          <?php
          $products = $conn->query("SELECT id FROM product_list where `status` = 0")->num_rows;
          echo format_num($products);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pending Orders</span>
        <span class="info-box-number text-right h5">
          <?php
          $order = $conn->query("SELECT id FROM order_list where `status` = 0")->num_rows;
          echo format_num($order);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Packed Orders</span>
        <span class="info-box-number text-right h5">
          <?php
          $order = $conn->query("SELECT id FROM order_list where `status` = 1")->num_rows;
          echo format_num($order);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Out for Delivery</span>
        <span class="info-box-number text-right h5">
          <?php
          $order = $conn->query("SELECT id FROM order_list where `status` = 2")->num_rows;
          echo format_num($order);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Completed Orders</span>
        <span class="info-box-number text-right h5">
          <?php
          $order = $conn->query("SELECT id FROM order_list where `status` = 3")->num_rows;
          echo format_num($order);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>


  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Appointments</span>
        <span class="info-box-number text-right h5">
          <?php echo $numAppointments ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

    <!-- Feedbacks here -->
    <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-file-invoice"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Feedbacks</span>
        <span class="info-box-number text-right h5">
          <?php echo $numFeedback ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>


  <!-- /.col -->
</div>
<div class="container">
  <?php
  $files = array();
  $fopen = scandir(base_app . 'uploads/banner');
  foreach ($fopen as $fname) {
    if (in_array($fname, array('.', '..')))
      continue;
    $files[] = validate_image('uploads/banner/' . $fname);
  }
  ?>
  <div id="tourCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner h-100">
      <?php foreach ($files as $k => $img) : ?>
        <div class="carousel-item  h-100 <?php echo $k == 0 ? 'active' : '' ?>">
          <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
        </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>