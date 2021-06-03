<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/forum">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql = "SELECT * FROM `categories` LIMIT 5";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li><a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
}
echo '</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum/contact.php" tabindex="-1">Contact</a>
                </li>
            </ul>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="submit">Search</button>
    <p class="text-light mx-2 my-0"> Welcome <b> ' . $_SESSION['useremail'] . '</b></p>
</form>
<a type="button" class="btn btn-outline-danger mx-2" href="/forum/partials/_logout.php">Logout</a>';
} else {
    echo '<form class="d-flex" action = "search.php" method = "GET">
    <input class="form-control me-3" type="search" name = "search" id = "search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success me-2" type="submit">Search</button>
</form>
<br>
    
    <div class="mx-2">
                <button class="btn btn-outline-success me-2" data-bs-toggle="modal"
                    data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#signupModal">SignUp</button>

            </div>';
}

echo '
        </div>
    </div>
</nav>';
?>
<?php include "partials/_loginModal.php"; ?>
<?php include "partials/_signupModal.php"; ?>
<?php
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success</strong> You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif (isset($_GET['signupfailed']) && $_GET['signupfailed'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error</strong> Email Already exist or password did not match.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<?php
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success</strong> You were logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif (isset($_GET['loginpass']) && $_GET['loginpass'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error</strong> Password are Incorrect.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} elseif (isset($_GET['loginfailed']) && $_GET['loginfailed'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error</strong> Invalid Username and Password.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>