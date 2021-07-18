<?php
    include 'header.php';
    include 'user.php';
    session::checklogin();
?>
<?php
    $user = new user();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $userLogin = $user->userLogin($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্রবেশ</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>
            <strong>Account</strong> Automation System
        </h1>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
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
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">Log Out</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrationform.php">নিবন্ধন</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <h2 class="display-3 text-center my-5">প্রবেশ করুণ</h2>
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto">
        <?php
            if (isset($userLogin)) {
                echo $userLogin;
            }
        ?>
            <form action="" method="POST">
                <div class="form-group mt-3">
                    <label for="email">ইমেইল</label>
                    <input name="email" id="email" class="form-control" type="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group mt-3">
                    <label for="pass">পাসওয়ার্ড</label>
                    <input name="pass" id="pass" class="form-control" type="password" placeholder="*****">
                </div>
                <div class="form-group mt-3">
                    <select class="form-select mt-3 mul-select" name="type">
                        <option class="dropdown-menu" value="type">Registration as a</option>
                        <option value="general">আবেদনকারী</option>
                        <option value="recommendingOfficer">সুপারিশকারী কর্মকর্তা</option>
                        <option value="accountOfficer">কর্মকর্তা (হিসাব দপ্তর)</option>
                        <option value="deputyDirector">উপ পরিচালক (হিসাব দপ্তর)</option>
                        <option value="director">পরিচালক (হিসাব দপ্তর)</option>
                        <option value="treasure">ট্রেজারার</option>
                        <option value="vc">ভাইস-চ্যান্সেলর</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input name="submit" class="btn btn-success mt-3" type="submit" value="লগ ইন">
                </div>
            </form>
        </div>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>