<?php
    $db = mysqli_connect("localhost","root","","db_lr");
    $user_id = session::get("id");
    $sql = "SELECT * FROM tabel_user WHERE id='$user_id'";
    $result = $db->query($sql);
    $row = $result-> fetch_assoc();
    if($row['type'] == "general"){
        $pageLink = "index.php";
    }
    if($row['type'] == "recommendingOfficer"){
        $pageLink = "recommendingOfficerIndex.php";
    }
    else if($row['type'] == "accountOfficer"){
        $pageLink = "accountOfficerIndex.php";
    }
    else if($row['type'] == "deputyDirector"){
        $pageLink = "deputyDirectorIndex.php";
    }
    else if($row['type'] == "director"){
        $pageLink = "directorIndex.php";
    }
    else if($row['type'] == "treasure"){
        $pageLink = "treasureIndex.php";
    }
    else if($row['type'] == "vc"){
        $pageLink = "vcSirIndex.php";
    }
    else if($row['type'] == "admin"){
        $pageLink = "adminIndex.php";
    }
    $pageName = basename($_SERVER['PHP_SELF']);
    $pageName = strtolower($pageName);
    $match = "index";
    $isIndexPage = false;
    for($i=0; $i<strlen($pageName); $i++)
    {
        $flag = true;
        for($j=0; $j<strlen($match); $j++)
        {
            if($pageName[$i] != $match[$j])
            {
                $flag = false;
                break;
            }
            else
            {
                $i++;
            }
        }
        if($flag == true)
        {
            $isIndexPage = true;
            break;
        }
    }
?>

<div class="container">
    <h1>
        <strong>Account Automation System</strong>
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
                <?php if($isIndexPage == false):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $pageLink;?>">ইনডেক্স</a>
                </li>
                <?php endif; ?>
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