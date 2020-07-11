<!--Ayaan Busing and Trucking Institute -->
<?php
session_start();
// connect to database
$db = mysqli_connect('localhost', 'ayaan', 'pass1234', 'Ayaan');
// submit button
if(isset($_POST['submit'])){
  $name = ($_POST['name']);
  $email = ($_POST['email']);
  $phone = ($_POST['phone']);
  $message = ($_POST['message']);

  // check for blank fields
  if($_POST['name'] == " " || $_POST['email'] == " " || $_POST['phone'] == " " || $_POST['message'] == " ") {
      $_SESSION['error-msg'] = "error: all fields are required.";
    }else{
  $sql ="INSERT INTO AyaanTable(name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')";
  mysqli_query($db, $sql);
  $_SESSION['thanks'] = "Thanks!";
  // header ("location: index.php"); //redirect route.

  // send the customers information to the business owners email
  $email_from = "czaman9@gmail.com, ayaan.busing.trucking@gmail.com";
  $email_subject = "New Form Submission";
  $email_body = "You have received a message from $name.\n Name: $name \n Email: $email \n Phone: $phone \n Message: $message";

  $to = "czaman9@gmail.com";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $to \r\n";

  mail($to,$email_subject,$email_body,$headers);
}
}

// submit email form
if(isset($_POST['submitEmail'])){
  $emailAddress = ($_POST['emailAddress']);

  // check for blank field
  if($_POST['emailAddress'] == ""){
      $_SESSION['email-error'] = "error: enter a valid email.";
    }else{

  $sql ="INSERT INTO subscriptionTable(emailAddress) VALUES('$emailAddress')";
  mysqli_query($db, $sql);


// send the submitted email address to the business owner
$email_from = "czaman9@gmail.com";
$email_subject = "New Form Submission";
$email_body = "You've received a customers email address from the website: \n Their email address is below:\n $emailAddress";

$to = "czaman9@gmail.com, ayaan.busing.trucking@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $to \r\n";

mail($to,$email_subject,$email_body,$headers);
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ayaan Busing and Trucking Institute</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque|Handlee&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque|Handlee|Julius+Sans+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <a href="https://icons8.com/icon/122509/traffic-jam"></a>
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="index.php">Ayaan Institute<span>.</span> </a></div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#services-we-offer" class="nav-link">Services</a></li>
                <li><a href="#services-section" class="nav-link">Packages</a></li>
                <li><a href="#deluxe-section" class="nav-link">Deluxe</a></li>
                <li><a href="#individual-section" class="nav-link">Individual</a></li>
                <li><a href="#special-section" class="nav-link">Special</a></li>
                <li><a href="#sling-section" class="nav-link">Slingshots</a></li>
                <li><a href="#trainer-section" class="nav-link">Get Started</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>


    <div class="embed-responsive embed-responsive-16by9" style="z-index: 1;">
      <div class="col-lg-12 mx-auto text-center" data-aos="fade-up" style="position: absolute; margin: -550px 0 0 0;">
        <div class="welcome-text">
          <h1 class="text-white">Ayaan Busing and Trucking Institute</h1>
          <div class="row justify-content-center">
            <div class="col-md-7">
              <form class="first-form" method="post" data-aos="fade">
                <div class="form-group row">
                  <div class="col-md-12 mb-3 mb-lg-0">
                    <input type="text" class="form-control bottom-border-only" placeholder="Name" name="name">
                  </div>

                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="email" class="form-control bottom-border-only" placeholder="Email" name="email">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="text" class="form-control bottom-border-only"placeholder="Phone Number" name="phone">
                  </div>
                </div>
                <div class="form-group row">
                  <!--<div class="col-md-12">
                    <textarea type="text" name="message" class="form-control" id="" cols="30" rows="4"
                      placeholder="Write your message here."></textarea>
                  </div>-->
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <input name="submit" type="submit" class="btn btn-outline-success py-3 px-5 btn-block text-left" value="Get In Touch">
                  </div>
                </div>

              </form>
              <?php
                if(isset($_SESSION['error-msg'])) {
                  echo "<div id = 'error-msg'>".$_SESSION['error-msg']."</div>";
                  unset($_SESSION['error-msg']);
                }
              ?>
            </div>
          </div>

        </div>
      </div>

      <video autoplay loop class="embed-responsive-item" style="z-index: -1;">
          <source src="videos/home-video.mp4" type="video/mp4">
      </video>

    </div>





    <div class="site-section" id="services-we-offer">
      <div class="container">
        <!-- Slider -->
        <div class="owl-carousel nonloop-block-14 block-14" data-aos="fade">
          <div class="slide">
            <div class="ftco-feature-1">
              <i class="flaticon-airplane49"></i>
              <div class="ftco-feature-1-text package-one">
                <a href="#sling-section" class="nav-link"><img src="images/slingshot.png"/><!--<img src="https://img.icons8.com/offices/80/000000/convertible.png">-->
                <h2>Sling Shot Rentals</h2>
                <p class="text-dark">TAKE A JOYRIDE! <br />Experience the thrill of a SLINGSHOT from the cockpit! <br />Reserve yours! </p>
                </a>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1 package-one">
              <div class="ftco-feature-1-text">
                <a href="#deluxe-section" class="nav-link"><img src="https://img.icons8.com/bubbles/100/000000/traffic-jam.png">
                <h2>Driving Lessons</h2>
                <p class="text-dark">Our licensed by state of New York driving instructors have professional drivers background with many years of driving experience.</p>
                </a>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1 package-one">
              <div class="ftco-feature-1-text">
                <a href="#services-section" class="nav-link"><img src="https://img.icons8.com/bubbles/100/000000/truck.png">
                <h2>Truck Driving Lessons</h2>
                <p class="text-dark">We are committed to providing the highest quality of training and education to all individuals wishing to pursue a career in the transportation industry.</p>
                </a>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1 package-one">
              <div class="ftco-feature-1-text">
                <a href="#services-section" class="nav-link"><img src="https://img.icons8.com/doodle/96/000000/motorcycle--v3.png">
                <h2>Motorcycle Lessons</h2>
                <p class="text-dark">We provide professional motorcycle training with New York State certified instructors from beginner to advanced riders.</p>
                </a>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1 package-one">
              <div class="ftco-feature-1-text">
                <img src="https://img.icons8.com/officel/80/000000/jet-ski.png">
                <h2>Boat Safety Course</h2>
                <p class="text-dark">Whether you are a beginner or more advanced sailor we have classes and instructors to help you develop a wide range of skills and confidence in the water.</p>
              </div>
            </div>
          </div>

          <div class="slide">
            <div class="ftco-feature-1 package-one">
              <div class="ftco-feature-1-text">
                <img src="https://img.icons8.com/bubbles/100/000000/bus.png">
                <h2>Bus Driving Lessons</h2>
                <p class="text-dark">A school bus driver must have a Commercial Driver License (CDL). Your private, qualified, professional trainer will guide you all the way to your CDL Skills Test.</p>
              </div>
            </div>
          </div>

        </div>


    <div class="site-section" id="services-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Our Packages</h2>
            <p class="lead text-dark">Make an Appointment by phone today <br>Call or Text <a href="tel:+1-929-507-8721">929-507-8721</a>.<br />
            We Teach Safe Driving on Land & Sea.<br />Free Training and financing if you <strong>qualify.</strong></p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 mb-6 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1 primary-package">
              <table class="table table-bordered border border-primary text-primary">
              <thead>
                <tr>
                  <th class="border border-primary" data-toggle="tooltip" data-placement="bottom" title="$30 off original price" scope="col" colspan="5"><h2 class="heading mb-3 google-font-julius-sans-one">Motorcycle Specials</h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle border border-primary" rowspan="4">1</td>
                  <td class="border border-primary" colspan="3">Three (3) 45 Minute Lessons</td>
                  <td class=" border border-primary align-middle text-success font-weight-bold" rowspan="4">$265<br /></td>
                </tr>
                <tr>
                  <td class="border border-primary" colspan="3">Motorcycle and Instructor for Road Test</td>
                </tr>
                <tr>
                  <td class="border border-primary" colspan="3">Road Test Appointment</td>
                </tr>

              </tbody>

              <tbody>
                <tr>
                  <td class="align-middle border border-primary" rowspan="4">2</td>
                  <td class="border border-primary" colspan="3">Six (6) 45 Minute Lessons</td>
                  <td class=" border border-primary align-middle text-success font-weight-bold" rowspan="4">$410<br /></td>
                </tr>
                <tr>
                  <td class="border border-primary" colspan="3">Motorcycle and Instructor for Road Test</td>
                </tr>
                <tr>
                  <td class="border border-primary" colspan="3">Road Test Appointment</td>
                </tr>

              </tbody>
            </table>

            </div>
          </div>
          <div class="col-lg-6 mb-6 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="secondary-package">
              <table class="table table-bordered border border-secondary text-secondary">
              <thead>
                <tr>
                  <th class="border border-secondary" data-toggle="tooltip" data-placement="bottom" title="$30 off original price" scope="col" colspan="5"><h2 class="heading mb-3 google-font-julius-sans-one">CDL Class A, Class B, & Class B.P<h6>**Additional $40 DMV skills Test Fee NOT INCLUDED</h6></h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle border border-secondary" rowspan="4">1</td>
                  <td class="border border-secondary" colspan="3">Six (6) Road Lessons</td>
                  <td class="border border-secondary align-middle text-success font-weight-bold" rowspan="4">$850<br /></td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Road Test</td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Road Test Appointment</td>
                </tr>

              </tbody>

              <tbody>
                <tr>
                  <td class="align-middle border border-secondary" rowspan="4">2</td>
                  <td class="border border-secondary" colspan="3">Twelve (12) Road Lessons</td>
                  <td class=" border border-secondary align-middle text-success font-weight-bold" rowspan="4">$1,600<br /></td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">2 Road Tests</td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Road Test Appointment</td>
                </tr>

              </tbody>
              <tbody>
                <tr>
                  <td class="align-middle border border-secondary" rowspan="4">3</td>
                  <td class="border border-secondary" colspan="3">Twenty (20) Road Lessons (60 min each)</td>
                  <td class=" border border-secondary align-middle text-success font-weight-bold" rowspan="4">$2,300<br /></td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Pre-trip Course (180 minutes)</td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Road Test</td>
                </tr>
                <tr>
                  <td class="border border-secondary" colspan="3">Road Test Appointment</td>
                </tr>

              </tbody>
            </table>

            </div>
          </div>


          <!--<div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Eat Vegie</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ullam tempore aliquam dolores quos.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Fruit Juices</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut libero, doloribus. Magni, nihil.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Body Warmup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat dolorem debitis assumenda beatae quis.</p>
              </div>
            </div>
          </div>-->

        </div>
      </div>
    </div>











    <!--paste-->
    <div class="site-section" id="deluxe-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Deluxe Packages</h2>
            <p class="lead text-dark">Save money by booking a deluxe package.
              </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1 package-one">
              <table class="table table-bordered border border-warning text-warning">
              <thead>
                <tr>
                  <th class="border border-warning" data-toggle="tooltip" data-placement="bottom" title="$30 off original price" scope="col" colspan="4"><h2 class="heading mb-3 google-font-julius-sans-one">Package Number 1</h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border border-warning" colspan="3">Three (3) 45 Minute Lessons</td>
                  <td class=" border border-warning align-middle text-success font-weight-bold" rowspan="4">$195<br /><del>$225</del></td>
                </tr>
                <tr>
                  <td class="border border-warning" colspan="3">5 Hour (Pre-Licensing) Class</td>
                </tr>
                <tr>
                  <td class="border border-warning" colspan="3">Road Test Appointment</td>
                </tr>
                <tr>
                  <td class="border border-warning" colspan="3">Car for Road Test</td>
                </tr>
              </tbody>
            </table>

            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1 package-two">
              <table class="table table-bordered border border-danger text-danger">
              <thead>
                <tr>
                  <th class="border border-danger" data-toggle="tooltip" data-placement="bottom" title="$100 off original price" scope="col" colspan="4"><h2 class="heading mb-3 google-font-julius-sans-one">Package Number 2</h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border border-danger" colspan="3">Ten (10) 45 Minute Lessons</td>
                  <td class="border border-danger align-middle text-success font-weight-bold" rowspan="4">$370<br /><del>$470</del></td>
                </tr>
                <tr>
                  <td class="border border-danger" colspan="3">5 Hour (Pre-Licensing) Class</td>
                </tr>
                <tr>
                  <td class="border border-danger" colspan="3">Road Test Appointment</td>
                </tr>
                <tr>
                  <td class="border border-danger" colspan="3">Car for Road Test</td>
                </tr>
              </tbody>
            </table>

            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1 package-three">
              <table class="table border table-bordered border-info text-info">
              <thead>
                <tr>
                  <th class="border-info" scope="col" colspan="4"><h2 class="heading mb-3 google-font-julius-sans-one">Package number 3</h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border-info" colspan="3">Fifteen (15) 45 Minute Lessons</td>
                  <td class="border-info align-middle text-success font-weight-bold" rowspan="6" >$595<br /><del>$720</del></td>
                </tr>
                <tr>
                  <td class="border-info" colspan="3">5 Hour (Pre-Licensing)</td>
                </tr>
                <tr>
                  <td class="border-info" colspan="3">6 Hour Defensive Driving</td>
                </tr>
                <tr>
                  <td class="border-info" colspan="3">Road Test Appointment</td>
                </tr>
                <tr>
                  <td class="border-info" colspan="3">Car for Road Test</td>
                </tr>
              </tbody>
            </table>

            </div>
          </div>

          <!--<div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Eat Vegie</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ullam tempore aliquam dolores quos.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Fruit Juices</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut libero, doloribus. Magni, nihil.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Body Warmup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat dolorem debitis assumenda beatae quis.</p>
              </div>
            </div>
          </div>-->

        </div>
      </div>
    </div>















<!--Start Individual Tables-->
<div class="site-section" id="individual-section">
  <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-12 section-heading">
            <!--<h2 class="heading mb-3">Ayaan Busing and Trucking Institute</h2>-->
            <h4>Individual Fees</h4>
            <table class="table table-striped table-hover text-dark">
              <tbody>
                <tr>
                  <th scope="row">Driving Lesson</th>
                  <td>Automatic</td>
                  <td>45 Minutes</td>
                  <td class="text-success font-weight-bold">$35</td>
                </tr>
                <tr>
                  <th scope="row">Driving Lesson</th>
                  <td>Manual</td>
                  <td>45 Minutes</td>
                  <td class="text-success font-weight-bold">$75</td>
                </tr>
                <tr>
                  <th scope="row">Car</th>
                  <td>Automatic</td>
                  <td>(3) Three Hours</td>
                  <td class="text-success font-weight-bold">$75</td>
                </tr>
                <tr>
                  <th scope="row">Motorcycle Lesson</th>
                  <td>Automatic</td>
                  <td>45 Minutes</td>
                  <td class="text-success font-weight-bold">$50</td>
                </tr>
                <tr>
                  <th scope="row">Motorcycle Lesson</th>
                  <td>Manual</td>
                  <td>45 Minutes</td>
                  <td class="text-success font-weight-bold">$50</td>
                </tr>
                <tr>
                  <th scope="row">Motorcycle</th>
                  <td>Automatic</td>
                  <td>(3) Three Hours</td>
                  <td class="text-success font-weight-bold">$75</td>
                </tr>
                <tr>
                  <th scope="row">Five Hour Class</th>
                  <td>(5)</td>
                  <td>Pre-Licensing</td>
                  <td class="text-success font-weight-bold">$40</td>
                </tr>
                <tr>
                  <th scope="row" data-toggle="tooltip" data-placement="top" title="Reduce up to 4 Points & 10% Discount on Insurance">Six Hour Class</th>
                  <td data-toggle="tooltip" data-placement="top" title="Reduce up to 4 Points & 10% Discount on Insurance">(6)</td>
                  <td data-toggle="tooltip" data-placement="top" title="Reduce up to 4 Points & 10% Discount on Insurance">Defensive Driving</td>
                  <td class="text-success font-weight-bold">$75</td>
                </tr>
                <tr>
                  <th scope="row">Road Test</th>
                  <td>Appointment</td>
                  <td>Fee</td>
                  <td class="text-success font-weight-bold">$20</td>
                </tr>
                <tr>
                  <th scope="row">Car</th>
                  <td>Instructor</td>
                  <td>Road Test</td>
                  <td class="text-success font-weight-bold">$60</td>
                </tr>
                <tr>
                  <th scope="row">Motorcycle</th>
                  <td>Instructor</td>
                  <td>Road Test</td>
                  <td class="text-success font-weight-bold">$125</td>
                </tr>
                <tr>
                  <th scope="row">CDL Driving Lesson</th>
                  <td>Class A, B, B.PS, C</td>
                  <td>60 Minutes</td>
                  <td class="text-success font-weight-bold">$110</td>
                </tr>
                <tr>
                  <th scope="row">CDL Vehicle</th>
                  <td>Instructor</td>
                  <td>Road Test</td>
                  <td class="text-success font-weight-bold">$250</td>
                </tr>
                <tr>
                  <th scope="row">Tractor Trailer</th>
                  <td></td>
                  <td>(3) Three Hours</td>
                  <td class="text-success font-weight-bold">$120</td>
                </tr>
                <tr>
                  <th scope="row">Bus Class C or B.PS</th>
                  <td></td>
                  <td>(3) Three Hours</td>
                  <td class="text-success font-weight-bold">$120</td>
                </tr>
                <tr>
                  <th scope="row">Boater Safety Course</th>
                  <td>NYS Adventure License</td>
                  <td>Anchor Emblem</td>
                  <td class="text-success font-weight-bold">$150</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!--Second Table-->
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8 section-heading">
            <!--<h2 class="heading mb-3">Ayaan Busing and Trucking Institute</h2>-->
            <h4>Continuing Education</h4>
            <table class="table table-striped table-hover text-left text-dark">
              <tbody>
                <tr>
                  <th scope="row">Spring/Fall Refresher</th>
                  <td class="text-success font-weight-bold">$20</td>
                </tr>
                <tr>
                  <th scope="row">Pre-Service</th>
                  <td class="text-success font-weight-bold">$30</td>
                </tr>
                <tr>
                  <th scope="row">Physical Performance Test</th>
                  <td class="text-success font-weight-bold">$10</td>
                </tr>
                <tr>
                  <th scope="row">Wheelchair Course</th>
                  <td class="text-success font-weight-bold">$40</td>
                </tr>
                <tr>
                  <th scope="row">Drivers 30 Hours Course</th>
                  <td class="text-success font-weight-bold">$200</td>
                </tr>
                <tr>
                  <th scope="row">CPR</th>
                  <td class="text-success font-weight-bold">$55</td>
                </tr>
                <tr>
                  <th scope="row">First Aid</th>
                  <td class="text-success font-weight-bold">$45</td>
                </tr>
                <tr>
                  <th scope="row">19 Annual & Biannual (Written Road Test)</th>
                  <td class="text-success font-weight-bold">$25</td>
                </tr>
                </tbody>
            </table>
          </div>
        </div> <!--END Individual Tables-->
      </div>
    </div>

      </div>
    </div>

<!--Backgroung images with text -->
    <!--<div class="bgimg" style="background-image: url('images/bg_2.jpg');"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Get The Result You Want</h2>
            <p class="lead mx-auto desc mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta ut quisquam, distinctio illo, debitis repudiandae.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="bgimg" style="background-image: url('images/bg_3.jpg');"  data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Every Step Counts</h2>
            <p class="lead mx-auto desc mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ipsam tempore, sapiente modi facilis est?</p>
          </div>
        </div>
      </div>
    </div>-->
<!--testing--><!--
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Testing</h2>
            <p class="lead text-dark">.</p>
            <video controls style="width:60%;"><source src="videos/ayaan-intro-video.mp4" type="video/mp4"></video>
          </div>
        </div>
      </div>
    </div>-->
<!--testing-->

    <div class="site-section" id="special-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3">Specialized Training and Courses</h2>
            <p class="lead text-dark">Our Instructors are Certified and Experienced.</p>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <ul class="nav days d-flex" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="sunday-tab" data-toggle="tab" href="#nav-sunday" role="tab" aria-controls="sunday"
                  aria-selected="true">Specialized Driver Training</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="monday-tab" data-toggle="tab" href="#nav-monday" role="tab" aria-controls="monday"
                  aria-selected="false">Classroom Courses</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#nav-tuesday" role="tab" aria-controls="tuesday"
                  aria-selected="false">T</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#nav-wednesday" role="tab" aria-controls="wednesday"
                  aria-selected="false">W</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#nav-thursday" role="tab" aria-controls="thursday"
                  aria-selected="false">T</a>
              </li><li class="nav-item">
                <a class="nav-link" id="friday-tab" data-toggle="tab" href="#nav-friday" role="tab" aria-controls="friday"
                  aria-selected="false">F</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="saturday-tab" data-toggle="tab" href="#nav-saturday" role="tab" aria-controls="saturday"
                  aria-selected="false">S</a>
              </li>-->
            </ul>
          </div>
        </div>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="nav-sunday" role="tabpanel" aria-labelledby="nav-sunday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/tractor-trailer-class-a.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Tractor Trailer Class A</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/school-bus-class-b.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">School Bus Class B, P.S</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/truck-class-b.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Truck Class B</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/mini-school-bus-passenger-class-c.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Mini School Bus/Passenger Class C</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>


              </div>

              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/motorcycle-class-m.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Motorcycle Class M</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/stick-shift-manual-transmission.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Stick Shift/Manual Car Class D</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/boater-safety-certificate.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Boater Safety Certificate</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/automatic-car-.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Automatic Car Class D</a></h2>
                    <span>Call or Text</span>,
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>




              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-monday" role="tabpanel" aria-labelledby="nav-monday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/spring-fall-refresher.png" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Spring/Fall Refresher .... $20</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>

                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/pre-service.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Pre Service .... $30</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/physical-performance-test.png" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Physical Performance Test .... $10</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/wheel-chair-course.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Wheel Chair Course .... $40</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/attendant-city-and-state-course.png" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Attendant City & State Coure .... $150</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/thirty-hours-driver-course.png" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">30 Hours Driver Course .... $200</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/cpr-aed-certification.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">CPR & AED Certification</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/first-aid.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">First Aid Certification</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/pre-trip-for-boats.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Pre-Trip for A, B, C, D, M & Boats</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/defensive-driving-six-hour-course.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Defensive Driving (6 Hours) Class</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/pre-licensing-five-hour-course.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Monday - Saturday</span>
                    <h2><a href="#">Pre Licensing (5 Hours) Class</a></h2>
                    <span>Call or Text</span>
                    <span><a href="tel:+1-929-507-8721">929-507-8721</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-tuesday" role="tabpanel" aria-labelledby="nav-tuesday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="#" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="#">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Tuesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-wednesday" role="tabpanel" aria-labelledby="nav-wednesday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Wednesday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="nav-thursday" role="tabpanel" aria-labelledby="nav-thursday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Thursday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-friday" role="tabpanel" aria-labelledby="nav-friday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Friday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-saturday" role="tabpanel" aria-labelledby="nav-saturday-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>




                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>


              </div>
              <div class="col-lg-6">
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_3.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #3</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #1</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_2.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #2</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>



                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_4.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #4</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>

                <div class="class-item d-flex align-items-center">
                  <a href="single.html" class="class-item-thumbnail">
                    <img src="images/img_1.jpg" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>Saturday 7:30am - 9:00am</span>
                    <h2><a href="single.html">Fitness Class Name #5</a></h2>
                    <span>By Justin Daniel</span>,
                    <span>30 minutes</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="site-section" id="sling-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8  section-heading">
           <h2 class="heading mb-3 google-font-julius-sans-one">Slingshot Rentals</h2>
           <p class="lead text-dark">Rent one Today!</p>
           <a href="tel:+1-929-507-8721">929-507-8721</a>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 mb-6 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <video controls style="width:90%;"><source src="videos/citywideslingshotpolaris.mp4" type="video/mp4"></video>

            </div>
          </div>

          <div class="col-lg-6 mb-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1 package-two">
              <table class="table border table-bordered border-danger text-danger">
              <thead>
                <tr>
                  <th class="border-danger" scope="col" colspan="6"><h2 class="heading mb-3">Prices</h2></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border-danger" colspan="5">All Day Pickup 10am – Return 10pm</td>
                  <td class="border-danger align-middle text-success font-weight-bold">$295</td>
                </tr>
                <tr>
                  <td class="border-danger" colspan="5">1 Day Over Night Pickup 10am – Return 10am</td>
                  <td class="border-danger align-middle text-success font-weight-bold">$395</td>
                </tr>
                <tr>
                  <td class="border-danger" colspan="5">2 Days Pickup 10am – Return 10am</td>
                  <td class="border-danger align-middle text-success font-weight-bold">$595</td>
                </tr>
                <tr>
                  <td class="border-danger" colspan="6"> Pickup from our main location in Queens NY:<br /> <a href="https://goo.gl/maps/3JXptE7X8t6uod7b9" target="_blank">10243 Jamaica Ave. Richmond Hill, NY 11408</a></td>

                </tr>

              </tbody>
            </table>

            </div>
          </div>

          <!--<div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-vegetables"></span>
              <div class="ftco-feature-1-text">
                <h2>Eat Vegie</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores ullam tempore aliquam dolores quos.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fruit-juice"></span>
              <div class="ftco-feature-1-text">
                <h2>Fruit Juices</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic aut libero, doloribus. Magni, nihil.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
              <span class="icon flaticon-stationary-bike"></span>
              <div class="ftco-feature-1-text">
                <h2>Body Warmup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat dolorem debitis assumenda beatae quis.</p>
              </div>
            </div>
          </div>-->

        </div>
      </div>
    </div>

















    <!--<div class="bgimg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7">
            <h2 class="">Your Fitness Partner Where Ever You Are</h2>
            <p class="lead mx-auto desc mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, nisi cum officia alias recusandae neque reprehenderit.</p>
          </div>
        </div>
      </div>
    </div>-->




    <div class="site-section" id="trainer-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade-up">
          <div class="col-md-8 section-heading">
            <h2 class="heading mb-3 google-font-julius-sans-one">Get Started</h2>
            <p class="lead text-dark">Our Process is Simple and Seamless.</p>
          </div>
        </div>

        <div class="row">

          <div class="package-two col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="">

            <div>
              <img src="https://img.icons8.com/officel/80/000000/money-transfer.png">
              <h5>Small Deposit will start your package</h5>
              <p class="text-dark">Balance due within two weeks Call or Text now to start the process.<br /><a href="tel:+1-929-507-8721">929-507-8721</a></p>
            </div>

          </div>

          <div class="package-two col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <div>
              <img src="https://img.icons8.com/officel/80/000000/card-in-use.png">
              <h5>Pre payment reserves your seat</h5>
              <p class="text-dark">Our classes are held weekly and are booked fast. <br>Call or Text now to start the process.<br /><a href="tel:+1-929-507-8721">929-507-8721</a></p>
            </div>
          </div>

          <div class="package-two col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div>
              <img src="https://img.icons8.com/color/96/000000/school-director.png">
              <h5>College Trained Instructors</h5>
              <p class="text-dark">Highly experienced college trained instructors will have you confident on the road!<br /><a href="tel:+1-929-507-8721">929-507-8721</a></p>
            </div>
          </div>

          <div class="package-two col-lg-3 mb-4 mb-lg-0 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
            <div>
              <img src="data:image/png;base64,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">
              <h5>Nervous Students are our specialty</h5>
              <p class="text-dark">We have expert instructors who will ensure the best learning experience.<br><a href="tel:+1-929-507-8721">929-507-8721</a></p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



    <!--cut-->
    <div class="site-section bg-light contact-wrap" id="contact-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <h2 class="heading mb-3 google-font-julius-sans-one">Contact Us</h2>
            <p class="lead text-dark">Drop us a line</p>
            <?php
            if(isset($_SESSION['elsemessage'])){
              echo "<p>".$_SESSION['elsemessage']."</p>";
              unset($_SESSION['elsemessage']);
            }
            ?>
          </div>
        </div>
<!--Form-->
        <div class="row justify-content-center">
          <div class="col-md-7">
            <form class="text-white" method="post" data-aos="fade">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control"placeholder="Phone" name="phone">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" class="form-control" cols="30" rows="10"
                    placeholder="Write your message here."></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">

                  <input name="submit" type="submit" class="btn btn-outline-warning py-3 px-5 btn-block" value="Send Message">
                </div>
              </div>

            </form>
            <?php
              if(isset($_SESSION['error-msg'])) {
                echo "<div id = 'error-msg'>".$_SESSION['error-msg']."</div>";
                unset($_SESSION['error-msg']);
              }
            ?>
          </div>
        </div>
      </div>
    </div>


    <footer class="footer-section bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="text-white">Ayaan Busing and Trucking Institute </h3>
            <a class="text-white" href="https://goo.gl/maps/3JXptE7X8t6uod7b9" target="_blank">10243 Jamaica Ave. <br />Richmond Hill, NY 11408</a><br /><a class="text-white" href="tel:+1-929-507-8721"> Call or Text 929-507-8721</a><br>
            <br><a class="text-white" href="+1-718-850-8100">Call the office <br> 718-850-8100</a>
            <br><a class="text-white" href="+1-718-850-8103">718-850-8103</a>
          </div>

          <div class="col-md-3 ml-auto">
            <h3 class="text-white">Follow us</h3>
            <ul class="list-unstyled footer-links text-white">

              <a class="fb-ic text-white" href="https://www.facebook.com/Ayaan-Busing-Trucking-Institute-689851984864443/" target="_blank">
            <i class="fab fa-facebook-f white-text mr-4 social-links"> </i>
          </a>
          <!-- Twitter -->
          <!--<a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4 social-links"> </i>
          </a>-->
              <!--Instagram-->
              <a class="ins-ic mr-3 text-white" href="https://www.instagram.com/ayaan_institute/" target="_blank" role="button"><i class="fab fa-lg fa-instagram social-links"></i></a>
              <br><br><a class="text-white" href="/Immediate-Hire-School-bus.pdf" target="_blank"/>Careers</a>
            </ul>
          </div>

          <div class="col-md-4">
            <h3 class="text-white">Get more info</h3>
            <form method="post">
              <div class="d-flex mb-5">
                <input name="emailAddress" type="email" class="form-control rounded-0" placeholder="Enter Your Email">
                <input name="submitEmail" type="submit" class="btn btn-outline-warning rounded-0" value="Get Info">
              </div>
            </form>
            <?php
              if(isset($_SESSION['email-error'])) {
                echo "<div id = 'email-error'>".$_SESSION['email-error']."</div>";
                unset($_SESSION['email-error']);
              }
            ?>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>document.write(new Date().getFullYear());</script> All rights reserved Ayaan Institute Inc.
          </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>
