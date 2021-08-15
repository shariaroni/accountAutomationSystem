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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>মতামত | উপ-পরিচালকের (হিসাব দপ্তর)</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    
    <?php
        $db = mysqli_connect("localhost","root","","db_lr");
        $budget_id = mysqli_real_escape_string($db, $_GET['id']);
        $session_id = session::get("id");
        $sql = "SELECT type FROM tabel_user WHERE id=$session_id";
        $result = $db->query($sql);
        $data = $result->fetch_assoc();
        if($data['type'] == 'deputyDirector'):
    ?>
    <div style="margin-top: 20px;" class="container text-center">
       <h4>
           <a class="btn btn-warning mt-3" href="budgetStatement.php?id=<?php echo $budget_id;?>">বাজেট বিবারণী দেখুন</a>
           <a class="btn btn-warning mt-3" href="accountOfficerStatement.php?id=<?php echo $budget_id;?>">কর্মকর্তা (হিসাব) দপ্তরের মতামত দেখুন</a>
       </h4>
    </div>
    <?php endif; ?>

    <div class="container text-center mt-5" style="max-width: 675px; margin: 0, auto">
        <h4>উপ-পরিচালকের (হিসাব দপ্তর) মতামত</h4>
        <form action="" method="post">
        <table class="table table-striped table-bordered mt-3">
            <?php
                $db = mysqli_connect("localhost","root","","db_lr");
                $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                $sql1 = "SELECT * FROM deputydirectoropinion WHERE budget_id='$budget_id'";
                $result = $db->query($sql1);
                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        $deputyDirector_id = $row['deputydirector_id'];
                        $sql2 = "SELECT * FROM tabel_user WHERE id = $deputyDirector_id and type = 'deputyDirector' LIMIT 1";
                        $res2 =  $db->query($sql2);
                        $row2 = $res2->fetch_assoc();
                        //deputyDirector_id to deputyDirector_name
                        $deputyDirector_name = $row2['name'];

                        $sql3 = "SELECT * FROM demand WHERE id='$budget_id'";
                        $result3 = $db->query($sql3);
                        $row3 = $result3-> fetch_assoc();

                        if($row3['budget_type'] == "others"){
                            $budget_type = "অন্যান্য";
                        }
                        else if($row3['budget_type'] == "development"){
                            $budget_type = "উন্নায়ন";
                        }
                        else if($row3['budget_type'] == "revenue"){
                            $budget_type = "রাজস্ব";
                        }

                        if($row3['budgetType'] == "work"){
                            $budgetType = "কাজ";
                        }
                        else if($row3['budgetType'] == "service"){
                            $budgetType = "সেবা";
                        }
                        else if($row3['budgetType'] == "buyingProduct"){
                            $budgetType = "মালামাল ক্রয়";
                        }

                    echo "<tr>
                            <td class='text-end table-active'>কর্মকর্তার নাম</th>
                            <td class='text-start'>".$deputyDirector_name."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>মতামতের তারিখ</th>
                            <td class='text-start'>".$row["date"]."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>মন্তব্য</th>
                            <td class='text-start'>".$row["comment"]."</td>
                        </tr>
                        প্রস্তাবিত <b>$budgetType</b> এর জন্য <b>".$row['budgetYear']."</b> অর্থ বছরে <b>$budget_type</b>, বাজেট কোড নম্বর <b>".$row['budgetCode']."</b>, বাজেট খাত <b>".$row['budgetSector']."</b>, এ বরাদ্দ আছে (বাজেট রেজিস্টারে রেকর্ড করা হয়েছে, পৃষ্ঠা নং- <b>".$row['pageNo']."</b>)। <br>
            
                        প্রস্তাবিত $budgetType <b>".$row['type']."</b>
                        পদ্ধতিতে সম্পাদন করা যেতে পারে।";
                    }
                }
                else{
                    echo "0 result";
                }
            ?>
        </table>
        <input class="btn btn-primary mb-5" type="button" value="Back" onclick="history.back(-1)" />
        </form>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>