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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নিবন্ধন</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>
        <strong>Account</strong> Automation System
    </h1>
    <nav class="navbar navbar-light navbar-expand-sm" style="background-color: #e3f2fd;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="https://just.edu.bd/"><img src="images/logo.png" alt="JUST logo" width="30" height="30" class="d-inline-block align-text-top">
                যবিপ্রবি</a>
            <ul class="navbar-nav">
                <?php
                    $id = session::get("id");
                    $userlogin = session::get("login");
                    if ($userlogin == true) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="home.php">হোম</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php?id=<?php echo $id; ?>">প্রোফাইল</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?action=logout">প্রস্থান</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="home.php">হোম</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">প্রবেশ</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>
    <h2 class="display-4 text-center my-4">নিবন্ধন করুন</h2>
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto">
        <?php
            if (isset($userRegi)) {
                echo $userRegi;
            }
        ?>
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="name">নাম</label>
                    <input name="name" id="name" class="form-control" type="text" placeholder="Name">
                </div>
                <div class="form-group mt-3">
                    <label for="email">ইমেইল</label>
                    <input name="email" id="email" class="form-control" type="email" placeholder="Example@gmail.com">
                </div>
                <div class="form-group mt-3">
                    <label for="mobile">মোবাইল নম্বর</label>
                    <input name="mobile" id="mobile" class="form-control" type="text" placeholder="01XXXXXXXXX">
                </div>
                <div class="form-group mt-3">
                    <label for="pass">পাসওয়ার্ড</label>
                    <input name="pass" id="pass" class="form-control" type="password" placeholder="*****">
                </div>
                <div class="form-group mt-3">
                    <a href="login.php">
                        <input name="submit" class="btn btn-primary mt-3" type="submit" value="নিশ্চিত করুন">
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>