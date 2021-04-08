<?php
    include 'user.php';
    include 'header.php';
    session::checksession();
?>
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['submit'])) {
        $parmited = $_POST['parmited'];
        $image = $_FILES['image']['name'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $comment = $_POST['comment'];

        $target = "uploads/".basename($_FILES['image']['name']);

        $query = "INSERT INTO vcsiropinion (parmited,image,day,month,year,comment) VALUES ('$parmited','$image','$day','$month','$year','$comment')";
        
        $run = mysqli_query($db, $query);
        if ($run) {
            $_SESSION['status'] = "Data Inserted";
            header("Location: vcSirStatement.php");
        }
        else{
            $_SESSION['status'] = "Data Not Inserted";
            header("Location: vcSirOpinion.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ভাইস-চ্যান্সেলর মহোদয়ের মতামত</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>
            <strong>Account</strong> Automation System
        </h1>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
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
                        <a class="nav-link disabled" href="profile.php?id=<?php echo $id; ?>">প্রোফাইল</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="?action=logout">প্রস্থান</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registrationform.php">নিবন্ধন করুন</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
   <div style="margin-top: 20px;" class="container text-center">
       <h3>
           ভাইস-চ্যান্সেলর মহোদয়ের মতামত প্রদান
       </h3>
       <h4>
           <a class="btn btn-warning mt-3" href="budgetStatement.php">বাজেট বিবরণ দেখুন</a>
           <a class="btn btn-warning mt-3" href="directorStatement.php">পরিচালক (হিসাব) দপ্তরের মতামত দেখুন</a>
           <a class="btn btn-warning mt-3" href="treasureStatement.php">ট্রেজারার মহোদয়ের মতামত দেখুন</a>
       </h4>
       <p class="h5 text-center my-5">
           প্রস্তাবিত কাজ/ সেবা/ মালামাল ক্রয়ের জন্য প্রশাসনিক ও আর্থিক অনুমোদন - </p>
   <div class="seleaction">
       <form action="vcSirOpinion.php" method="POST">
            <div class="text-center my-4">
                <div class="btn btn-outline-success">
                    <input class="form-check-input" id="yes" type="radio" name="parmited" value="yes">
                    <label for="yes">দেওয়া হলো</label>
                </div>
                <div class="btn btn-outline-danger">
                    <input class="form-check-input" id="no" type="radio" name="parmited" value="no">
                    <label for="no">দেওয়া হলো না</label>
                </div>
            </div>
            <div style="max-width: 500px; float:left" class="mt-5 form-control">
            <label for="signature">ভাইস-চ্যান্সেলর মহোদয়ের স্বাক্ষর ও তারিখ</label>
            <input name="image" class="form-control mt-2" type="file" id="signature">
            <div class="mt-2">
                <select name="day">
                    <option class="dropdown-menu" value="day">Day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
                <select name="month">
                    <option class="dropdown-menu" value="month">Month</option>
                    <option value="jan">Jan</option>
                    <option value="feb">Feb</option>
                    <option value="mar">Mar</option>
                    <option value="apr">Apr</option>
                    <option value="may">May</option>
                    <option value="jun">Jun</option>
                    <option value="jul">Jul</option>
                    <option value="aug">Aug</option>
                    <option value="sep">Sep</option>
                    <option value="oct">Oct</option>
                    <option value="nov">Nov</option>
                    <option value="dec">Dec</option>
                </select>
                <select name="year">
                    <option class="dropdown-menu" value="year">Year</option>
                    <option  value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>
            </div>
        </div>
        <div style="max-width: 400px; margin-left: 800px" class="mt-5 form-control">
                মন্তব্য<br>
                <textarea class="form-control" name="comment" cols="60" rows="3" placeholder="লিখুন..."></textarea>
        </div>
        <div class="text-center mt-5">
            <input class="btn btn-success" name="submit" type="submit" value="নিশ্চিত করুন">
        </div>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>