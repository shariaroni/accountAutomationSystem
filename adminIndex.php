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