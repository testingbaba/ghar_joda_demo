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
    $img = $data_photo[1];
    $img = base64_encode($img);
} else {
    $img = "./tenor1.gif";
}
$email = substr($email, 0, 4) . "xxxxxxx" . substr($email, strlen($email) - 10);


// echo "<br><pre>";
// print_r($data);
// echo "<pre>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Ghar Joda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="../assets/css/dashboard.css">

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

    <div class="container d-flex justify-content-center">
        <div class="card mt-3" style="width: 20rem;">
            <img class="card-img-top" src='data:image/jpeg;base64,<?= $img ?>' alt="">
            <div class="card-body">
                <h5 class="card-title">Hey,<br><?= $email ?> !</h5>
                <p class="card-text">You are now user dashboard page. and your Adhar number <?= $aadhar_number ?></p>
                <div class="d-flex justify-content-end">
                    <a href="logout.php" class="btn btn-outline-warning btn-logout">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script language="javascript">
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

</body>

</html>