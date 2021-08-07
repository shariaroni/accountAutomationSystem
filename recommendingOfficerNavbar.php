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