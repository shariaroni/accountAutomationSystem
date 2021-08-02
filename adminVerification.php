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
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect('localhost', 'root', '', 'db_lr');
	
	$limit = 8;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM tabel_user WHERE admin_verification_status = 0 LIMIT $start, $limit");
	$users = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM tabel_user WHERE admin_verification_status = 0");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
 ?>

<?php
	$user = new user();
	if (isset($_POST['submit']) && !empty($_POST['check'])) {
        $userId = $_POST['check'];
        foreach($userId as $key => $id){
    		$user->updateAdminVerificationStatus($id);
        }?>
        <script>
            window.location.href = 'adminVerification.php';
        </script>
<?php } ?>
<?php
	$user = new user();
	if (isset($_POST['submit']) && !empty($_POST['delete'])) {
        $userId = $_POST['delete'];
        foreach($userId as $key => $id){
    		$user->updateAdminVerificationDelete($id);
        }?>
        <script>
            window.location.href = 'adminUserList.php';
        </script>
<?php } ?>

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
    <title>অননুমোদিত ব্যবহারকারী</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/descriptionOfDemand.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                        <a class="nav-link" href="adminIndex.php?id=<?php echo $id; ?>">ইনডেক্স</a>
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
            <h2 class="text-center mt-3">অননুমোদিত ব্যবহারকারী</h2>
    </div>
    <div class="container">
        <div style="margin: 0 auto">
            <form action="" method="POST">
                <!-- Pagination Start -->
                <div class="row">
                    <div class="col-md-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm">
                                <li class="page-item<?php if($Previous == 0):?> disabled <?php endif; ?>">
                                    <a class="page-link" href="adminVerification.php?page=<?= $Previous; ?>" aria-label="Previous">
                                        <span class = "page-link" aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i = 1; $i<= $pages; $i++) : ?>
                                    <li class="page-item <?php if($i == $page):?> active <?php endif; ?>">
                                        <a class="page-link" href="adminVerification.php?page=<?= $i; ?>"> 
                                            <span class = "page-link"> <?= $i; ?> </span>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($Next == $pages+1):?> disabled <?php endif; ?>">
                                    <a class="page-link" href="adminVerification.php?page=<?= $Next; ?>" aria-label="Next">
                                        <span class = "page-link" aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Pagination End -->

                <!-- Table Start -->
                <div>
                    <table id="" class="table table-striped table-bordered">
                        <thead class="table-success text-center">
                            <tr>
                                <th>নং</th>
                                <th>নাম</th>
                                <th>মোবাইল</th>
                                <th>ইমেইল</th>
                                <th>পদবী</th>
                                <th>অনুমোদন</th>
                                <th><i class="bi bi-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) :

                                if($user['type'] == "general"){
                                    $show = "আবেদনকারী";
                                }
                                if($user['type'] == "recommendingOfficer"){
                                    $show = "সুপারিশকারী কর্মকর্তা";
                                }
                                if($user['type'] == "accountOfficer"){
                                    $show = "কর্মকর্তা (হিসাব দপ্তর)";
                                }
                                if($user['type'] == "deputyDirector"){
                                    $show = "উপ পরিচালক (হিসাব দপ্তর)";
                                }
                                if($user['type'] == "director"){
                                    $show = "পরিচালক (হিসাব দপ্তর)";
                                }
                                if($user['type'] == "treasure"){
                                    $show = "ট্রেজারার";
                                }
                                if($user['type'] == "vc"){
                                    $show = "ভাইস-চ্যান্সেলর";
                                }
                                if($user['type'] == "admin"){
                                    $show = "এডমিন";
                                }
                            ?>
                                <tr>
                                    <td class="text-center"><?= $user['id']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td class="text-center"><?= $user['mobile']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td class="text-center"><?= $show; ?></td>
                                    <td class="text-center">
                                        <input class="form-check-input is-valid" type="checkbox" name='check[]' value="<?= $user['id']; ?>" />
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input is-invalid" type="checkbox" name='delete[]' value="<?= $user['id']; ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <p action="" style="text-align:right;">	
                        <input class="btn btn-success mt-3" type="submit" name="submit" value="আপডেট">
                    </p>
                </div>
                <!-- Table End -->
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>