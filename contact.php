<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    #main {
        min-height: 100vh;
    }
    </style>
    <title>iDiscuss-contact</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>
    <div class="container" id="main">
        <h2 class="text-center my-3">Contact Us!</h2>
        <?php
        $showAlert = false;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['name'];
            $user_email = $_POST['email'];
            $user_contact = $_POST['contact'];
            $user_comment = $_POST['comment'];
            $sql = "INSERT INTO `contacts` (`contact_name`, `contact_email`, `contact_number`, `contact_message`) VALUES ('$user_name', '$user_email', '$user_contact', '$user_comment')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        }
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Response has been added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" required placeholder="Enter Your Name" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your Email</label>
                <input type="email" required placeholder="Enter Your Valid Email" class="form-control" id="email"
                    name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" required placeholder="Enter Your Valid Contact Number" class="form-control"
                    id="contact" name="contact">
            </div>
            <div class="mb-3">
                <label for="comment" class="mb-2">Comments</label>
                <textarea class="form-control" required placeholder="Your Message" id="comment"
                    name="comment"></textarea>

            </div>

            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>




    </div>


    <?php include "partials/_footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script> -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>