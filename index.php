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
    <title>iDiscuss</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>
    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider-11.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider-2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider-3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts here  -->
    <div class="container my-3">
        <h2 class="text-center"> iDiscuss - Browse Categories</h2>
        <div class="row">
            <!-- Fetch all the categories  -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['category_id'];
                // echo $row['category_name'];
                // echo $row['category_description'];
            ?>
            <!-- use of for loop to iterate through categories -->
            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="img/card-<?php echo $row['category_id']; ?>.jpeg" class="card-img-top"
                        alt="<?php echo $row['category_name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="threadlist.php?catid=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a>
                        </h5>
                        <p class="card-text"><?php echo substr($row['category_description'], 0, 50) . "..."; ?></p>
                        <a href="threadlist.php?catid=<?php echo $row['category_id']; ?>" class="btn btn-primary">View
                            Threats</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
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