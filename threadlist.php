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
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Threads</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>
    <?php
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Insert thread into db
        $th_title = $_POST['title'];
        $th_title = str_replace("<", "&lt", "$th_title");
        $th_title = str_replace(">", "&gt", "$th_title");
        $th_desc = $_POST['desc'];
        $th_desc = str_replace("<", "&lt", "$th_desc");
        $th_desc = str_replace(">", "&gt", "$th_desc");
        $sno = $_SESSION['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert = true) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Thread is added. Please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>


    <div class="container my-4 ">
        <div class="alert alert-secondary">
            <h1 class="display-4">Welcome to <?php echo $catname; ?></h1>
            <p class="lead"> <?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>
            <ul>
                <li> No Spam / Advertising / Self-promote in the forums. ...</li>
                <li> Do not post copyright-infringing material. ...</li>
                <li> Do not post “offensive” posts, links or images. ...</li>
                <li> Do not cross post questions. ...</li>
                <li> Do not PM users asking for help. ...</li>
                <li> Remain respectful of other members at all times.</li>

            </ul>
            </p>

        </div>
    </div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                <div id="emailHelp" class="form-text">Keep your title as short and creap as possible.</div>
            </div>
            <div class="form-group">
                <label for="floatingTextarea">Elaborate Your Concern</label>
                <textarea class="form-control my-2" id="desc" name="desc"></textarea>

            </div>

            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
    <?php } ?>

    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p>
        <h4><i> You need to login for starting a conversation... </i></h4>
        </p>
    </div>

    <div class="container my-3" id="#ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $threadtitle = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE user_sno = $thread_user_id ";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

        ?>
        <div class="media">
            <img src="img/userdefault.jpg" width="54px" class="mr-3" alt="Generic placeholder image">
            <div class="media-body">
                <p class="fw-bold"><?php echo $row2['user_email']; ?> at <?php echo "<i>" . $thread_time . "</i>"; ?>
                </p>
                <h5 class="mt-0"> <a href="thread.php?threadid=<?php echo $id; ?>" class="text-dark">
                        <?php echo $threadtitle; ?> </a>
                </h5>
                <?php echo $threaddesc; ?>
            </div>
        </div>
        <?php
        }
        // echo var_dump($noresult);
        if ($noresult) {
            echo '<div class="alert alert-info">
            <div class="container">
              <h1 class="display-6">No Threats Here</h1>
              <p class="lead">Be the first person to ask.</p>
            </div>
          </div>';
        }
        ?>






        <!-- <div class="media">
            <img src="img/userdefault.jpg" width="54px" class="mr-3" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div> -->

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