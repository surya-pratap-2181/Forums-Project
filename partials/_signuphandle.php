<?php
$showAlert = false;
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['email'];
    $user_password = $_POST['signuppassword'];
    $cpassword = $_POST['signupcpassword'];
    // check if email already exist
    $existSQL = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSQL);
    $exist = mysqli_num_rows($result);
    if ($exist > 0) {
        $showError = "Email already exist";
    } else {
        if ($user_password == $cpassword) {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `user_time`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
            header("Location: /forum/index.php?signupsuccess=true");
            exit();
        } else {
            $showError = "Password Incorrect";
        }
    }
    header("Location: /forum/index.php?signupfailed=$showError");
}