<style>
  .navbar-brand img {
    margin-right: 10px;
  }

  .navbar-brand span {
    font-size: 20px;
    font-weight: bold;
  }

  .nav-item {
    margin-right: 15px;
  }

  .nav-item:last-child {
    margin-right: 0;
  }

  .nav-link {
    transition: color 0.3s ease;
  }

  .nav-link:hover {
    color: #ffc107 !important;
  }

  .nav-link.active {
    color: #ffc107 !important;
  }

  .dropdown-toggle::after {
    display: none;
  }

  .dropdown-toggle::before {
    content: '\f107';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-right: 5px;
  }

  .dropdown-menu {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
  }

  .dropdown-item {
    color: #333;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .dropdown-item:hover {
    background-color: #ffc107;
    color: #fff;
  }

  .dropdown-divider {
    margin: 5px 0;
  }

  .user-img {
    position: absolute;
    height: 27px;
    width: 27px;
    object-fit: cover;
    left: -7%;
    top: -12%;
  }

  .user-dd:hover {
    color: #fff !important;
  }



  .navsidebutton{
      color: black;
      transition: 0.5s;
  }

  .navsidebutton:hover{
      color: white;
  }



</style>



<nav class="navbar navbar-expand py-4" style="background-color:#fff; box-shadow: 0px 15px 20px -25px rgba(0, 0, 0, 0.45);">
  <div class="container">
    <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand text-danger" href="./">
      <span>Pharma</span>
    </a>

    <div class="collapse navbar-collapse col-lg" id="navbarSupportedContent"> <!-- Removed the # symbol -->
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="./">Home</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="./?p=products">Products</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="./?p=about">About</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="./?p=contact">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="./?p=labs">Laboratory Services</a></li>

        <?php
        if ($_settings->userdata('id') != '' && $_settings->userdata('id') != 2) :
          $cart = $conn->query("SELECT SUM(quantity) FROM `cart_list` where customer_id = '{$_settings->userdata('id')}' ")->fetch_array()[0];
        endif;
        $cart = isset($cart) && $cart > 0 ? $cart : '';
        ?>
        <?php if ($_settings->userdata('id') != '' && $_settings->userdata('login_type') == 2) : ?>
          <li class="nav-item"><a class="nav-link text-dark" href="./?p=cart_list">Cart <span class="ml-2 badge badge-primary"><?= $cart > 0 ? format_num($cart) : '' ?></span></a></li>
        <?php endif; ?>
      </ul>
      <div class="d-flex align-items-center">
        <?php if ($_settings->userdata('id') != '' && $_settings->userdata('login_type') == 2) : ?>
          <div class="btn-group nav-link">
            <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image"></span>
              <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname') . ' ' . $_settings->userdata('lastname')) ?></span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="<?php echo base_url . '?p=user' ?>"><span class="fa fa-user"></span> My Account</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url . '?p=orders' ?>"><span class="fa fa-table"></span> My Orders</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url . '/classes/Login.php?f=logout_customer' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
            </div>
          </div>
        <?php else : ?>


          <button class="  btn btn-outline-dark font-weight-bolder mx-2">
            <a href="./login.php" class="navsidebutton text-decoration-none ">Login</a>
          </button>
          <button class=" btn btn-outline-dark font-weight-bolder mx-2">
            <a href="./register.php" class="navsidebutton text-decoration-none">Register</a>
          </button>
          <!-- <button class=" btn btn-outline-dark font-weight-bolder mx-2">
            <a href="./admin" class="navsidebutton text-decoration-none">Admin Panel</a>
          </button> -->


        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>



<script>
  $(function() {
    $('#search_report').click(function() {
      uni_modal("Search Request Report", "report/search.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function() {
      $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function() {
      if ($('body').offset.top == 0)
        $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e) {
    e.preventDefault()
    var sTxt = $('[name="search"]').val()
    if (sTxt != '')
      location.href = './?p=products&search=' + sTxt;
  })
</script>