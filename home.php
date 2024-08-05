<link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">


<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/style.css">





<style>
    .carousel-item>img {
        object-fit: cover !important;
    }

    #carouselExampleControls .carousel-inner {
        height: 35em !important;
    }

    .welcometopharma {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 5rem;
    }
</style>





<div id="carouselExampleControls" class="row carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $upload_path = "uploads/banner";
        if (is_dir(base_app . $upload_path)) :
            $file = scandir(base_app . $upload_path);
            $_i = 0;
            foreach ($file as $img) :
                if (in_array($img, array('.', '..')))
                    continue;
                $_i++;
        ?>
                <div class="carousel-item <?php echo $_i == 1 ? "active" : '' ?>">
                    <div style="background-image:url(<?php echo validate_image($upload_path . '/' . $img) ?>); background-size:cover; background-position:center center; height:50rem; background-color:rgba(0, 0, 0, 0.7); background-blend-mode:darken;" class="" alt="<?php echo $img ?>">
                        <div class="container d-flex">
                            <div class="row align-self-center">
                                <div class="col-lg-7 justify-content-center order-lg-2">
                                    <div class="site-block-cover-content justify-content-center text-center">
                                        <p class="text-light welcometopharma">Welcome To Pharma</p>
                                        <h2 class="sub-title text-light py-2" style="font-family:'Times New Roman', Times, serif; font-size:2rem;">Effective Medicine,<br> New Medicine Everyday</h2>
                                        <p>
                                            <a href="./?p=products" class="btn btn-danger px-5 py-3">Explore Product</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
<!-- 
<div class=" row site-section " style="margin-top:9rem;">
    <div class="container">
        <div class="row align-items-stretch section-overlap">

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="#" class="h-100">
                <h5>Free <br> Shipping</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="#" class="h-100">
                <h5>Season <br> Sale 50% Off</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="#" class="h-100">
                <h5>Buy <br> A Gift Card</h5>
                <p>
                  Amet sit amet dolor
                  <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
                </p>
              </a>
            </div>
          </div>

        </div>
    </div>
</div> -->


<div class="site-section bg-secondary bg-image mb-5" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>Pharma Products</h2>
               
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>