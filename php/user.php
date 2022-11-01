<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../database/conn_db.php");
$email = $_SESSION['email'];
$query = "SELECT u.user_profile_name as name, 
u.user_profile_marial_status as married_status,
u.user_profile_gender as gender,
u.user_profile_email as email,
u.user_profile_dob as user_dob,
u.user_profile_height as height, 
u.user_profile_phone as phone_number,
u.user_profile_health_info as health_info,
u.user_profile_any_disability as user_disability,
u.user_profile_blood_group as blood_group,
u.user_profile_marial_status as marital_Status,
u.user_profile_children_status as child_status,
u.user_profile_no_children as num_of_children,
u.user_profile_weight as user_weight,
u.user_profile_complexion as user_complexion,
u.user_profile_phone as phone_num,
ad.user_profile_country as country,
ad.user_profile_state as state1,
ad.user_profile_city as city,
ad.user_profile_zip_code as zip_code,
f.user_profile_father_name as father_name,
f.user_profile_mother_name as mother_name,
f.user_profile_father_status as father_status,
f.user_profile_mother_status as mother_status,
f.user_profile_native_place as native_place,
f.user_profile_no_of_siblings as siblings,
f.user_profile_family_type as family_type,
f.user_profile_family_values as family_value,
f.user_profile_family_affluence as family_affulence,
c.user_profile_college_name as college_name,
c.user_profile_work_sector as work_sector,
c.user_profile_work_as as occupation,
c.user_profile_income as user_income,
c.user_profile_highest_qualification as qualification,
c.user_profile_college_attened_status as user_attend_college,
p.user_profile_photo_1 as photo_1,
i.user_profile_hobbies as hobbies,
i.user_profile_interests as intrest,
i.user_profile_fav_music as music,
i.user_profile_pref_movies as movies,
i.user_profile_sports as sports,
i.user_profile_fav_cuisine as cuisine1,
i.user_profile_pref_dress_style as dressing_style,
i.user_profile_cultural_background as culture,
i.user_profile_spoken_languages as languages,
r.user_profile_religion as religion,
r.user_profile_mother_tongue as mother_tongue,
r.user_profile_community as community,
r.user_profile_sub_community as sub_community,
r.user_profile_gothra_or_gothram as gothra,
r.user_profile_manglik_chevvai_dosham as manglik_dosham,
r.user_profile_nakshatra as nakshatra,
l.user_profile_diet as diet,
l.user_profile_smoking as smoking,
l.user_profile_drinking as drinking
FROM user_profile_info u
LEFT JOIN user_profile_photo p
ON u.user_profile_email=p.user_profile_photo_email
INNER JOIN user_profile_career c
ON u.user_profile_email=c.user_profile_email2
LEFT JOIN user_profile_religious_background r
ON u.user_profile_email= r.user_profile_email
LEFT JOIN user_profile_address ad
ON u.user_profile_email= ad.user_profile_email11
LEFT JOIN user_profile_family f
ON u.user_profile_email= f.user_profile_email1
LEFT JOIN user_profile_hobbies_interests i
ON u.user_profile_email= i.user_profile_email6
LEFT JOIN user_profile_lifestyle l
ON u.user_profile_email= l.user_profile_email3
WHERE u.user_profile_email='{$email}'";
$result = mysqli_query($con, $query) or die("Query failed : " . mysqli_error($con));
$arrdata = mysqli_fetch_assoc($result);

// echo "<br><pre>";
// print_r($allarr);
// echo "<pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ghar-Joda|Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="./assets/img/sidebar-5.jpg">
            <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
            -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="dashboard.php" class="simple-text">
                        Ghar-Joda
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
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
                    <a class="navbar-brand" href="#pablo"> User </a>
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
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
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
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div class="card-header">
                                            <h4 class="card-title">Profile Info</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input type="text" style="text-transform: capitalize;" required placeholder="Your Name" name="fname" class="form-control" value="<?= $arrdata['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <input type="text" style="text-transform: capitalize;"  class="form-control" required placeholder="Your Gender" name="gender" value="<?= $arrdata['gender'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Date of birth</label>
                                                    <input type="date"  class="form-control"  required placeholder="YYYY/MM/DD" name="dob" value="<?= $arrdata['user_dob'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Health Information</label>
                                                    <input type="text" style="text-transform: capitalize;" class="form-control"  placeholder="Any Disease You Have" name="health_information" value="<?= $arrdata['health_info'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Disability</label>
                                                    <input type="text" style="text-transform: capitalize;" class="form-control"  placeholder="Any Disability" name="disability" value="<?= $arrdata['user_disability'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Blood group</label>
                                                    <input type="text" class="form-control" placeholder="Blood Group Type" name="blood_group" value="<?= $arrdata['blood_group'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="Example@email.com" name="mail" value="<?= $arrdata['email'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label for="marital_status">Marital Status</label>
                                                    <input type="text" class="form-control" placeholder="Your SubCommunity" style="text-transform: capitalize;" required name="marital_status" value="<?= $arrdata['marital_Status'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Do You Have Any Child</label>
                                                    <input type="text" class="form-control" placeholder="Any Child Or Not" style="text-transform: capitalize;" required name="u_have_child" value="<?= $arrdata['child_status'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Number of child</label>
                                                    <input type="number" class="form-control" placeholder="How Much Child You Have" required name="num_of_child" min="0" max="10" value="<?= $arrdata['num_of_children'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Your Weight</label>
                                                    <input type="text" class="form-control" placeholder="Enter your weight" name="weight" value="<?= $arrdata['user_weight'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Your Complexion</label>
                                                    <input type="text" class="form-control" placeholder="Fair, Dark ETC" style="text-transform: capitalize;" name="complexion" value="<?= $arrdata['user_complexion'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Phone number</label>
                                                    <input type="tel" class="form-control" required placeholder="Your Phone Number" name="phone_number" value="<?= $arrdata['phone_num'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Your height</label>
                                                    <input type="text" class="form-control" required placeholder="Your height" name="height" value="<?= $arrdata['height'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Address</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Your Country</label>
                                                    <input type="text" class="form-control" required placeholder="your country" name="country" value="<?= $arrdata['country'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control" required placeholder="Your State" name="state" value="<?= $arrdata['state1'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control" required placeholder="Your city" name="city" value="<?= $arrdata['city'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Zip code</label>
                                                    <input type="text" class="form-control" required placeholder="Aria zip code" name="zip_code" value="<?= $arrdata['zip_code'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Family</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Father's Name</label>
                                                    <input type="text" class="form-control" required placeholder="your Father's Name" name="father_name" value="<?= $arrdata['father_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Mother's Name</label>
                                                    <input type="text" class="form-control" required placeholder="Your Mother's Name" name="mother_name" value="<?= $arrdata['mother_name'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Father's Status</label>
                                                    <input type="text" class="form-control" required placeholder="Your Father's Status" name="father_status" value="<?= $arrdata['father_status'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Mother's Status</label>
                                                    <input type="text" class="form-control" required placeholder="Your Mother's Status" name="mother_status" value="<?= $arrdata['mother_status'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Your Native Place</label>
                                                    <input type="text" class="form-control" required placeholder="Your Home Town" name="home_town" value="<?= $arrdata['native_place'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Total No. Of Sibling</label>
                                                    <input type="text" class="form-control" required placeholder="Your total sibling" name="no_of_siblings" value="<?= $arrdata['siblings'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Family Type</label>
                                                    <input type="text" class="form-control" required placeholder="Your Family Type" name="family_type" value="<?= $arrdata['family_type'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Your Family Values</label>
                                                    <input type="text" class="form-control" required placeholder="Family Value" name="family_value" value="<?= $arrdata['family_value'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Family Affluence</label>
                                                    <input type="text" class="form-control" required placeholder="Family Affluence" name="family_Affluence" value="<?= $arrdata['family_affulence'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Carrer</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Highest Qualification</label>
                                                    <input type="text" class="form-control" required placeholder="Your Highest Qualification" name="highest_qualificatoin" value="<?= $arrdata['qualification'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>College Name</label>
                                                    <input type="text" class="form-control" required placeholder="Your College Name" name="collage_name" value="<?= $arrdata['college_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Work Sector</label>
                                                    <input type="text" class="form-control" required placeholder="Your Work Sector" name="work_sector" value="<?= $arrdata['work_sector'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>You Work As</label>
                                                    <input type="text" class="form-control" required placeholder="Work As" name="work_as" value="<?= $arrdata['occupation'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Your Income</label>
                                                    <input type="text" class="form-control" required placeholder="Annual Income" name="income" value="<?= $arrdata['user_income'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>You Attend College</label>
                                                    <input type="text" class="form-control" placeholder="You Attend College" name="attend_collage" value="<?= $arrdata['user_attend_college'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Hobbies</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Your Hobbies</label>
                                                    <input type="text" class="form-control" placeholder="Your Hobbies" name="hobbies" value="<?= $arrdata['hobbies'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Your Interest</label>
                                                    <input type="text" class="form-control" placeholder="Your Interest" name="interest" value="<?= $arrdata['intrest'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Your Music Type</label>
                                                    <input type="text" class="form-control" placeholder="Your Music Type" name="music_type" value="<?= $arrdata['music'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Preferred Movie Genre</label>
                                                    <input type="text" class="form-control" placeholder="Sci-Fi, Comedy" name="movie_genre" value="<?= $arrdata['movies'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Favourite Sport</label>
                                                    <input type="text" class="form-control" placeholder="Your Favourite Sport" name="fav_sports" value="<?= $arrdata['sports'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 pr-1">
                                                <div class="form-group">
                                                    <label>Favourite cuisine</label>
                                                    <input type="text" class="form-control" placeholder="Chinese, Indian ETC." name="fav_cuisine" value="<?= $arrdata['cuisine1'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Dressing Style</label>
                                                    <input type="text" class="form-control" placeholder="Ethnic, Western, Classic" name="dressing_style" value="<?= $arrdata['dressing_style'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Culture Background</label>
                                                    <input type="text" class="form-control" placeholder="" name="culture_background" value="<?= $arrdata['culture'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label>Spoken Language</label>
                                                    <input type="text" class="form-control" placeholder="Hindi, Gujrati ETC." name="spoken_language" value="<?= $arrdata['languages'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Life-Style</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Diet</label>
                                                    <input type="text" class="form-control" required placeholder="Your Diet" name="diet" value="<?= $arrdata['diet'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Smoking</label>
                                                    <input type="text" class="form-control" placeholder="Do You Smoking :- Yes/No" name="smoking" value="<?= $arrdata['smoking'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Drinking</label>
                                                    <input type="text" class="form-control" placeholder="Do You Drink" name="drinking" value="<?= $arrdata['drinking'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4 class="card-title">Religion</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Your Religion</label>
                                                    <input type="text" class="form-control" required placeholder="Your Religion" name="religion" value="<?= $arrdata['religion'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Mother Tongue</label>
                                                    <input type="text" class="form-control" placeholder="Hindi, English, ETC." name="mother_tongue" value="<?= $arrdata['mother_tongue'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Community</label>
                                                    <input type="text" class="form-control" required placeholder="Your Community" name="community" value="<?= $arrdata['community'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Sub Community</label>
                                                    <input type="text" class="form-control" required placeholder="Your Sub Community" name="sub_community" value="<?= $arrdata['sub_community'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Gothra or Gothram</label>
                                                    <input type="text" class="form-control" placeholder="Your Gothra" name="gotra" value="<?= $arrdata['gothra'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Manglik Dosham</label>
                                                    <input type="text" class="form-control" placeholder="Yes/No" value="<?= $arrdata['manglik_dosham'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Nakshatra</label>
                                                    <input type="text" class="form-control" placeholder="Your Nakshatra" name="nakshatra" value="<?= $arrdata['nakshatra'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" name="description" placeholder="Here can be your description" value="Mike">I am searching a suitable life partner for me.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="update_user" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['update_user'])) {
                                $fname = $_POST['fname'];
                                $gender = $_POST['gender'];
                                $dob = $_POST['dob'];
                                $health_information = $_POST['health_information'];
                                $disability = $_POST['disability'];
                                $blood_group = $_POST['blood_group'];
                                $marital_status = $_POST['marital_status'];
                                $u_have_child = $_POST['u_have_child'];
                                $num_of_child = $_POST['num_of_child'];
                                $weight = $_POST['weight'];
                                $complexion = $_POST['complexion'];
                                $height = $_POST['height'];
                                $country = $_POST['country'];
                                $state = $_POST['state'];
                                $city = $_POST['city'];
                                $zip_code = $_POST['zip_code'];

                                $result = mysqli_query($con, "UPDATE user_profile_info SET user_profile_name='$fname', user_profile_gender='$gender',
                                 user_profile_dob='$dob', user_profile_health_info='$health_information', user_profile_any_disability=
                                 '$disability', user_profile_blood_group='$blood_group', user_profile_marial_status=
                                 '$marital_status', user_profile_children_status='$u_have_child', user_profile_no_children='$num_of_child',
                                 user_profile_weight='$weight', user_profile_complexion='$complexion', user_profile_height='$height'    WHERE user_profile_email='$email' ");
                                $result_1 = mysqli_query($con, "UPDATE user_profile_address SET user_profile_country = '$country', user_profile_state =
                                '$state', user_profile_city = '$city', user_profile_zip_code = '$zip_code'  WHERE user_profile_email11='$email' ");
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            ?>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <!-- <img class="avatar border-gray" src="./assets/img/faces/face-3.jpg" alt="..."> -->
                                        <?php
                                        if (empty($arrdata['photo_1'])) {
                                        ?>
                                            <div class="carousel-item active">
                                                <img class="avatar border-gray" class="d-block" src="./image/default-profile-picture1.jpg" alt="not found">
                                            </div>
                                        <?php
                                        } else {
                                            $profile_image1 = $arrdata['photo_1'];
                                            $profile_image1 = base64_encode($profile_image1);
                                        ?>
                                            <div class="carousel-item active">
                                                <img class="avatar border-gray" class="d-block" src='data:image/jpeg;base64,<?= $profile_image1 ?>' alt="not found">
                                            </div>

                                        <?php
                                        }
                                        ?>
                                        <div class="row text-center">
                                            <div class="col mt-2">
                                                <h5 class="title" style="text-transform: capitalize; font-weight: 600; font-size: 20px;"><?= $arrdata['name'] ?></h5>
                                            </div>
                                        </div>
                                        <div class="row text-left">
                                            <div class="col-7">
                                                <h5><?= date_diff(date_create($arrdata['user_dob']), date_create('today'))->y ?> years, <?= $arrdata['height'] ?>.</h5>
                                            </div>
                                            <div class="col-5">
                                                <h5 style="text-transform: capitalize;"><?= $arrdata['married_status'] ?></h5>
                                            </div>
                                        </div>
                                        <div class="row text-left">
                                            <div class="col-7">
                                                <h5 style="text-transform: capitalize;"><?= $arrdata['occupation'] ?></h5>
                                            </div>
                                            <div class="col-5">
                                                <h5 style="text-transform: uppercase;"><?= $arrdata['qualification'] ?></h5>
                                            </div>
                                        </div>
                                        <!-- <p class="description">
                                            michael24
                                        </p> -->
                                    </div>
                                    <p class="description text-center">
                                        "I am searching a suitable life partner for me." <br>
                                        Phone number: <?= $arrdata['phone_number'] ?>
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

</html>