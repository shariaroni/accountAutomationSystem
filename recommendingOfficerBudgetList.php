<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect('localhost', 'root', '', 'db_lr');
	
	$limit = 8;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page < 1)
        $page = 1;
	$start = ($page - 1) * $limit;
    $id = session::get("id");

    $sql = "SELECT * FROM tabel_user WHERE id = '$id'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $email = $row['email'];

    $sql = "SELECT * FROM tabel_user WHERE email = '$email' AND type = 'recommendingOfficer'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $recommending_officer_id = $row['id'];
    echo $recommending_officer_id;

	$result = $conn->query("SELECT * FROM demand WHERE recommending_officer_id = '$recommending_officer_id' and stage = 1 LIMIT $start, $limit");
    $budgets = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM demand WHERE recommending_officer_id = '$recommending_officer_id' and stage = 1");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
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
    <title>সুপারিশের জন্য আবেদনকারীদের তালিকা</title>
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
                        $id = session::get("id");
                        $userlogin = session::get("login");
                        if ($userlogin == true) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recommendingOfficerIndex.php?id=<?php echo $id; ?>">ইনডেক্স</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>">প্রোফাইল</a>
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
    
    <div class="panel-heading">
            <h3 class="text-center mt-3">সুপারিশের জন্য আবেদনকারীদের তালিকা</h3>
    </div>
    <div class="container">
        <div style="margin: 0 auto">
            <form>
                <!-- Pagination Start -->
                <div class="row">
                    <div class="col-md-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                                <li class="page-item <?php if($Previous == 0):?> disabled <?php endif; ?>">
                                    <a class="page-link" href="recommendingOfficerBudgetList.php?page=<?= $Previous; ?>" aria-label="Previous">
                                        <span class = "page-link" aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i = 1; $i<= $pages; $i++) : ?>
                                        <li class="page-item <?php if($i == $page):?> active <?php endif; ?>">
                                            <a class="page-link" href="recommendingOfficerBudgetList.php?page=<?= $i; ?>"> 
                                                <span class = "page-link"> <?= $i; ?> </span>
                                            </a>
                                        </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($Next == $pages+1):?> disabled <?php endif; ?>">
                                    <a class="page-link" href="recommendingOfficerBudgetList.php?page=<?= $Next; ?>" aria-label="Next">
                                        <span class = "page-link" aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Pagination End -->

                <!-- Table Start -->
                <div style="height: 400px; overflow-y: auto;">
                    <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>ক্রমিক নং</th>
                                <th>আবেদনকারীর নাম</th>
                                <th>আবেদনের তারিখ</th>
                                <th>মতামত দিন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 0;
                                foreach($budgets as $budget) :  ?>
                                <tr>
                                    <td class="text-center"><?= $count = $count+1; ?></td>
                                    <?php
                                        $user_id = $budget['user_id'];
                                        $sql = "SELECT * FROM tabel_user WHERE id = $user_id LIMIT 1";
                                        $res =  $conn->query($sql);
                                        $row = $res->fetch_assoc();
                                        $userName = $row['name'];
                                    ?>
                                    <td class="text-center"><?= $userName; ?></td>
                                    <td class="text-center"><?= $budget['date']; ?></td>
                                    <td class="text-center">
                                        <a href = "recommendingOfficerOpinion.php?id=<?= $budget['id'];?>" 
                                        onclick="window.open('recommendingOfficerOpinion.php?id=<?= $budget['id'];?>')">
                                            <input class="btn btn-outline-success btn-sm" type="submit" value="মতামত" />
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Table End -->
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>