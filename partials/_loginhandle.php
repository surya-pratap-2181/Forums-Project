<?php
$showAlert = false;
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "_dbconnect.php";
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    if ($numrows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['sno'] = $row['user_sno'];
            //echo "logged in" . $email;
            // header("location: /forum/");
            header("Location: /forum/index.php?loginsuccess=true");
        } else {
            // header("location: /forum/index.php");
            header("Location: /forum/index.php?loginpass=true");
        }
    } else {
        // header("location: /forum/index.php");
        header("Location: /forum/index.php?loginfailed=true");
    }
}