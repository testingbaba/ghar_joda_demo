<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Conformation & Response</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
   <style>
      .outer {
         width: 100%;
         height: 100vh;
         background-color: #f8f9f9;
      }

      .inner {
         width: 500px;
         height: 325px;
         background-color: #fff;
         box-sizing: border-box;
         text-align: center;
         padding: 20px 20px;
         border-radius: 10px;
         box-shadow: 2px 4px 6px rgb(182, 182, 182);
      }

      .fa-check {
         font-size: 40px;
      }

      .conform {
         font-size: 25px;
         font-weight: 600;
         background: -webkit-linear-gradient(45deg, rgba(255, 198, 6, 1) 0%, rgba(21, 240, 9, 1) 51%, rgba(139, 255, 3, 1) 100%);
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
      }

      img {
         border-radius: 50%;
      }

      .btn-outline-primary {
         --bs-btn-color: rgba(21, 240, 9, 1);
         --bs-btn-border-color: rgba(21, 240, 9, 1);
         --bs-btn-hover-color: #fff;
         --bs-btn-hover-bg: rgba(21, 240, 9, 1);
         --bs-btn-hover-border-color: rgba(21, 240, 9, 1);
         --bs-btn-focus-shadow-rgb: 13, 110, 253;
         --bs-btn-active-color: #fff;
         --bs-btn-active-bg: rgba(21, 240, 9, 1);
         --bs-btn-active-border-color: rgba(21, 240, 9, 1);
         --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
         --bs-btn-disabled-color: rgba(21, 240, 9, 1);
         --bs-btn-disabled-bg: transparent;
         --bs-btn-disabled-border-color: rgba(21, 240, 9, 1);
         --bs-gradient: none;
      }

      .btn {
         font-size: 18px !important;
         font-weight: 600 !important;
      }

      .fa-arrow-right {
         transition: .5s;
      }

      .btn:hover .fa-arrow-right {
         transform: translateX(5px);
      }
   </style>
</head>

<body>
   <?php

   //include auth_session.php file on all user panel pages
   include("auth_session.php");
   include("../database/conn_db.php");


   // Post the request from the submit
   if (isset($_POST['submit'])) {

      //Get Request from the Registration Page
      extract($_REQUEST);
      $curDate = date("Y-m-d H:i:s");
      // died function invoked explicitly when error comes
      function died($error)
      {
         // your error code can go here
         echo '<script language="javaScript">
            alert("Registration process is not complited!");
            window.location.href="profile_registration.php";
          </script>';
      }


      //To Check the mandatory fields
      if (
         !isset($_POST['name']) ||
         !isset($_POST['gender']) ||
         !isset($_POST['email']) ||
         !isset($_POST['date_of_birth']) ||
         !isset($_POST['mobile_number']) ||
         !isset($_POST['married_status']) ||
         !isset($_POST['your_height']) ||
         !isset($_POST['religion']) ||
         !isset($_POST['community']) ||
         !isset($_POST['sub_community']) ||
         !isset($_POST['state']) ||
         !isset($_POST['city']) ||
         !isset($_POST['living_with_family']) ||
         !isset($_POST['father_status']) ||
         !isset($_POST['mother_status']) ||
         !isset($_POST['number_of_siblings']) ||
         !isset($_POST['family_type']) ||
         !isset($_POST['family_value']) ||
         !isset($_POST['family_affluence']) ||
         !isset($_POST['your_diet']) ||
         !isset($_POST['high_qualification']) ||
         !isset($_POST['collage_name']) ||
         !isset($_POST['work_sector']) ||
         !isset($_POST['profession']) ||
         !isset($_POST['income'])
      ) {
         died('Error! found with profile information the form you submitted.');
      }

      //user_profile_info(Table 1)
      $profile_for = $_POST['my_Select'];
      $name = $_POST['name'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $date_of_birth = $_POST['date_of_birth'];
      $mobile_number = $_POST['mobile_number'];
      $married_status = $_POST['married_status'];
      $your_height = $_POST['your_height'];
      $any_child = "no";
      $number_of_child = 0;

      //not a magnatory fields
      if (isset($_POST['any_child']) && isset($_POST['number_of_child'])) {
         $any_child = $_POST['any_child'];  //optional field
         $number_of_child = $_POST['number_of_child'];  //optional field
      }
      $q = "INSERT INTO user_profile_info (user_profile_children_status,user_profile_dob,user_profile_email,user_profile_name,user_profile_for,user_profile_gender,user_profile_height,user_profile_marial_status,user_profile_no_children,user_profile_phone) VALUES ('$any_child','$date_of_birth','$email','$name','$profile_for','$gender','$your_height','$married_status',$number_of_child,$mobile_number)";
      $result1 = mysqli_query($con, $q) or die('failed query 1 : ' . mysqli_error($con));



      //user_profile_religious_background(Table 2)
      $religion = $_POST['religion'];
      $community = $_POST['community'];
      $sub_community = $_POST['sub_community'];

      $q = "INSERT INTO user_profile_religious_background(user_profile_community,user_profile_email,user_profile_religion,user_profile_sub_community) 
   VALUES('$community','$email','$religion','$sub_community')";
      $result2 = mysqli_query($con, $q) or die('failed query 2' . mysqli_error($con));



      //user_profile_address(Table 3)
      $state = $_POST['state'];
      $city = $_POST['city'];

      $q = "INSERT INTO user_profile_address(user_profile_city,user_profile_email11,user_profile_state) 
   VALUES('$city','$email','$state')";
      $result3 = mysqli_query($con, $q) or die('failed query 3' . mysqli_error($con));



      //user_profile_family(Table 4)
      $family_address = "";
      if (isset($_POST['family_address'])) {
         $family_address = $_POST['family_address']; //return text and optional field
      }
      $living_with_family = $_POST['living_with_family']; //return true/false
      $father_status = $_POST['father_status'];
      $mother_status = $_POST['mother_status'];
      $number_of_siblings = $_POST['number_of_siblings'];
      $family_type = $_POST['family_type'];
      $family_value = $_POST['family_value'];
      $family_affluence = $_POST['family_affluence'];

      $q = "INSERT INTO user_profile_family(user_profile_email1,user_profile_family_affluence,user_profile_family_type,user_profile_family_values,user_profile_father_status,user_profile_mother_status,user_profile_native_place,user_profile_no_of_siblings) 
   VALUES('$email','$family_affluence','$family_type','$family_value','$father_status','$mother_status','$family_address','$number_of_siblings')";
      $result4 = mysqli_query($con, $q) or die('failed query 4' . mysqli_error($con));


      //user_profile_lifestyle(Table 5)
      $your_diet = $_POST['your_diet'];

      $q = "INSERT INTO user_profile_lifestyle(user_profile_diet,user_profile_email3) 
   VALUES('$your_diet','$email')";
      $result5 = mysqli_query($con, $q) or die('failed query 5' . mysqli_error($con));



      //user_profile_career(Table 6)
      $high_qualification = $_POST['high_qualification'];
      $collage_name = $_POST['collage_name'];
      $work_sector = $_POST['work_sector'];
      $profession = $_POST['profession'];
      $income = $_POST['income'];

      $q = "INSERT INTO user_profile_career(user_profile_email2,user_profile_highest_qualification,user_profile_income,user_profile_college_name,user_profile_work_as,user_profile_work_sector) 
   VALUES('$email','$high_qualification','$income','$collage_name','$profession','$work_sector')";
      $result6 = mysqli_query($con, $q) or die('failed query 6' . mysqli_error($con));


      // user_profile_hobbies_interests(Table 7)

      $q = "INSERT INTO user_profile_hobbies_interests(user_profile_email6) VALUES('$email')";
      $result7 = mysqli_query($con, $q) or die('failed query 7' . mysqli_error($con));

      // check qurey successfuly run or not
      if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7) {
   ?>
         <div class="outer d-flex justify-content-center align-items-center ">
            <div class="inner">
               <img src="./tenor1.gif" alt="" srcset="" width="300px">
               <div class="conform">
                  <i class="fa-solid fa-check"></i><br>
                  <span>Registration Complate Successfully!</span>
               </div>
               <div class="d-flex justify-content-end px-3 pt-3">
                  <button type="button" class="btn  btn-outline-primary px-4">Next
                     <i class="fa-solid fa-arrow-right"></i>
                  </button>
               </div>
            </div>
         </div>
   <?php
      } else {
         echo '<script language="javaScript">
            alert("some issue of system please try again");
            window.location.href="profile_registration.php";
          </script>';
      }
   } else {
      echo "Registration is not successful!<br>";
      echo "Go to <a href='profile_registration.php'>click</a>";
   }

   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";

   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
   <script language='javascript'>
      $(document).ready(function(){
         $('.btn-outline-primary').on("click",function(){
            window.location.href="./dashboard.php";
         })
      })
   </script>
</body>

</html>



<!-- 
echo "First Name:".$fname."<br>";
 echo "Last Name:".$lname."<br>";
 echo "Gender:".$gender."<br>";
 echo "Religion:".$religion."<br>";
 echo "Gender:".$community."<br>";
 echo $email."<br>";
 echo $date_of_birth."<br>";
 echo $MobNo."<br>";
 echo $state."<br>";
 echo $city."<br>";
 echo $living_with_family."<br>";
 echo $family_address."<br>";
 echo $married_status."<br>";
 if(isset($_POST['any_child']) && isset($_POST['number_of_child']) ){
 echo $any_child."<br>";
 echo $number_of_child."<br>";
 }
 echo $your_diet."<br>";
 echo $your_height."<br>";
 echo $sub_community."<br>";
 echo $high_qualification."<br>";
 echo $collage_name."<br>";
 echo $work_sector."<br>";
 echo $profession."<br>";
 echo $income."<br>";
 echo $father_status."<br>";
 echo $married_status."<br>";
 echo $number_of_siblings."<br>";
 echo $family_type."<br>";
 echo $family_value."<br>";
 echo $family_affluence."<br>"; -->


<!-- [my_Select] => Your Name
['name'] => mohd faruk
['gender'] => Male
['religion'] => muslim
['community'] => Urdu
['email'] => mohdfaruk70170@gmail.com
['date_of_birth'] => 2001-02-08
['mobile_number'] => 7088273014
['state'] => Uttarakhand
['city'] => noida
['living_with_family'] => No
   ['family_address'] => sitarganj
['married_status'] => Divorced
   ['any_child'] => Yes, Living together
   ['number_of_child'] => OneChild
['your_diet'] => Non-veg
['your_height'] => 5.10 ft
['sub_community'] => Ansari
['high_qualification'] => B.E / B.Tech
['collage_name'] => RIMT
['work_sector'] => Private Company
['profession'] => web developer
['income'] => 1 to 2 lakh yearly
['father_status'] => Employed
['mother_status'] => Homemaker
['number_of_siblings'] => 4
['family_type'] => Nuclear
['family_value'] => Traditional
['family_affluence'] => Middle Class -->