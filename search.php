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
    #sr {
        min-height: 100vh;
    }
    </style>
    <title>search</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"; ?>
    <?php include "partials/_header.php"; ?>
    <div class="container my-3" id="sr">
        <h1 class="text-center">Search Result for <em> "<?php echo $_GET['search']; ?>"</em></h1>
        <?php
        $query = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) AGAINST ('$query')";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread = $row['thread_id'];

        ?>
        <br>
        <div class="d-flex alert alert-primary position-relative my-2">
            <div>
                <ul>
                    <li>
                        <h5 class="mt-0 my-2"><a href="thread.php?threadid=<?php echo $thread; ?>"
                                class="text-dark"><?php echo $title; ?></a>
                        </h5>
                    </li>
                    <p><?php echo $desc; ?></p>
                </ul>

            </div>
        </div>
        <?php
            }
        } else {
            echo '<div class="alert alert-info">
            <div class="container">
              <h1 class="display-6">No Results Found</h1>
              <p class="lead">
              <ul>
              <li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords</li>
              </ul></p>
            </div>
          </div>';
        }
        ?>
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
    < src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></>
    < src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></>
    -->
</body>

</html>