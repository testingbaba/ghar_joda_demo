<?php

include("auth_session.php");
// include("../database/conn_db.php");

// echo "<br><pre>";
// print_r($_FILES);
// echo "<pre>";


if (isset($_POST['send_data'])) {

    $email = $_SESSION['email'];
    $aadhar_number = $_POST['aadhar_number'];
    // ======= for aadhar image ==============
    $file_name1 = $_FILES['aadhar_img']['name'];
    $file_size1 = $_FILES['aadhar_img']['size'];
    $file_temp_path1 = $_FILES['aadhar_img']['tmp_name'];

    // ======= for profile image ==============
    $file_name2 = $_FILES['profile_img']['name'];
    $file_size2 = $_FILES['profile_img']['size'];
    $file_temp_path2 = $_FILES['profile_img']['tmp_name'];

    if (!empty($file_name1) && !empty($file_name2) && !empty($aadhar_number)) {

        define('DB_NAME', 'gharjoda_db');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'admin');
        define('DB_HOST', 'localhost');
        // $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        // $ext_arr = ["JPEG", "JPG", "PNG", "GIF"];

        if ($file_size1 <= 2097152 && $file_size2 <= 2097152) {
            $pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

            // ============ user_profile_address_verify table =====================
            $sql1 = "INSERT INTO user_profile_address_verify (user_profile_address_verify_aadhar_number , user_profile_address_verify_aadhar_img , user_profile_address_verify_email) VALUES (:aadhar_number, :aadhar_img, :email)";
            $stmt1 = $pdo->prepare($sql1);
            $address_verify_details = ['aadhar_number' => $aadhar_number, 'aadhar_img' => file_get_contents($file_temp_path1), 'email' => $email];
            $conform1 = $stmt1->execute($address_verify_details);


            // ============ user_profile_photo table =====================
            $sql2 = "INSERT INTO user_profile_photo (user_profile_photo_1 , user_profile_photo_email) VALUES (:profile_photo_1 , :photo_email)";
            $stmt2 = $pdo->prepare($sql2);
            $photo_details = ['profile_photo_1' => file_get_contents($file_temp_path2), 'photo_email' => $email];
            $conform2 = $stmt2->execute($photo_details);



        // // ======================= other methods =======================

        // if ($file_size1 <= 2097152 && $file_size2 <= 2097152) {

        //     $sql1 = "INSERT INTO user_profile_address_verify (user_profile_address_verify_aadhar_number , user_profile_address_verify_aadhar_img , user_profile_address_verify_email) VALUES ($aadhar_number, '" . file_get_contents($file_temp_path1) . "', '$email')";
        //     $conform1 = mysqli_query($con, $sql1) or die("failed query1 : " . mysqli_error($con));

        //     $sql2 = "INSERT INTO user_profile_photo (user_profile_photo_1 , user_profile_photo_email) VALUES ('" . file_get_contents($file_temp_path2) . "', $email)";
        //     $conform2 = mysqli_query($con, $sql2) or die("failed query2 : " . mysqli_error($con));


            if ($conform1 && $conform2) {
                echo '<script>
                        alert("Record Submited !")
                        window.location.href="./dashboard.php"
                    </script>';
            } else {
                echo '<script>
                        alert("Record Not Submited !")
                        window.location.href="./dashboard.php"
                    </script>';
            }
        } else {
            echo '<script>
                    alert("Choose files size is greater than 2.0MB")
                    window.location.href="./dashboard.php"
                </script>';
        }
    } else {
        echo '<script>
                alert("All field is required !")
                window.location.href="./dashboard.php"
            </script>';
    }
}
