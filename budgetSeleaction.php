<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include 'user.php';
    include 'header.php';

    session::checksession();
    
    $conn = mysqli_connect('localhost', 'root', '', 'db_lr');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, name FROM tabel_user WHERE type = 'recommendingOfficer' and verification_status = 1 and admin_verification_status = 1";
    $recommendingOfficerArray =  $conn->query($sql);
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
        $budget_type = $_POST['budget_type'];
        $budgetType = $_POST['budgetType'];
        $comment = $_POST['comment'];
        $recommending_officer_id = $_POST['recommending'];

        $query = "INSERT INTO demand (budget_type,budgetType,comment, recommending_officer_id) VALUES ('$budget_type','$budgetType','$comment', '$recommending_officer_id')";
        $run = mysqli_query($db, $query);

        if ($run) {
            $_SESSION['status'] = "Data Inserted Successfully";
            header("Location: DescriptionOfDemand.php");
        }
        else{
            $_SESSION['status'] = "Data Not Inserted";
            header("Location: budgetSeleaction.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>বাজেটের বিভাগ</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container" style="max-width: 1000px;">
        <form action="budgetSeleaction.php" method="POST">
            <div style="margin-top: 55px;" class="row">
                <div class="col-6">
                        <h4 class="text-center">
                            বাজেটের বিভাগ বাছাই করুন
                        </h4>
                    <div style="max-width: 200px; margin: 0 auto">
                        <div class="form-check mt-3 d-block">
                            <input class="form-check-input" id="revenue" name="budget_type" type="radio" value="revenue">
                            <label class="form-check-label" for="revenue">রাজস্ব</label>
                        </div>
                        <div class="form-check mt-2 d-block">
                            <input class="form-check-input" id="development" name="budget_type" type="radio" value="development">
                            <label class="form-check-label" for="development">উন্নায়ন</label>
                        </div>
                        <div class="form-check mt-2 d-block">
                            <input class="form-check-input" id="others" name="budget_type" type="radio" value="others">
                            <label class="form-check-label" for="others">অন্যান্য</label>    
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="h4 text-center">
                        সুপারিশের আবেদন করুন
                    </div>
                    <div style="max-width: 400px; margin: 0 auto">
                        <select class="form-select mt-3" name="recommending">
                            <option class="dropdown-menu" value="recommending null">সুপারিশকারী কর্মকর্তা বাছাই করুন</option>
                            <?php
                                foreach($recommendingOfficerArray as $recommendingOfficer):
                                ?>  
                                    <option value = <?php echo $recommendingOfficer['id'] ?> >
                                        <?php echo $recommendingOfficer['name'] ?>
                                    </option>
                            <?php endforeach; ?>
                            <!--
                            <option value="office_head">অফিস/বিভাগীয় প্রধান</option>
                            <option value="Mr. A">Mr. A</option>
                            <option value="Mr. B">Mr. B</option>
                            <option value="Mr. C">Mr. C</option>
                            <option value="Mr. D">Mr. D</option>
                            -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <h4 class="text-center">
                        বাজেটের প্রকৃতি বাছাই করুন
                    </h4>
                    <div style="max-width: 200px; margin: 0 auto">
                        <div class="form-check mt-3 d-block">
                            <input class="form-check-input" id="work" name="budgetType" type="radio" value="work">
                            <label for="work">কাজ</label>
                        </div>
                        <div class="form-check mt-2 d-block">
                            <input class="form-check-input" id="service" name="budgetType" type="radio" value="service">
                            <label for="service">সেবা</label>
                        </div>
                        <div class="form-check mt-2 d-block">
                            <input class="form-check-input" id="buying" name="budgetType" type="radio" value="buyingProduct">
                            <label for="buying">মালামাল ক্রয়</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h4 class="text-center">
                        বাজেটের প্রয়োজনীয়তা বর্ননা করুন
                    </h4>
                    <div style="max-width: 400px; margin: 0 auto" class="form-group mt-3">
                        <textarea class="form-control" name="comment" cols="70" rows="4" placeholder="লিখুন..."></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center form-group m-5">
                <input class="btn btn-success" type="submit" name="submit" value="নিশ্চিত করুন">
            </div>
        </form>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="budgetSeleaction.php">1</a></li>
                <li class="page-item"><a class="page-link" href="descriptionOfDemand.php">2</a></li>
                <li class="page-item">
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