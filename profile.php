<?php
    include 'user.php';
    include 'header.php';
    session::checksession();
?>
<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session::distroy(); 
    }
?>
<?php
    $userid = session::get("id");
    $user = new user();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateUser = $user->updateUserData($userid, $_POST);
    }
?>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_lr');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = session::get("id");
    $sql = "SELECT type FROM tabel_user WHERE id = $id and verification_status = 1 and admin_verification_status = 1";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $current_type = $row['type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ব্যবহারকারীর তথ্য</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    
    <!-- Navbar Start -->
    <div class="container">
        <h1>
            <strong>Account</strong> Automation System
        </h1>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid container">
                <a class="navbar-brand" href="https://just.edu.bd/"><img src="images/logo.png" alt="JUST logo" width="30" height="30" class="d-inline-block align-text-top">
                        যবিপ্রবি</a>
                <ul class="navbar-nav mt-2">
                    <?php
                        $userlogin = session::get("login");
                        if ($userlogin == true) {
                            $aType = $current_type;
                            if($aType == "general"){
                                $link = "index.php";
                            }
                            if($aType == "recommendingOfficer"){
                                $link = "recommendingOfficerIndex.php";
                            }
                            if($aType == "accountOfficer"){
                                $link = "accountOfficerIndex.php";
                            }
                            if($aType == "deputyDirector"){
                                $link = "deputyDirectorIndex.php";
                            }
                            if($aType == "director"){
                                $link = "directorIndex.php";
                            }
                            if($aType == "treasure"){
                                $link = "treasureIndex.php";
                            }
                            if($aType == "vc"){
                                $link = "vcSirIndex.php";
                            }
                            if($aType == "admin"){
                                $link = "adminIndex.php";
                            }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $link?>">ইনডেক্স</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">লগ আউট</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">লগ ইন</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    
    <div class="text-center mt-5">
        <h2>ব্যবহারকারীর তথ্য</h2>
    </div>
    
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto">
        <?php
            if (isset($updateUser)) {
            echo $updateUser;
        }
        ?>
        <?php
            $userdata = $user->getuserbyid($userid);
            if ($userdata) {
        ?>
            <form action="profile.php" method="POST">
                <div class="form-group mt-3">
                    <label for="name">নাম</label>
                    <input name="name" id="name" class="form-control" value="<?php echo $userdata->name; ?>" type="text" placeholder="Name">
                </div>
                <div class="form-group mt-3">
                    <label for="email">ইমেইল</label>
                    <input name="email" id="email" class="form-control" value="<?php echo $userdata->email; ?>" type="email" placeholder="Example@gmail.com">
                </div>
                <div class="form-group mt-3">
                    <label for="mobile">মোবাইল</label>
                    <input name="mobile" id="mobile" class="form-control" value="<?php echo $userdata->mobile; ?>" type="text" placeholder="01XXXXXXXXX">
                </div>
                <div class="from-group mt-3">
                    <?php
                        $sesId = session::get("id");
                        if ($userid == $sesId) {
                    ?>
                        <input class="btn btn-success mt-3" type="submit" name="submit" value="আপডেট">
                    <?php } ?>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>