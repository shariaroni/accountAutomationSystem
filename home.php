<?php
    include 'header.php';
    include 'user.php';
?>
<?php
    $user = new user();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $userRegi = $user->userRegistration($_POST);
    }
?>
<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session::distroy(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>হোম পেইজ</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/code.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>
            <strong>Account Automation System</strong>
        </h1>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="https://just.edu.bd/"><img src="images/logo.png" alt="JUST logo" width="30" height="30" class="d-inline-block align-text-top">
                    যবিপ্রবি</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">হোম</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">অফিস সমূহ</a>
                            <ul class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/vc">Office Of The Vice Chancellor</a></li>
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/treasurer">Office Of The Treasurer</a></li>
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/registrar">Office Of The Registrar</a></li>
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/librarian">Office Of The Librarian</a></li>
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/proctor">Office Of The Proctor</a></li>
                                <li><a class="dropdown-item" href="https://just.edu.bd/offices/counselling">Office Of The Student Counseling And Guidance</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registrationform.php">নিবন্ধন</a>
                        </li>
                        
                        <?php
                            $id = session::get("id");
                            $userlogin = session::get("login");
                            if ($userlogin == true) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">ইনডেক্স</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=logout">লগ আউট</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">লগ ইন</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div style="width: 1285px; height: 250px" class="carousel-inner my-1">
                <div class="carousel-item active">
                    <img src="css/image1.png" class="d-block img-fluid" alt="images1">
                </div>
                <div class="carousel-item">
                    <img src="css/image2.png" class="d-block img-fluid" alt="images2">
                </div>
                <div class="carousel-item">
                    <img src="css/image3.png" class="d-block img-fluid" alt="images3">
                </div>
                <div class="carousel-item">
                    <img src="css/image4.png" class="d-block img-fluid" alt="images4">
                </div>
                <div class="carousel-item">
                    <img src="css/image5.png" class="d-block img-fluid" alt="images5">
                </div>
                <div class="carousel-item">
                    <img src="css/image6.png" class="d-block img-fluid" alt="images5">
                </div>
                <div class="carousel-item">
                    <img src="css/image7.png" class="d-block img-fluid" alt="images5">
                </div>
                <div class="carousel-item">
                    <img src="css/image8.png" class="d-block img-fluid" alt="images5">
                </div>
            </div>
        </div>
        <div class="text-center">
            <div style="margin: 0 auto" class="row">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="css/image/images1.jpg" class="card-img-top" alt="image1">
                        <div class="card-body">
                            <h5 class="card-title">বাজেট নং ১</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">বিবারণী দেখুন</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="css/image/images2.jpg" class="card-img-top" alt="image1">
                        <div class="card-body">
                            <h5 class="card-title">বাজেট নং ২</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">বিবারণী দেখুন</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="css/image/images3.jpg" class="card-img-top" alt="image1">
                        <div class="card-body">
                            <h5 class="card-title">বাজেট নং ৩</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">বিবারণী দেখুন</a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="css/image/images4.jpg" class="card-img-top" alt="image1">
                        <div class="card-body">
                            <h5 class="card-title">বাজেট নং ৪</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">বিবারণী দেখুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>