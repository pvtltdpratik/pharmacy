


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Laboratory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
  <!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->
  <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
  <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->


  <!-- <link rel="stylesheet" href="css/aos.css"> -->

  <link rel="stylesheet" href="css/style.css">
    <style>
        /* Custom CSS for image centering */
        .image-container {
            padding: 5rem;
            height: 100%;
            /* Adjust height as needed */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body>

    <div class="site-section p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mr-auto">
                    <div class="border text-center image-container" style="background-image: url('./dist/img/lab_01_large.jpg');">
                    </div>
                </div>

                
                <div class="col-md-6">
                    <h2 class="text-black">Siddhesh BioHealth Diagnostics Center</h2>
                    <p>A urinalysis might be part of a routine medical exam, pregnancy checkup or pre-surgery preparation. Or it might be used to screen for a variety of disorders, such as diabetes, kidney disease or liver disease, when you're admitted to a hospital.</p>

                    <p><del>₹950.00</del> <strong class="text-primary h4">₹550.00</strong></p>

                    <!-- <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">−</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">+</button>
                            </div>
                        </div>
                    </div> -->
					<div>
						<?php if($_settings->userdata('id') != '' && $_settings->userdata('login_type') == 2): ?>
							<button class="btn btn-maroon btn-sm bg-gradient-maroon text-light rounded-0" type="button" id="add_to_cart"><i class="fa fa-cart-plus"></i> Book Appointment</button>
						<?php else: ?>
							<a class="btn btn-maroon btn-sm bg-gradient-maroon text-light rounded-0" href="./login.php" ><i class="fa fa-cart-plus"></i> Book Appointment</a>
						<?php endif; ?>
						<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?p=labs"><i class="fa fa-angle-left"></i> Back to List</a>
					</div>

                    <div class="mt-5">
                        <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link bg-danger text-light active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Laboratory
                                    Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg-danger text-light" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Services
                                    Offered</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>License Number</th>
                                            <th>Services</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>LIC201022014</td>
                                            <td>Pathology, Radiology, Blood Tests, CBC , uric acid calcium , LFY proteins , kfy lipid & vitamin b12</td>
                                            <td>Chhatrapati Sambhajinagar</td>
                                        </tr>
                                        <tr>
                                            <td>LIC201022015</td>
                                            <td>Immunology, Microbiology</td>
                                            <td>Mumbai</td>
                                        </tr>
                                        <tr>
                                            <td>LIC201022016</td>
                                            <td>Genetics, Oncology</td>
                                            <td>Bengaluru</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <table class="table custom-table">
                                    <tbody>
                                        <tr>
                                            <td>Working Hours</td>
                                            <td class="bg-light">Mon - Sat: 8:00 AM - 6:00 PM</td>
                                        </tr>
                                        <tr>
                                            <td>Contact Information</td>
                                            <td class="bg-light">Phone: +91 8149532987</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="bg-light">Email: siddheshlab@gmail.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
document.getElementById("add_to_cart").addEventListener("click", function(){
    window.location.href = "http://localhost/omos_edit/?p=appointment";
});

</script>
