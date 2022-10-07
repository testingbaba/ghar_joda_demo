<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../database/conn_db.php");

$email = $_SESSION['email'];
$phone_no = $_SESSION['mobile_number'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/css/registration.css">
</head>

<body class="rbody">

    <!-- header section -->
    <nav class="navbar fixed-top shadow" style="background-color: #fff;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/images/logo.png" alt="" width="120" height="60">
            </a>
        </div>
    </nav>

    <div class="main">
        <div class="container">
            <div class="registration row justify-content-center">
                <div class="col-sm-8 inner-registration">
                    <div class="nav d-none d-sm-block">
                        <nav class="nav nav-pills nav-justified">
                            <a class="nav-link setup-link active" aria-current="page" href="#">
                                Set Up
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <a class="nav-link basic-link disabled" href="#">
                                Basic Details
                                <i class="fa fa-caret-down d-none" aria-hidden="true"></i>
                            </a>
                            <a class="nav-link profile-link disabled" href="#">
                                Profile Details
                                <i class="fa fa-caret-down d-none" aria-hidden="true"></i>
                            </a>
                            <a class="nav-link additional-link disabled" href="#">
                                Additional Details
                                <i class="fa fa-caret-down d-none" aria-hidden="true"></i>
                            </a>
                        </nav>
                    </div>
                    <div class="form">
                        <form method="post" action="FormData.php">

                            <div class="row g-3" id="setup">
                                <div class="row justify-content-center">
                                    <h2 class="d-block d-sm-none text-center mt-4" style="color: tomato;">Profile Information</h2>
                                    <hr class="d-block d-sm-none mb-4">
                                    <div class="col-sm-8">
                                        <div class="form-row my-2">
                                            <div class="form-group">
                                                <label for="user">Profile for</label>
                                                <select id="mySelect" name="my_Select" class="form-select" onchange="formSon()">
                                                <option disabled selected>Select</option>
                                                    <option value="self">Self</option>
                                                    <option value="son">Son</option>
                                                    <option value="daughter">Daughter</option>
                                                    <option value="brother">Brother</option>
                                                    <option value="sister">Sister</option>
                                                    <option value="friend">Friend</option>
                                                    <option value="relative">Relative</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">

                                            <div class="user-input">
                                                <input type="text" name="name" id="name" placeholder="name">
                                                <label for="fname" id="yname">Enter Name</label>
                                            </div>

                                        </div>
                                        <div class="form-row mt-4" id="UGender" style="display:block ;">
                                            <label class="form-label">Gender</label>
                                            <div>
                                                <div class="form-check-inline my-0 px-0">

                                                    <input type="radio" class="btn-check" name="gender" id="Male" autocomplete="off" value="Male">
                                                    <label class="btn btn-sm btn-outline-primary btn-gender px-3" for="Male">Male</label>

                                                    <input type="radio" class="btn-check" name="gender" id="Female" autocomplete="off" value="Female">
                                                    <label class="btn btn-sm px-3 btn-outline-primary mx-3 btn-gender" for="Female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">

                                            <label for="user">Religion</label>
                                            <select select id="SelectCommunity" name="religion" class="form-select" onchange="ChangeCommunity(this.id,'SubCommuntiy')">
                                                <option disabled selected>Select</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="muslim">Muslim</option>
                                                <option value="christian">Christian</option>
                                                <option value="jain">Jain</option>
                                                <option value="sikh">Sikh</option>
                                                <option value="buddhist">Buddhist</option>
                                                <option value="parsi">Parsi</option>
                                                <option value="jewish">Jewish</option>
                                                <option value="other">Other</option>
                                                <option value="noReligion">No Religion</option>
                                                <option value="spritualNotReligious">Spirtual-not religious</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4">

                                            <label for="user">Community</label>
                                            <select select class="form-select" id="Community" name="community">
                                                <option disabled selected>Select</option>
                                                <option>Aka</option>
                                                <option>Arabic</option>
                                                <option>Arunachali</option>
                                                <option>Assamese</option>
                                                <option>Awadhi</option>
                                                <option>Baluchi</option>
                                                <option>Bengali</option>
                                                <option>Bhojpuri</option>
                                                <option>Bhutia</option>
                                                <option>Brahui</option>
                                                <option>Brij</option>
                                                <option>Burmese</option>
                                                <option>Chattisgarhi</option>
                                                <option>Chinnese</option>
                                                <option>Coorgi</option>
                                                <option>Dogri</option>
                                                <option>English</option>
                                                <option>French</option>
                                                <option>Garhwali</option>
                                                <option>Garo</option>
                                                <option>Gujarati</option>
                                                <option>Haryanvi</option>
                                                <option>Himachali/Pahari</option>
                                                <option>Hindi</option>
                                                <option>Hindko</option>
                                                <option>Kakbarak</option>
                                                <option>Kanauji</option>
                                                <option>Kannada</option>
                                                <option>Kashmiri</option>
                                                <option>Khandesi</option>
                                                <option>Khasi</option>
                                                <option>Konkani</option>
                                                <option>Koshali</option>
                                                <option>Kumaoni</option>
                                                <option>Kutchi</option>
                                                <option>Ladakhi</option>
                                                <option>Lepcha</option>
                                                <option>Magahi</option>
                                                <option>Maithili</option>
                                                <option>Malay</option>
                                                <option>Malayalam</option>
                                                <option>Manipuri</option>
                                                <option>Marathi</option>
                                                <option>Marwari</option>
                                                <option>Miji</option>
                                                <option>Mizo</option>
                                                <option>Monpa</option>
                                                <option>Nepali</option>
                                                <option>Odia</option>
                                                <option>Pashto</option>
                                                <option>Persian</option>
                                                <option>Punjabi</option>
                                                <option>Rajasthani</option>
                                                <option>Russian</option>
                                                <option>Sanskrit</option>
                                                <option>Santhali</option>
                                                <option>Seraiki</option>
                                                <option>Sindhi</option>
                                                <option>Sinhala</option>
                                                <option>Sourashtra</option>
                                                <option>Spanish</option>
                                                <option>Swedish</option>
                                                <option>Tagalog</option>
                                                <option>Tamil</option>
                                                <option>Telgu</option>
                                                <option>Tulu</option>
                                                <option>Urdu</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4 user-input">
                                            <input type="email" id="Email" name="email" value="<?= $email?>" readonly placeholder="Enter your email">
                                            <label>Enter Email</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" id="date" name="date_of_birth" class="form-control">
                                        </div>
                                        <div class="form-row mt-4 user-input">

                                            <input type="tel" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="MobNo" name="mobile_number" value="<?=$phone_no?>" readonly>
                                            <label class="form-label">Phone Number</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">State</label>
                                            <select class="form-select" id="State" name="state">
                                                <option selected disabled>Please select your State</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Arunachal Pradesh</option>
                                                <option>Assam</option>
                                                <option>Bihar</option>
                                                <option>Chhattisgarh</option>
                                                <option>Goa</option>
                                                <option>Gujarat</option>
                                                <option>Haryana</option>
                                                <option>Himachal Pradesh</option>
                                                <option>Jharkhand</option>
                                                <option>Karnataka</option>
                                                <option>Kerala</option>
                                                <option>Madhya Pradesh</option>
                                                <option>Maharashtra</option>
                                                <option>Manipur</option>
                                                <option>Meghalaya</option>
                                                <option>Mizoram</option>
                                                <option>Nagaland</option>
                                                <option>Odisha</option>
                                                <option>Punjab</option>
                                                <option>Rajasthan</option>
                                                <option>Sikkim</option>
                                                <option>Tamil Nadu</option>
                                                <option>Telangana</option>
                                                <option>Tripura</option>
                                                <option>Uttar Pradesh</option>
                                                <option>Uttarakhand</option>
                                                <option>West Bengal</option>
                                            </select>
                                        </div>
                                        <div class="form-row d-flex justify-content-end mt-4">
                                            <a class="btn btn-primary setup-btn" style="font-size: 20px; font-weight: 500;">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row g-3 d-none" id="basic">
                                <div class="row justify-content-center">
                                    <h2 class="d-block d-sm-none text-center mt-4" style="color: tomato;">Basic Details</h2>
                                    <hr class="d-block d-sm-none mb-4">

                                    <div class="col-sm-8">
                                        <div class="form-row my-2 user-input">
                                            <input type="text" id="city" name="city" placeholder="Your current city">
                                            <label class="form-label">City you live in ?</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label> Do you lives with your family?</label><br>
                                            <div class="form-check form-check-inline mt-3 px-0">

                                                <input type="radio" class="btn-check" name="living_with_family" id="FamYes" autocomplete="off" onchange="Family()" value="Yes">
                                                <label class="btn-sm btn btn-outline-primary px-4" for="FamYes">Yes</label>
                                                <input type="radio" class="btn-check" name="living_with_family" id="FamNo" autocomplete="off" onchange="Family()" value="No">
                                                <label class="btn-sm btn btn-outline-primary px-4 mx-3" for="FamNo">No</label>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4 user-input" style="display:none;" id="UFamily">

                                            <input type="text" id="FamilyAddress" placeholder="Your families current city" name="family_address">
                                            <label class="form-label">City your family live in ?</label>
                                        </div>

                                        <div class="form-row mt-4">
                                            <label for="MarriageStatus" class="form-label">Your martial status:</label>
                                            <select id="Mstatus" class="form-select" name="married_status" onchange="MaritalStatus()">
                                                <option disabled selected>Please Select</option>
                                                <option value="Never married">Never married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                                <option value="Annulled">Annulled</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4" style="display:none;" id="Child">
                                            <label>Does you have any children</label>
                                            <br>
                                            <div class="form-check form-check-inline px-0">

                                                <input type="radio" class="btn-check" name="any_child" id="option5" autocomplete="off" onchange="HaveChild()" value="No">
                                                <label class="btn-sm btn btn-outline-primary mt-3 px-4" for="option5">No</label>

                                                <input type="radio" class="btn-check" name="any_child" id="option6" autocomplete="off" onchange="HaveChild()" value="Yes, Living together">
                                                <label class="btn-sm btn btn-outline-primary mt-3 px-3 mx-sm-2" for="option6">Yes, Living
                                                    together</label>

                                                <input type="radio" class="btn-check" name="any_child" id="option7" autocomplete="off" onchange="HaveChild()" value="Yes, Not living together">
                                                <label class="btn-sm btn btn-outline-primary mt-3 px-2 mx-sm-2" for="option7">Yes, Not living
                                                    together</label>
                                            </div>

                                        </div>
                                        <div class="form-row mt-4" style="display:none;" id="NumberOfChild">
                                            <label>No. of children</label>
                                            <br>
                                            <div class="form-check form-check-inline px-0">

                                                <input type="radio" class="btn-check" name="number_of_child" id="option8" autocomplete="off" value="OneChild">
                                                <label class="btn-sm btn btn-outline-primary px-4 mt-3" for="option8">1</label>
                                                <input type="radio" class="btn-check" name="number_of_child" id="option9" autocomplete="off" value="TwoChild">
                                                <label class="btn-sm btn btn-outline-primary px-4 mx-sm-2 mt-3" for="option9">2</label>
                                                <input type="radio" class="btn-check" name="number_of_child" id="option10" autocomplete="off" value="ThreeChild">
                                                <label class="btn-sm btn btn-outline-primary px-4 mx-sm-2 mt-3" for="option10">3</label>
                                                <input type="radio" class="btn-check" name="number_of_child" id="option11" autocomplete="off" value="MoreThenThree">
                                                <label class="btn-sm btn btn-outline-primary px-3 mx-sm-2 mt-3" for="option11">More than 3</label>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Your Diet</label>
                                            <select class="form-select" name="your_diet" id="YrDiet">
                                                <option selected disabled>Please select</option>
                                                <option>veg</option>
                                                <option>Non-veg</option>
                                                <option>Occasionally Non-veg</option>
                                                <option>Eggetarian</option>
                                                <option>Jain</option>
                                                <option>Vegan</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Your height</label>
                                            <select class="form-select" id="YrHeight" name="your_height">
                                                <option selected disabled>Please select</option>
                                                <option>4.5 ft</option>
                                                <option>4.6 ft</option>
                                                <option>4.7 ft</option>
                                                <option>4.8 ft</option>
                                                <option>4.9 ft</option>
                                                <option>4.10 ft</option>
                                                <option>4.11 ft</option>
                                                <option>5 ft</option>
                                                <option>5.1 ft</option>
                                                <option>5.2 ft</option>
                                                <option>5.3 ft</option>
                                                <option>5.4 ft</option>
                                                <option>5.5 ft</option>
                                                <option>5.6 ft</option>
                                                <option>5.7 ft</option>
                                                <option>5.8 ft</option>
                                                <option>5.9 ft</option>
                                                <option>5.10 ft</option>
                                                <option>5.11 ft</option>
                                                <option>6 ft</option>
                                                <option>6.1 ft</option>
                                                <option>6.2 ft</option>
                                                <option>6.3 ft</option>
                                                <option>6.4 ft</option>
                                                <option>6.5 ft</option>
                                                <option>6.6 ft</option>
                                                <option>6.7 ft</option>
                                                <option>6.8 ft</option>
                                                <option>6.9 ft</option>
                                                <option>6.10 ft</option>
                                                <option>6.11 ft</option>
                                                <option>7 ft</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4" id="SCommunity" style="display:block ;">
                                            <label class="form-label">Your Sub-community</label>
                                            <select class="form-select" id="SubCommuntiy" name="sub_community">
                                                <option selected disabled value="default">Please Select</option>
                                            </select>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4">
                                            <a class="btn btn-primary pre-basic-btn" style="font-size: 20px; font-weight: 500;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a>
                                            <a class="btn btn-primary basic-btn" style="font-size: 20px; font-weight: 500;">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row g-3 d-none" id="profile">
                                <div class="row justify-content-center">
                                    <h2 class="d-block d-sm-none text-center mt-4" style="color: tomato;">Career Information</h2>
                                    <hr class="d-block d-sm-none mb-4">

                                    <div class="col-sm-8">
                                        <div class="form-row my-2">
                                            <label class="form-label">His highest qualification</label>
                                            <select class="form-select" id="HQualification" name="high_qualification">
                                                <option selected disabled value="default">Please Select</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4 user-input">
                                            <input type="text" id="CollageName" placeholder="Please enter your collage name" name="collage_name">
                                            <label class="form-label">His collage name</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Your work sector</label>
                                            <select class="form-select" id="WorkSector" name="work_sector">
                                                <option selected disabled>Working with</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4 user-input">
                                            <input type="text" id="profession" placeholder="Ex: Accountant, Software Developer, Teacher" name="profession">
                                            <label class="form-label">You work as</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Your yearly income</label>
                                            <select class="form-select" id="Income" name="income">
                                                <option selected>upto 1 lakh yearly</option>
                                                <option>1 to 2 lakh yearly</option>
                                                <option>2 to 3 lakh yearly</option>
                                                <option>3 to 4 lakh yearly</option>
                                                <option>4 to 7 lakh yearly</option>
                                                <option>7 to 10 lakh yearly</option>
                                                <option>10 to 15 lakh yearly</option>
                                                <option>15 to 20 lakh yearly</option>
                                                <option>20 to 30 lakh yearly</option>
                                                <option>30 to 50 lakh yearly</option>
                                                <option>50 to 70 lakh yearly</option>
                                                <option>70 to 1 Crore yearly</option>
                                                <option>1 Crore and above yearly</option>
                                            </select>
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4">
                                            <a class="btn btn-primary pre-profile-btn" style="font-size: 20px; font-weight: 500;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a>
                                            <a class="btn btn-primary profile-btn" style="font-size: 20px; font-weight: 500;">Next
                                                <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row g-3 d-none" id="additional">
                                <div class="row justify-content-center">
                                    <h2 class="d-block d-sm-none text-center mt-4" style="color: tomato;">Family Details</h2>
                                    <hr class="d-block d-sm-none mb-4">

                                    <div class="col-sm-8">
                                        <div class="form-row my-2">
                                            <label class="form-label">Fathers Status</label>
                                            <select class="form-select" id="FStatus" name="father_status">
                                                <option disabled selected>Please Select</option>
                                                <option>Employed</option>
                                                <option>Business</option>
                                                <option>Retired</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Mother Status</label>
                                            <select class="form-select" id="MStatus" name="mother_status">
                                                <option disabled selected>Please Select</option>
                                                <option>Homemaker</option>
                                                <option>Business</option>
                                                <option>Employed</option>
                                            </select>
                                        </div>

                                        <div class="form-row mt-4 user-input">
                                            <input type="number" id="NumOfSiblings" name="number_of_siblings" placeholder="Please enter how many siblings you have">
                                            <label class="form-label">Number of siblings</label>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label>Family Type</label><br>
                                            <div class="form-check form-check-inline mt-3 px-0">

                                                <input type="radio" class="btn-check" name="family_type" value="Joint" id="inlineRadio1" autocomplete="off">
                                                <label class="btn-sm btn btn-outline-primary px-3" for="inlineRadio1">Joint</label>
                                                <input type="radio" class="btn-check" type="radio" name="family_type" value="Nuclear" id="inlineRadio2" autocomplete="off">
                                                <label class="btn-sm btn btn-outline-primary px-3 mx-3" for="inlineRadio2">Nuclear</label>
                                            </div>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Family Values</label>
                                            <select class="form-select" id="FValue" name="family_value">
                                                <option disabled selected>Please Select</option>
                                                <option>Traditional</option>
                                                <option>Moderate</option>
                                                <option>Liberal</option>
                                            </select>
                                        </div>
                                        <div class="form-row mt-4">
                                            <label class="form-label">Family Affluence</label>
                                            <select class="form-select" id="FAffluence" name="family_affluence">
                                                <option disabled selected>Please Select</option>
                                                <option>Affulent</option>
                                                <option>Upper Middle Class</option>
                                                <option>Middle Class</option>
                                                <option>Lower Middle Class</option>
                                            </select>
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4">
                                            <a class="btn btn-primary pre-additional-btn" style="font-size: 20px; font-weight: 500;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Previous</a>
                                            <button type="submit" class="btn btn-primary additional-btn" name="submit" style="font-size: 20px; font-weight: 500;">Submit <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <div class="footer" style="background-color: #a12c2f;">
        <footer class="footer-links">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <h4 style="color:white; font-size: 26px; font-size: 500;">Company</h4>
                        <hr style="color:white">
                        <ul class="footer-links">
                            <li><a href="index.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Home</a></li>
                            <li><a href="./about_us.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;About Us</a>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Couple</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Membership</a></li>
                            <li><a href="./gallery.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Gallery</a>
                            </li>
                            <li><a href="#contact"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h4 style="color:white; font-size: 26px; font-size: 500;">Privacy & You</h4>
                        <hr style="color:white">
                        <ul class="footer-links">
                            <li><a href="terms_of_use.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Terms of
                                    Use</a></li>
                            <li><a href="./privacy_policy.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Privacy
                                    Policy</a></li>
                            <li><a href="./be_safe_online.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Be Safe
                                    Online</a></li>
                            <li><a href="./report_misuse.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Report
                                    Misuse</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <h4 style="color:white; font-size: 26px; font-size: 500;">Events</h4>
                        <hr style="color:white">
                        <ul class="footer-links">

                            <li><a href="./gift.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Gifts</a></li>

                            <li><a href="./photo_shoots.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Photo
                                    Shoots</a></li>
                            <li><a href="./tripe_advisor.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;trip
                                    advisor</a></li>
                            <li><a href="./invitationCard.html"><i class="fa fa-caret-right"></i>&nbsp; &nbsp;Invitation
                                    Card
                                    Advisor</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h4 style="color:white; font-size: 26px; font-size: 500; ">Follow Us</h4>
                        <hr style="color:white">
                        <div class="soi mt-4">
                            <p href="#"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&nbsp; &nbsp;
                                <span>Noida , Up</span>
                            </p>
                            <p href="#"><i class="fa fa-envelope-o "></i>&nbsp; &nbsp;<span>info@gharjoda.com</span>
                            </p>
                            <p href="#"><i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp;<span>+91-8989898989</span></p>
                            <br><br>
                            <ul class="social-icons">
                                <a class="facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                <a class="twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                <a class="dribbble" href="#"><i class="fa fa-instagram fa-lg"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>
    <div class="footer-dwon">
        <p>Copyright © 2022 Ghar Joda . All Rights Reserved. by <a href="https://www.testingbaba.com/" target="_blank">testing Baba</a></p>
    </div>

    <!-- javascript cdn and file link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {

            // code of next buttons
            var step = 1;
            $('.setup-btn').click(function() {
                $(".setup-link").removeClass("active");
                $(".setup-link i").addClass("d-none");
                $(".basic-link").removeClass("disabled");
                $(".basic-link i").removeClass("d-none")
                $(".basic-link").addClass("active");
                $('#setup').addClass("d-none");
                $('#basic').removeClass("d-none");
            })

            $('.basic-btn').click(function() {
                $(".basic-link").removeClass("active");
                $(".basic-link i").addClass("d-none");
                $(".profile-link").removeClass("disabled");
                $(".profile-link i").removeClass("d-none")
                $(".profile-link").addClass("active");
                $('#basic').addClass("d-none");
                $('#profile').removeClass("d-none");
            })

            $('.profile-btn').click(function() {
                $(".profile-link").removeClass("active");
                $(".profile-link i").addClass("d-none");
                $(".additional-link").removeClass("disabled");
                $(".additional-link i").removeClass("d-none")
                $(".additional-link").addClass("active");
                $('#profile').addClass("d-none");
                $('#additional').removeClass("d-none");
            })


            // code of previous button
            $('.pre-basic-btn').click(function() {
                $(".setup-link").addClass("active");
                $(".setup-link i").removeClass("d-none");
                $(".basic-link i").addClass("d-none")
                $(".basic-link").removeClass("active");
                $('#setup').removeClass("d-none");
                $('#basic').addClass("d-none");
            })

            $('.pre-profile-btn').click(function() {
                $(".basic-link").addClass("active");
                $(".basic-link i").removeClass("d-none");
                $(".profile-link i").addClass("d-none")
                $(".profile-link").removeClass("active");
                $('#basic').removeClass("d-none");
                $('#profile').addClass("d-none");
            })

            $(".pre-additional-btn").click(function() {
                $(".profile-link").addClass("active");
                $(".profile-link i").removeClass("d-none");
                $(".additional-link i").addClass("d-none")
                $(".additional-link").removeClass("active");
                $('#profile').removeClass("d-none");
                $('#additional').addClass("d-none");
            })


            // code of link button
            $('.setup-link').click(function() {
                $(".setup-link").addClass("active");
                $(".setup-link i").removeClass("d-none");
                $('#setup').removeClass("d-none");
                $(".basic-link i, .profile-link i, .additional-link i").addClass("d-none")
                $(".basic-link, .profile-link, .additional-link").removeClass("active");
                $('#basic, #profile, #additional').addClass("d-none");
            })

            $('.basic-link').click(function() {
                $(".basic-link").addClass("active");
                $(".basic-link i").removeClass("d-none");
                $('#basic').removeClass("d-none");
                $(".setup-link i, .profile-link i, .additional-link i").addClass("d-none")
                $(".setup-link, .profile-link, .additional-link").removeClass("active");
                $('#setup, #profile, #additional').addClass("d-none");
            })

            $('.profile-link').click(function() {
                $(".profile-link").addClass("active");
                $(".profile-link i").removeClass("d-none");
                $('#profile').removeClass("d-none");
                $(".basic-link i, .setup-link i, .additional-link i").addClass("d-none")
                $(".basic-link, .setup-link, .additional-link").removeClass("active");
                $('#basic, #setup, #additional').addClass("d-none");
            })

            $('.additional-link').click(function() {
                $(".additional-link").addClass("active");
                $(".additional-link i").removeClass("d-none")
                $('#additional').removeClass("d-none");
                $(".basic-link i, .profile-link i, .setup-link i").addClass("d-none")
                $(".basic-link, .profile-link, .setup-link").removeClass("active");
                $('#basic, #profile, #setup').addClass("d-none");
            })
        })
    </script>
    <script>
        function formSon() {
            var x = document.getElementById("mySelect").value;
            switch (x) {
                case "self":
                    document.getElementById("yname").innerHTML = "Your Name";
                    break;

                case "son":
                    document.getElementById("yname").innerHTML = "Your son's name";
                    break;

                case "daughter":
                    document.getElementById("yname").innerHTML = "Your daughter's name";
                    break;

                case "brother":
                    document.getElementById("yname").innerHTML = "Your brother's name";
                    break;

                case "sister":
                    document.getElementById("yname").innerHTML = "Your sister's name";
                    break;

                case "friend":
                    document.getElementById("yname").innerHTML = "Your friend's name";
                    break;

                case "relative":
                    document.getElementById("yname").innerHTML = "Your relative's name";
                    break;
                default:
                    document.getElementById("yname").innerHTML = "Enter Name";
            }

            if (x == "son" || x == "daughter" || x == "brother" || x == "sister") {
                document.getElementById("UGender").style.display = 'none';
            } else
                document.getElementById("UGender").style.display = 'block';


            if (x == "son" || x == "brother") {
                const MaleBtn = document.getElementById("Male");
                MaleBtn.checked = true;
            }
            else if (x == "daughter" || x == "sister") {
                const FeMaleBtn = document.getElementById("Female");
                FeMaleBtn.checked = true;
            }
            else {
                const MaleBtn = document.getElementById("Male");
                const FeMaleBtn = document.getElementById("Female");
                MaleBtn.checked = false;
                yesss = FeMaleBtn.checked = false;
            }

        }
    </script>


    <script>
        function Family() {
            const famSelectYes = document.getElementById("FamYes");
            const famSelectNo = document.getElementById("FamNo");
            if (famSelectYes.checked == true) {
                document.getElementById('FamilyAddress').value = "";
                document.getElementById("UFamily").style.display = 'none';
            } else {
                document.getElementById("UFamily").style.display = 'block';
            }
        }
    </script>



    <script>
        function MaritalStatus() {
            const x = document.getElementById("Mstatus").value;
            if (x == "Annulled" || x == "Divorced" || x == "Widowed" || x == "Awaiting Divorce") {
                document.getElementById("Child").style.display = 'block';
            } else {
                document.getElementById("Child").style.display = 'none';
                document.getElementById("NumberOfChild").style.display = 'none';
                document.getElementById("option8").checked = false;
                document.getElementById("option9").checked = false;
                document.getElementById("option10").checked = false;
                document.getElementById("option11").checked = false;
                document.getElementById("option5").checked = false;
                document.getElementById("option6").checked = false;
                document.getElementById("option7").checked = false;
            }
        }
    </script>
    <script>
        function HaveChild() {
            const ShowChild = document.getElementById("option5");
            const ShowChild1 = document.getElementById("option6");
            const ShowChild2 = document.getElementById("option7");
            if (ShowChild1.checked == true || ShowChild2.checked == true) {
                document.getElementById("NumberOfChild").style.display = 'block';
            } else {
                document.getElementById("NumberOfChild").style.display = 'none';
                document.getElementById("option8").checked = false;
                document.getElementById("option9").checked = false;
                document.getElementById("option10").checked = false;
                document.getElementById("option11").checked = false;
            }
        }
    </script>

    <script>

    </script>
    <script>
        var HQualification = document.getElementById("HQualification"),
            qualification = [
                "B.E / B.Tech",
                "M.E / M.Tech",
                "M.S Engineering",
                "B.Eng(Hons)",
                "M.Eng(Hons)",
                "Engineering Diploma",
                "AE",
                "AET",
                "B.A",
                "B.Ed",
                "BJMC",
                "BFA",
                "B.Arch",
                "B.Des",
                "BMM",
                "MFA",
                "M.Ed",
                "M.A",
                "MSW",
                "MJMC",
                "M.Arch",
                "M.Des",
                "BA(Hons)",
                "B.Arch(Hons)",
                "DFA",
                "D.Ed",
                "D.Arch",
                "AA",
                "AFA",
                "B.Com",
                "CA / CPA",
                "CFA",
                "CS",
                "BSc / BFin",
                "M.Com",
                "MSc / MFin / MS",
                "BCom(Hons)",
                "PGD Finance",
                "BCA",
                "B.IT",
                "BCS",
                "BA Computer Science",
                "MCA",
                "PGDCA",
                "IT Diploma",
                "ADIT",
                "B.Sc",
                "M.Sc",
                "BSc(Hons)",
                "DipSc",
                "AS",
                "AAS",
                "MBBS",
                "BDS",
                "BPT",
                "BAMS",
                "BHMS",
                "B.Pharma",
                "BVSc",
                "BSN / BScN",
                "MDS",
                "MCh",
                "M.D",
                "M.S Medicine",
                "MPT",
                "DM",
                "M.Pharma",
                "MVSc",
                "MMed",
                "PGD Medicine",
                "ADN",
                "BBA",
                "BHM",
                "BBM",
                "MBA",
                "PGDM",
                "ABA",
                "ADBus",
                "BL / LLB",
                "ML / LLM",
                "LLB(Hons)",
                "ALA",
                "Ph.D",
                "M.Phill",
                "Others Bechelor"
            ];
        for (var i = 0; i < qualification.length; i++) {
            var hql = document.createElement("OPTION"),
                txt = document.createTextNode(qualification[i]);
            hql.appendChild(txt);
            HQualification.insertBefore(hql, HQualification.lastChild);

        }
    </script>
    <script>
        var WorkSector = document.getElementById("WorkSector"),
            sector = [
                "Private Company",
                "Government / Public Sector",
                "Defense / Civil Services",
                "Business / Self Employed",
                "Not Working"
            ];
        for (var i = 0; i < sector.length; i++) {
            var sec = document.createElement("OPTION"),
                sect = document.createTextNode(sector[i]);
            sec.appendChild(sect);
            WorkSector.insertBefore(sec, WorkSector.lastChild);

        }
    </script>
    <script>
        function ChangeCommunity() {
            var change = document.getElementById('SelectCommunity').value;
            if (change == "hindu") {
                document.getElementById('SCommunity').style.display = 'block';
                var arr = [
                    "24 manai telugu chettiar",
                    "96 kuli maratha",
                    "96k kokanastha",
                    "Adi Andhra",
                    "Adi Dharmi",
                    "Adi Dravida",
                    "Adi Karnataka",
                    "Agamudayar",
                    "Agarwal",
                    "Agnikula Kshatriya",
                    "Agri",
                    "Ahir",
                    "Ahom",
                    "Ambalavasi",
                    "Arcot",
                    "Arekatica",
                    "Arora",
                    "Arunthathiyar",
                    "Arya Vysya",
                    "Arya samaj",
                    "Ayyaraka",
                    "Badaga",
                    "Baghel/Pal/Gaderiya",
                    "Bahi",
                    "Baidya",
                    "Baishnab",
                    "Baishya",
                    "Bajantri",
                    "Balija-Naidu ",
                    "Banayat Oriya",
                    "Banik",
                    "Baniya",
                    "Barai",
                    "Bari",
                    "Barnwal",
                    "Barujibi",
                    "Besta",
                    "Bhandari",
                    "Bhatia",
                    "Bhatraju",
                    "Bhavsar",
                    "Bhovi",
                    "Billava",
                    "Boya/Nayak/Naik",
                    "Boyer",
                    "Brahmbatt",
                    "Brahmin-Anavil",
                    "Brahmin-Audichya",
                    "Brahmin-Barendra",
                    "Brahmin-Bhatt",
                    "Brahmin-Bhumihar",
                    "Brahmin-Brahmbhatt",
                    "Brahmin-Dadhich/Dadheech",
                    "Brahmin-Daivadnya",
                    "Brahmin-Danua",
                    "Brahmin-Deshastha",
                    "Brahmin-Dhiman",
                    "Brahmin-Dravida",
                    "Brahmin-Embrandiri",
                    "Brahmin-Goswami",
                    "Brahmin-gour",
                    "Brahmin-Saraswat",
                    "Brahmin-Gujar Gour",
                    "Brahmin-Gurukkal",
                    "Brahmin-Halua",
                    "Brahmin-Havyaka",
                    "Brahmin-Himachali",
                    "Brahmin-Hoyasala",
                    "Brahmin-Lyengar",
                    "Brahmin-Lyer",
                    "Brahmin-Jangid",
                    "Brahmin-Jhadua",
                    "Brahmin-Jhijhotiya",
                    "Brahmin-Kanyakubja",
                    "Brahmin-Karhade",
                    "Brahmin-Kashmiri pandit",
                    "Brahmin-Kokanastha",
                    "Brahmin-Kota",
                    "Brahmin-Kulin",
                    "Brahmin-Kumaoni",
                    "Brahmin-Madhwa",
                    "Brahmin-Maithili",
                    "Brahmin-Modh",
                    "Brahmin-Mohyal",
                    "Brahmin-Nagar",
                    "Brahmin-Namboodiri",
                    "Brahmin-Niyogi",
                    "Brahmin-Niyogi Nandavariki",
                    "Brahmin-Other",
                    "Brahmin-Paliwal",
                    "Brahmin-Panda",
                    "Brahmin-Pareek",
                    "Brahmin-Pushkarna",
                    "Brahmin-Rarhi",
                    "Brahmin-Rudraj",
                    "Brahmin-Sakaldwipi",
                    "Brahmin-Sanadya",
                    "Brahmin-Sanketi",
                    "Brahmin-Saraswat",
                    "Brahmin-sarua",
                    "Brahmin-Saryuparin",
                    "Brahmin-Shivhalli",
                    "Brahmin-Shirmali",
                    "Brahmin-Smartha",
                    "Brahmin-Sri Vaishnava",
                    "Brahmin-Stanika",
                    "Brahmin-Tyagi",
                    "Brahmin-Vaidiki",
                    "Brahmin-Vaikhanasa",
                    "Brahmin-Velanadu",
                    "Brahmin-Viswabrahmin",
                    "Brahmin-Vyas",
                    "Brahmo",
                    "Budhhar",
                    "Bunt(Shetty)",
                    "CKP",
                    "Chalawadi Holeya",
                    "Chambhar",
                    "Chandravanshi Kahar",
                    "Chasa",
                    "Chattada Sri Vaishnava",
                    "Chaudary",
                    "Chaurasia",
                    "Chekkala-Nair",
                    "Chennadasar",
                    "Cheramar",
                    "Chettiar",
                    "Chhetri",
                    "Chippolu/Mera",
                    "Devadiga",
                    "Devanga",
                    "Devar/Thevar/Mukkulathor",
                    "Devendra Kula Vellalar",
                    "Dhangar",
                    "Dheevara",
                    "Dhiman",
                    "Dhoba",
                    "Digambar",
                    "Dommala",
                    "Dusadh",
                    "Ediga",
                    "Ezhava",
                    "Ezhuthachan",
                    "Gabit",
                    "Ganakar",
                    "Gandla",
                    "Ganiga",
                    "Gatti",
                    "Gavali",
                    "Gavara",
                    "Ghumar",
                    "Goala",
                    "Goswami",
                    "Goud",
                    "Gounder",
                    "Gowda",
                    "Gramani",
                    "Gudia",
                    "Gujjar",
                    "Gupta",
                    "Guptan",
                    "Gurjar",
                    "Halwai",
                    "Hedge",
                    "Helava",
                    "Hugar(Jeer)",
                    "Intercaste",
                    "Jaalari",
                    "Jaiswal",
                    "Jandra",
                    "Jangam",
                    "Jat",
                    "Jatav",
                    "Jetty Malla",
                    "Kachara",
                    "Kaibarta",
                    "Kakkalan",
                    "Kalar",
                    "Kalinga",
                    "Kalinga vysya",
                    "Kalita",
                    "Kalwar",
                    "Kamboj",
                    "Kamma ",
                    "Kamma Naidu",
                    "Kammala",
                    "Kaniyan",
                    "Kansari",
                    "Kanu",
                    "Kapu",
                    "Kapu Naidu",
                    "Karana",
                    "Karmakar",
                    "Kartha",
                    "Karuneegar",
                    "Kasar",
                    "Kashyap",
                    "Kavuthiyya/Ezhavathy",
                    "Kayastha",
                    "Khandayat",
                    "Khandelwal",
                    "Kharwar",
                    "Khatik",
                    "Khatri",
                    "Kirar",
                    "Koli",
                    "Koli Patel",
                    "Kongu Vellala gounder",
                    "Korama",
                    "Kori",
                    "Kosthi",
                    "Krishnavaka",
                    "Kshatriya",
                    "Kshatriya-Bhavasar",
                    "Kshatriya/Raju/Varma",
                    "Kudumbi",
                    "Kulal",
                    "Kulalar",
                    "Kulita",
                    "Kumawat",
                    "Kumbara",
                    "Kumbhakar/Kumbhar",
                    "Kumhar",
                    "Kummari",
                    "Kunbi",
                    "Kurava",
                    "Kuravan",
                    "Kurmi",
                    "Kurmi Kshatriya",
                    "Kuruba",
                    "Kuruhina Shetty",
                    "Kurumbar",
                    "Kurup",
                    "Kushwaha",
                    "Lambadi/Banjara",
                    "Lambani",
                    "Leva Patil",
                    "Lingayath",
                    "Lohana",
                    "Lohar",
                    "Loniya/Lonia/Lunia",
                    "Lubana",
                    "Madhesiya",
                    "Madiga",
                    "Mahajan",
                    "Mahar",
                    "Mahendra",
                    "Maheshwari",
                    "Mahindra",
                    "Mahishya",
                    "Majabi",
                    "Mala",
                    "Malayalee Variar",
                    "Mali",
                    "Mallah",
                    "Mangalorean",
                    "Maniyani",
                    "Mannadiar",
                    "Mannan",
                    "Mapila",
                    "Marar",
                    "Maratha",
                    "Maratha-Gomantak",
                    "Maruthuvar",
                    "Marvar",
                    "Marwari",
                    "Matang",
                    "Maurya",
                    "Meda",
                    "Medara",
                    "Meena",
                    "Meenavar",
                    "Meghwal",
                    "Mehra",
                    "Menon",
                    "Meru Darji",
                    "Modak",
                    "Mogaveera",
                    "Monchi",
                    "Mudaliar",
                    "Mudaliar-Arcot",
                    "Mudaliar-saiva",
                    "Mudaliar - Senguntha",
                    "Mudiraj",
                    "Munnuru Kapu",
                    "Muthuraja",
                    "Naagavamsam",
                    "Nadar",
                    "Nagaralu",
                    "Nai",
                    "Naicken",
                    "Naicker",
                    "Naidu",
                    "Naik",
                    "Nair",
                    "Nair-Vaniya",
                    "Nair-Velethadathu",
                    "Nair-Vilakkithala",
                    "Namasudra",
                    "Nambiar",
                    "Nambisan",
                    "Namdev",
                    "Namosudra",
                    "Napit",
                    "Nayak",
                    "Nayaka",
                    "Neeli",
                    "Nhavi",
                    "OBC-Barber/Naayee",
                    "Oswal",
                    "Otari",
                    "Padmasali",
                    "Panchal",
                    "Pandaram",
                    "Panicker",
                    "Paravan",
                    "Parit",
                    "Parkava Kulam",
                    "Partaj",
                    "Pasi",
                    "Paswan",
                    "Patel",
                    "Patel-Desai",
                    "Patel-Dodia",
                    "Patel-Kadva",
                    "Patel-Leva",
                    "Patnaick",
                    "Patra",
                    "Patwa",
                    "Perika",
                    "Pillai",
                    "Pisharody",
                    "Poduval",
                    "Poosala",
                    "Porwal",
                    "Prajapati",
                    "Pulaya",
                    "Raigar",
                    "Rajaka/Chakali/Dhobi",
                    "Rajbhar",
                    "Rajput",
                    "Rajput-Kumaoni",
                    "Rajput-Lodhi",
                    "Ramdasia",
                    "Ramgharia",
                    "Rauniyar",
                    "Ravidasia",
                    "Rawat",
                    "Reddiar",
                    "Reddy",
                    "Relli",
                    "SSK",
                    "Sadgop",
                    "Sagara-Uppara",
                    "Saha",
                    "Sahu",
                    "Saini",
                    "Saiva Vellala",
                    "Sallia",
                    "Sambava",
                    "Satnami",
                    "Savji",
                    "SC",
                    "ST",
                    "Senai Thalaivar",
                    "Sepahia",
                    "Setti Balija",
                    "Shah",
                    "Shilpkar",
                    "Shimpi",
                    "Sindhi-Bhanusali",
                    "Sindhi-Bhatia",
                    "Sindhi-Chhapru",
                    "Sindhi-dadu",
                    "Sindhi-Hyderabadi",
                    "Sindhi-Larai",
                    "Sindhi-Lohana",
                    "Sindhi-Lohiri",
                    "Sindhi-Sehwani",
                    "Sindhi-Thatai",
                    "Sindhi-Amil",
                    "Sindhi-Baibhand",
                    "Sindhi-Larkana",
                    "Sindhi-Sahiti",
                    "Sindhi-Sakkhar",
                    "Sindhi-Shikarpuri",
                    "Somvanshi",
                    "Sonar",
                    "Soni",
                    "Sozhiya Vellalar",
                    "Sri Vaishnava",
                    "Srisayana",
                    "Subarna Banik",
                    "Sugali(Naika)",
                    "Sundhi",
                    "Surya Balija",
                    "Sutar",
                    "Suthar",
                    "Swakula Sali",
                    "Swarnakar",
                    "Tamboli",
                    "Tanti",
                    "Tantuway",
                    "Telaga",
                    "Teli",
                    "Thachar",
                    "Thakur",
                    "Thakkar",
                    "Thandan",
                    "Thigala",
                    "Thiyya",
                    "Thuluva",
                    "Tili",
                    "Togata",
                    "Turupu Kapu",
                    "Udayar",
                    "Urali Gounder",
                    "Urs",
                    "Vada Balija",
                    "Vadagalai",
                    "Vaddera",
                    "Vaduka",
                    "Vaish",
                    "Vaish-Dhaneshawat",
                    "Vaishnav",
                    "Vaishnav-Bhatia",
                    "Vaishnav-Vania",
                    "Vaishya",
                    "Vallala",
                    "Valluvan",
                    "Valmiki",
                    "Vanika Vyshya",
                    "Vaniya Chettiar",
                    "Vanjara",
                    "Vankar",
                    "Vannan",
                    "Vannar",
                    "Vanniyakullak Kshatriya",
                    "Vanniyar",
                    "Variar",
                    "Varshney",
                    "Veerashaiva",
                    "Veelan",
                    "Velama",
                    "Velar",
                    "Vellalar",
                    "Veluthedathu-Nair",
                    "Vettuva Gounder",
                    "Vishwakarma",
                    "Viswabrahmin",
                    "Vokkaliga",
                    "Vysya",
                    "Wadda Balija",
                    "Yadav",
                    "Yellapu",
                    "Other"
                ];

            } else if (change == "muslim") {
                document.getElementById('SCommunity').style.display = 'block';
                var arr = ["Ansari", "Arin", "Awan", "Dekkani", "Jat", "Lebbai", "Memon", "Mugal", "Pathan", "Rajput", "Safi", "Sheikh",
                    "Shia", "Shia Ithna ashariyyah", "Shia Zaidi", "Siddiqui", "Sunni", "Sunni Ehle-Hadith", "Sunni Hanafi", "Sunni Maliki", "Syed",
                    "Sunni Safi"
                ];

            } else if (change == "christian") {
                document.getElementById('SCommunity').style.display = 'block';
                var arr = ["Anglo Indian", "Born Again", "Bretheren", "CMS", "Cannonite", "Catholic", "Catholic Knanya", "Catholic Malankara", "Chaldean Syrian", "Cheramar", "Church of North India (CNI)", "Church of South India (CSI)", "Convert", "Evangelical", "IPC",
                    "Indian Orthodox", "Intercaste", "Jacobite", "Jacobite Knanya", "Knanaya", "Knanaya Catholic", "Knanaya Jacobite", "Knanaya Pentecostal", "Knanya",
                    "Latin Catholic", "Malankara", "Malankara Catholic", "Manglorean", "Marthoma", "Methodist", "Mormon", "Nadar", "Orthodox", "Pentecost", "Presbyterian", "Protestant", "RCSC", "Roman Catholic", "Salvation Army",
                    "Scheduled Caste (SC)", "Scheduled Tribe (ST)", "Seventh day Adventist", "Syrian", "Syrian Catholic", "Syrian Orthodox"
                ];
            } else if (change == "jain") {
                document.getElementById('SCommunity').style.display = 'block';
                var arr = ["Digambar", "Porwal", "Shwetamber", "Vania"];
            } else if (change == "sikh") {
                document.getElementById('SCommunity').style.display = 'block';
                var arr = ["Ahluwalia", "Arora", "Clean Shaven", "Gursikh", "Jat", "Kamboj", "Kor", "Kesadhari", "Khatri", "Kshatriya", "Labana", "Mazhbi/Majabi", "Rajput", "Ramdasia", "Ramgharia",
                    "Ravidasia", "Saini"
                ];
            } else {
                document.getElementById('SCommunity').style.display = 'none';
            }
            var string = "";
            for (i = 0; i < arr.length; i++) {
                string = string + "<option>" + arr[i] + "</option>";
            }
            string = "<select name='lol'>" + string + "</select>";
            document.getElementById('SubCommuntiy').innerHTML = string;

        }
    </script>
</body>

</html>













































<!-- 
        /An array containing all the country names in the world:/
  var Hindu = ["Agarwal","Arora","Baniya","Bramin-Bhumihar","Bramin gour",
  "Bramin Kanyakubja"," Bramin others","Bramin saryuparin","Gupta ","Jat","Jatav",
  "Kayastha","Khatri","Kshatriya","Kurmi","Kushwaha","Rajput","Thakur",
  "Yadav","24 manai telugu chettiar","96 kuli maratha","Bermuda","96k kokanastha"," Adi Andhra","Adi Dharmi",
  "Adi Dravida","Adi Karnataka","Agamudayar","Agarwal","Agnikula Kshatriya","Agri",
  "Ahir","Ahom","Ambalavasi","Arcot","Arekatica","Arora",
  "Arunthathiyar","Arya Vysya","Arya samaj","Ayyaraka","Badaga"," Baghel/Pal/Gaderiya","Bahi",
  "Baidya","Baishnab","Baishya","Bajantri","Balija-Naidu","Banayat Oriya","Banik","Barai",
  "Bari","Barnwal","Barujibi ","Besta","Bhandari","Bhatia",
  "Bhatraju","Bhavsar","Bhovi","Billava","Boya/Nayak/Naik","Boyer",
  "Brahmbatt","Brahmin-Anavil","France","Brahmin-Audichya","Brahmin-Barendra","Brahmin-Bhatt","Brahmin-Bhumihar",
  "Brahmin-Brahmbhatt","Brahmin-Dadhich/Dadheech","Brahmin-Daivadnya","Gibraltar","Brahmin-Danua","Brahmin-Deshastha",
  "Brahmin-Dravida","Brahmin-Embrandiri","Brahmin-Goswami",
  "Guernsey","Brahmin-gour","Brahmin-Saraswat","Brahmin-Gujar Gour","Brahmin-Gurukkal","Brahmin-Halua",
  "Brahmin-Havyaka","Brahmin-Himachali","Brahmin-Hoyasala","Brahmin-Madhwa",
  "Brahmin-Maithili","Brahmin-Modh","Brahmin-Mohyal","Brahmin-Nagar"," Brahmin-Namboodiri","Brahmin-Niyogi",
  "Brahmin-Niyogi Nandavariki","Brahmin-Other",
  "Brahmin-Lyengar","Brahmin-Lyer","Brahmin-Jangid","Brahmin-Jhadua","Brahmin-Jhijhotiya","Brahmin-Kanyakubja",
  "Israel","Brahmin-Karhade","Brahmin-Kashmiri pandit","Brahmin-Kokanastha","Brahmin-Kota",
  "Brahmin-Kulin","Brahmin-Kumaoni","Brahmin-Paliwal","Brahmin-Panda","Brahmin-Pareek","Brahmin-Pushkarna",
  "Brahmin-Rarhi"," Brahmin-Rudraj","Brahmin-Sakaldwipi","Brahmin- Sanadya","Brahmin-Sanketi","Brahmin-Saraswat",
  "Brahmin-sarua","Brahmin-Saryuparin","Brahmin-Shivhalli","Brahmin-Shirmali","Brahmin-Smartha","Brahmin-Sri Vaishnava",
  "Brahmin-Stanika","Brahmin- Tyagi","Brahmin-Vaidiki","Brahmin-Vaikhanasa","Brahmin- Velanadu","Brahmin-Viswabrahmin",
  "Brahmin-Vyas","Brahmin-Other","Brahmo","Budhhar","Bunt(Shetty)","CKP","Chalawadi Holeya","Chambhar","Chandravanshi Kahar","Chasa","Chattada Sri Vaishnava","Chaudary","Chaurasia","Chekkala-Nair",
  "Chennadasar","Cheramar","Chettiar","Chhetri","Chippolu/Mera","Devadiga","Devanga","Devar/Thevar/Mukkulathor","Devendra Kula Vellalar","Dhangar","Dheevara","Dhiman","Dhoba","Digambar","Dommala",
  "Dusadh","Ediga","Ezhava","Ezhuthachan","Gabit","Ganakar","Gandla","Ganiga","Gatti","Gavali","Gavara","Ghumar","Goala","Goswami","Goud",
  "Gounder","Gowda","Gramani","Gudia","Gujjar","Gupta","Guptan","Ganiga","Gatti","Gavali","Gavara","Ghumar","Goala","Goswami","Goud"];
  
  //Muslim//

var Muslim = ["Ansri", "Arin", "Awan", "Dekkani", "Jat", "Lebbai", "Memon", "Mugal", "Pathan", "Rajput", "Safi", "Sheikh", "Shia", "Shia Ithna ashariyyah",
    "Shia Zaidi", "Siddiqui", "Sunni", "Sunni Ehle-Hadith", "Sunni Hanafi", "Sunni Maliki", "Syed", "Sunni Safi"];

//Shik//

var sikh = ["Ahluwalia", "Arora", "Clean Shaven", "Gursikh", "Jat", "Kamboj", "Kor", "Kesadhari", "Khatri", "Kshatriya", "Labana", "Mazhbi/Majabi", "Rajput", "Ramdasia", "Ramgharia",
    "Ravidasia", "Saini"];

//Christian//

var Christian = ["Anglo Indian", "Born Again", "Bretheren", "CMS", "Cannonite", "Catholic", "Catholic Knanya", "Catholic Malankara", "Chaldean Syrian", "Cheramar", "Church of North India (CNI)", "Church of South India (CSI)", "Convert", "Evangelical", "IPC",
    "Indian Orthodox", "Intercaste", "Jacobite", "Jacobite Knanya", "Knanaya", "Knanaya Catholic", "Knanaya Jacobite", "Knanaya Pentecostal", "Knanya",
    "Latin Catholic", "Malankara", "Malankara Catholic", "Manglorean", "Marthoma", "Methodist", "Mormon", "Nadar", "Orthodox", "Pentecost", "Presbyterian", "Protestant", "RCSC", "Roman Catholic", "Salvation Army",
    "Scheduled Caste (SC)", "Scheduled Tribe (ST)", "Seventh day Adventist", "Syrian", "Syrian Catholic", "Syrian Orthodox"];

//Jain//

var Jain = ["Digambar", "Porwal", "Shwetamber", "Vania"];
  /initiate the autocomplete function on the "myInput" element, and pass along the Hindu array as possible autocomplete values:/
  autocomplete(document.getElementById("myInput"), [...Hindu,...Jain,...Muslim,...shik,...Christian]);

  function getComboA(selectObject) {
    var value = selectObject.value;  
    
    switch(value){
      case "Hindu":
        $('.sub-community').css("display","block");
        autocomplete(document.getElementById("myInput"),Hindu);
        break;

      case "Muslim":
        $('.sub-community').css("display","block");
        autocomplete(document.getElementById("myInput"),Muslim);
        break;

      case "shik":
        $('.sub-community').css("display","block");
        autocomplete(document.getElementById("myInput"),shik);
        break;

      case "Christian":
        $('.sub-community').css("display","block");
        autocomplete(document.getElementById("myInput"),Christian);
        break;

      case "Jain":
        $('.sub-community').css("display","block");
        autocomplete(document.getElementById("myInput"),Jain);
        break;

      default:
        $('.sub-community').css("display","none");
        
    }
  }
     -->