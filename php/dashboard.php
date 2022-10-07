<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../database/conn_db.php");
$email = $_SESSION['email'];
// ============ for address verify table ===========
$q = "SELECT * FROM user_profile_address_verify WHERE user_profile_address_verify_email='$email' ";
$result = mysqli_query($con, $q);
$num_record = mysqli_num_rows($result);
if ($num_record) {
    $data_aadhar = mysqli_fetch_array($result, MYSQLI_NUM);
    $aadhar_number = "XXXXXXXX" . substr($data_aadhar[3], 8);
} else {
    $aadhar_number = "XXXXXXXXXXXX";
}

// ====================== for profile photo table ================
$q = "SELECT * FROM user_profile_photo WHERE user_profile_photo_email='$email' ";
$result = mysqli_query($con, $q);
$num_record = mysqli_num_rows($result);
if ($num_record) {
    $data_photo = mysqli_fetch_array($result, MYSQLI_NUM);
    $profile_image = $data_photo[1];
    $profile_image = base64_encode($profile_image);
} else {
    $profile_image = "./tenor1.gif";
}
$email = substr($email, 0, 4) . "xxxxxxx" . substr($email, strlen($email) - 10);

$q = "SELECT user_profile_info.user_profile_name as name, user_profile_info.user_profile_gender as gender, 
user_profile_info.user_profile_dob as user_dob, user_profile_info.user_profile_phone as phone_number, 
user_profile_photo.user_profile_photo_1 as photo_1, user_profile_photo.user_profile_photo_2 as photo_2, 
user_profile_photo.user_profile_photo_3 as photo_3, user_profile_photo.user_profile_photo_4 as photo_4
FROM user_profile_info
LEFT JOIN user_profile_photo
ON user_profile_info.user_profile_email=user_profile_photo.user_profile_photo_email
WHERE user_profile_info.user_profile_email!='{$_SESSION['email']}'";
$result = mysqli_query($con, $q) or die("Query failed : " . mysqli_error($con));
$allarr = mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo "<br><pre>";
// print_r($data);
// echo "<pre>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./examples/profile.css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ghar-Joda | Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <style>
        img {
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Modal for mobile number verification -->
    <div class="outer">
        <div class="inner bg-light">
            <p class="heading ">
                Mobile Number Verification
            </p>

            <form action="" method="post" class="get_number">
                <label for="number">Enter Mobile Number</label><br>
                <input type="number" name="number" id="number" required><br>
                <button type="submit" class="btn mt-4 send_otp" name="send_otp">Send OTP</button>
            </form>

            <form action="" method="post" class="d-none verify_otp">
                <label for="otp">Enter OTP</label>
                <input type="number" name="otp" id="otp">
                <div>
                    <a class="btn btn-change">Change Mobile No.</a>
                    <span class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn number_verify" name="number_verify">Submit</button>
                        <a class="link resend_otp" href="">Resend otp</a>
                    </span>
                </div>
            </form>
            <div>
                <a class="btn skip-btn px-4">Skip</a>
            </div>
        </div>
    </div>

    <!-- Aadhar And Images Section -->
    <div class="outer_img d-none">
        <div class="inner_img bg-light">
            <p class="heading ">
                Upload Profile Image and Aadhar Nnmber
            </p>

            <form action="./aadhar_images.php" method="post" class="get_aadhar_number" onsubmit="return check()" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5">
                        <div class="img">
                            <img id="img" src="./image/default-profile-picture.png" alt="" srcset="">
                        </div>
                        <div class="row">
                            <div class="col term-of-photo text-center">
                                <p><i class="fa-solid fa-check text-success"></i></p>
                                <img src="./image/male-closeup.png" alt="" srcset="">
                            </div>
                            <div class="col term-of-photo text-center">
                                <p><i class="fa-solid fa-xmark text-danger"></i></p>
                                <img src="./image/male-face-blur.png" alt="" srcset="">
                            </div>
                            <a href="" class="link mt-2 ms-3">Term & condition</a>
                        </div>
                    </div>

                    <div class="col-7 mt-2">
                        <label for="number" class="mb-1 ms-2">Enter Aadhar Card Number</label><br>
                        <input type="number" name="aadhar_number" id="aadhar_number" required><br>

                        <label for="File01" class="mt-3 mb-1 ms-2">Choose Aadhar Card Photo</label><br>
                        <div class="input-group">
                            <input type="file" class="form-control img-path" name="aadhar_img" id="File01" required>
                        </div>

                        <label for="File02" class="mt-3 mb-1 ms-2">Choose Profile Photo</label><br>
                        <div class="input-group">
                            <input type="file" class="form-control img-path" name="profile_img" id="File02" required>
                        </div>
                        <div class="col-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-lg mt-4 data_submit" name="send_data">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="dashboard.html" class="simple-text">
                        Ghar-Joda
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.html">
                            <i class="nc-icon nc-notes"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./typography.html">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./icons.html">
                            <i class="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.html">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <span class="no-icon"><?= $email ?></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="light">
                <div class="container py-2">

                    <?php
                    // echo "<br><pre>";
                    // print_r($allarr);
                    // echo "<pre>";
                    foreach ($allarr as $element) {
                        $mobile_number = "XXXXXXX" . substr($element['phone_number'], 7);
                    ?>
                        <article class="postcard light blue mt-5">
                            <a class="postcard__img_link" href="#">
                                <div class="col-md-5">
                                    <div id="CarouselTest" class="carousel slide" data-ride="carouselLeft">
                                        <div class="carousel-inner">
                                            <?php
                                            if (empty($element['photo_1'])) {
                                            ?>
                                                <div class="carousel-item active">
                                                    <img class="d-block" src="./image/default-profile-picture.png" width="500px" height="400" alt="">
                                                </div>

                                            <?php
                                            } else {
                                                $profile_image1 = $element['photo_1'];
                                                $profile_image1 = base64_encode($profile_image1);
                                            ?>
                                                <div class="carousel-item active">
                                                    <img class="d-block" src='data:image/jpeg;base64,<?= $profile_image1 ?>' width="500px" height="400" alt="">
                                                </div>

                                            <?php
                                            }

                                            if (!empty($element['photo_2'])) {
                                                $profile_image2 = $element['photo_2'];
                                                $profile_image2 = base64_encode($profile_image2);
                                            ?>
                                                <div class="carousel-item">
                                                    <img class="d-block" src='data:image/jpeg;base64,<?= $profile_image2 ?>' width="500px" height="400" alt="">
                                                </div>
                                            <?php
                                            }
                                            if (!empty($element['photo_3'])) {
                                                $profile_image3 = $element['photo_3'];
                                                $profile_image3 = base64_encode($profile_image3);
                                            ?>
                                                <div class="carousel-item">
                                                    <img class="d-block" src='data:image/jpeg;base64,<?= $profile_image3 ?>' width="500px" height="400" alt="">
                                                </div>
                                            <?php
                                            }
                                            if (!empty($element['photo_4'])) {
                                                $profile_image4 = $element['photo_4'];
                                                $profile_image4 = base64_encode($profile_image4);
                                            ?>
                                                <div class="carousel-item">
                                                    <img class="d-block" src='data:image/jpeg;base64,<?= $profile_image4 ?>' width="500px" height="400" alt="">
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="postcard__text t-dark">
                                <h1 class="postcard__title blue" style="text-transform: capitalize;"><a href="#"><?= $element['name'] ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        <?= $element['gender'] ?> & Age : 
                                        <?=date_diff(date_create($element['user_dob']), date_create('today'))->y?>
                                    </time>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus
                                    enim quidem excepturi !</div>
                                <ul class="postcard__tagbox">
                                    <!-- <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> -->
                                    <li class="tag__item play blue">
                                        <a href="#" style="font-size: 18px;"><i style="font-size: 22px;" class="fas fa-play mr-2"></i><?= $mobile_number ?></a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    <?php
                    }
                    ?>

                    <!-- <article class="postcard light red">
                        <a class="postcard__img_link" href="#">
                            
                            <div class="col-md-5  ">
                                <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                                        <li data-target="#CarouselTest" data-slide-to="1"></li>
                                        <li data-target="#CarouselTest" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                             

                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title red"><a href="#">Podcast Title</a></h1>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus
                                enim quidem excepturi, illum quos!</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play red">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <article class="postcard light green">
                        <a class="postcard__img_link" href="#">
                            
                            <div class="col-md-5  ">
                                <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                                        <li data-target="#CarouselTest" data-slide-to="1"></li>
                                        <li data-target="#CarouselTest" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title green"><a href="#">Podcast Title</a></h1>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus
                                enim quidem excepturi, illum quos!</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play green">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                    <article class="postcard light yellow">
                        <a class="postcard__img_link" href="#">
                            
                            <div class="col-md-5  ">
                                <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
                                        <li data-target="#CarouselTest" data-slide-to="1"></li>
                                        <li data-target="#CarouselTest" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block" src="https://picsum.photos/500/400" alt="">
                                        </div>
                                        <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            

                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus
                                enim quidem excepturi, illum quos!</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play yellow">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>
                            </ul>
                        </div>
                    </article> -->
                </div>
            </section>


            <!-- Footer Start -->

            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div> -->

</body>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="./assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // =========== mobile number verify section script =====================
        var otp;
        $('.skip-btn').click(function() {
            $('.outer').addClass("d-none")
            if (!(<?= $num_record ?> == 1)) {
                $('.outer_img').removeClass("d-none");
            }
        })

        $('.send_otp').click(function(e) {
            e.preventDefault();
            let number = $('#number').val()
            if (number.toString().length == 10 && parseInt(number) > 0 && number[0] >= 7) {
                $('.get_number').addClass("d-none")
                $('.verify_otp').removeClass("d-none")
                otp = Math.ceil(Math.random() * 1000000);
                alert("your otp is : " + otp);
            } else {
                alert("invalid mobile number")
            }
        })

        $('.resend_otp').click(function(e) {
            e.preventDefault();
            otp = Math.ceil(Math.random() * 1000000);
            alert("your otp is : " + otp);
        })

        $('.number_verify').click(function(e) {
            e.preventDefault();
            let user_otp = $('#otp').val();
            if (parseInt(otp) == parseInt(user_otp)) {
                alert("Number verify successfully")
                $('.outer').addClass("d-none")
                if (!(<?= $num_record ?> == 1)) {
                    $('.outer_img').removeClass("d-none");
                }
            } else {
                alert("Invalid otp")
            }
        })

        $('.btn-change').on("click", function() {
            $('.verify_otp').addClass("d-none")
            $('.get_number').removeClass("d-none")
        })

    })


    // ================== Aadhar number & imagses section script ===========

    // multiplication table
    const d = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
        [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
        [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
        [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
        [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
        [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
        [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
        [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
        [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
    ]

    // permutation table
    const p = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
        [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
        [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
        [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
        [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
        [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
        [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
    ]

    // validates Aadhar number received as string
    function validate(aadharNumber) {
        let c = 0
        let invertedArray = aadharNumber.split('').map(Number).reverse()

        invertedArray.forEach((val, i) => {
            c = d[c][p[(i % 8)][val]]
        })

        return (c === 0)
    }


    function check_file(para) {
        var array1 = ["PNG", "JPEG", "JPG", "GIF"]
        var arr = []
        arr = $(para).val().split("\\")
        arr = arr[2].split('.')
        var file_type = arr.pop()
        return check_file_type = array1.indexOf(file_type.toLocaleUpperCase()) !== -1;
    }

    $('#File02').change(function(event) {
        if (check_file('#File02')) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
            console.log(event.target.files[0])
        } else {
            alert("choose correct file as like (PNG, JPEG, JPG, GIF)")
            $('#File02').val("")
        }
    });

    $('#File01').change(function(event) {
        if (!check_file('#File01')) {
            alert("choose correct file as like (PNG, JPEG, JPG, GIF)")
            $('#File01').val("")
        }
    });

    function check() {
        var number = $('#aadhar_number').val()
        if (validate(number)) {
            return true
        } else {
            alert("Invalid Aadhar Number")
            $('#aadhar_number').focus()
            return false
        }
    }
</script>

</html>