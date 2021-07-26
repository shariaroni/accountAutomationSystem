<?php
    include 'header.php';
    include 'user.php';
?>

<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect('localhost', 'root', '', 'db_lr');
	
	$limit = 25;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM tabel_user WHERE admin_verification_status = 0 LIMIT $start, $limit");
	$users = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $conn->query("SELECT count(id) AS id FROM tabel_user");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	if($Previous < 1)
		$Previous = 1;
	$Next = $page + 1;
	if($Next > $pages)
		$Next = $pages;
 ?>

<?php
	$user = new user();
	if (isset($_POST['submit']) && !empty($_POST['check'])) {
        $userId = $_POST['check'];
        foreach($userId as $key => $id){
    		$user->updateAdminVerificationStatus($id);
        }
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
    <h2 class="display-4 text-center my-4">Admin Approval</h2>
    <div class="container">
        <div style="margin: 0 auto">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-10">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a href="adminVerification.php?page=<?= $Previous; ?>" aria-label="Previous">
                                        <span class = "page-link"> Previous </span>
                                    </a>
                                </li>
                                <?php for($i = 1; $i<= $pages; $i++) : ?>
                                    <li class="page-item">
                                        <a href="adminVerification.php?page=<?= $i; ?>"> 
                                            <span class = "page-link"> <?= $i; ?> </span>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item disabled">
                                    <a href="adminVerification.php?page=<?= $Previous; ?>" aria-label="Previous">
                                        <span class = "page-link"> Next </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div style="height: 600px; overflow-y: auto;">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) :  ?>
                                <tr>
                                    <td><?= $user['id']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['mobile']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['type']; ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" name='check[]' value="<?= $user['id']; ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <p action="" style="text-align:right;">	
                        <input class="btn btn-success mt-3" type="submit" name="submit" value="আপডেট">
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>

<!-- Oni Bro Starts haha
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
<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session::distroy(); 
    }
?>
<body>
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
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>">প্রোফাইল</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">প্রস্থান</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center mt-3"><span class="pull-right"><strong>
            <?php
                $name = session::get("name");
                if (isset($name)) {
                    echo $name;
                }
            ?></strong>
            </span><br>
            ব্যবহারকারীদের তালিকা</h2>
        </div>
        
        <div style="max-width: 1000px; margin: 0 auto">
            <div class="panel-body container">
                <table class="table table-striped mt-3">
                    <tr>
                        <th width="20%">নং</th>
                        <th width="20%">নাম</th>
                        <th width="20%">পদবী</th>
                        <th width="20%">মোবাইল</th>
                        <th width="20%">ইমেইল</th>
                        <th width="20%">তথ্য</th>
                    </tr>
                    <?php
                        $user = new user();
                        $userdata = $user->getuserdata();
                        if ($userdata) {
                            $i = 0;
                            foreach($userdata as $data){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['type']; ?></td>
                        <td><?php echo $data['mobile']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><a class="btn btn-primary" href="profile.php?id=<?php echo $data['id']; ?>">View</a></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr>
                        <td colspan="5">
                            <h2> No User Data Found</h2>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html> 
Oni Bro ends -->