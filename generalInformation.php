<?php
    include 'user.php';
    include 'header.php';
    session::checksession();
?>
<?php
    $loginmgs = session::get("loginmgs");
    if (isset($loginmgs)) {
        echo $loginmgs;
    }
    session::set("loginmgs",NULL);
?>
<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session::distroy(); 
    }
?>
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['submit'])) {
        $recommending = $_POST['recommending'];
        $need = $_POST['need'];
        $value = $_POST['value'];

        $query = "INSERT INTO generalinformation (recommending, need, value) VALUES ('$recommending', '$need', '$value')";
        
        $run = mysqli_query($db, $query);
        if ($run) {
            $_SESSION['status'] = "Data Inserted Successfully";
            header("Location: recommendingOfficerOpinion.php");
        }
        else{
            $_SESSION['status'] = "Data Not Inserted";
            header("Location: generalInformation.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>বাজেট আবেদন সাধারণ তথ্য</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
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
                            <a class="nav-link" href="index.php">ইনডেক্স</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=logout">প্রস্থান</a>
                        </li>
                    <?php }
                        else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">প্রবেশ করুণ</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container text-center">
        <form action="generalInformation.php" method="post">
            <div style="margin-top: 50px;" class="h3 text-center">
                সুপারিশের আবেদন করুন
            </div>
            <div style="max-width: 400px; margin: 0 auto">
                <select class="form-select" name="recommending">
                    <option class="dropdown-menu" value="recommending null">সুপারিশকারী কর্মকর্তা বাছাই করুন</option>
                    <option value="office_head">অফিস/বিভাগীয় প্রধান</option>
                    <option value="Mr. A">Mr. A</option>
                    <option value="Mr. B">Mr. B</option>
                    <option value="Mr. C">Mr. C</option>
                    <option value="Mr. D">Mr. D</option>
                    <option value="Mr. E">Mr. E</option>
                </select>
            </div>
            <div class="h3 text-center mt-5">
                অগ্রীম টাকার প্রয়োজনীয়তা
            </div>
            <div style="max-width: 400px; margin: 0 auto">
                <div class="input-group input-group-sm">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" id="money_yes" name="need" type="radio" value="yes" aria-label="Radio button for following text input">
                        <label class="form-check-label m-1" for="money_yes">আছে</label>
                    </div>
                    <input name="value" type="text" class="form-control" aria-label="Text input with radio button" placeholder="পরিমাণ">
                    <div class="input-group-text mx-1">
                        <input class="form-check-input mt-0" id="money_no" name="need" type="radio" value="no" aria-label="Radio button for following text input">
                        <label class="form-check-label m-1" for="money_no">নেই</label>
                    </div>
                </div>
            </div>
            <input name="submit" class="btn btn-success m-3" type="submit" value="নিশ্চিত করুন">
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="descriptionOfDemand.php" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="budgetSeleaction.php">1</a></li>
                <li class="page-item"><a class="page-link" href="descriptionOfDemand.php">2</a></li>
                <li class="page-item active"><a class="page-link" href="generalInformation.php">3</a></li>
                <li class="page-item disabled">
                    <a class="page-link" href="descriptionOfDemand.php" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>