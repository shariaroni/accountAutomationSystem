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

        $query = "INSERT INTO generalinformation (recommending) VALUES ('$recommending')";
        
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
    <?php
        include 'navbar.php';
    ?>
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