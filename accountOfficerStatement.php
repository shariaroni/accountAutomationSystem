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
    <title>কর্মকর্তা (হিসাব) দপ্তরের মতামত</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container text-center mt-5" style="max-width: 450px; margin: 0, auto">
        <h4>কর্মকর্তা (হিসাব) দপ্তরের মতামত</h4>
        <form action="" method="post">
        <table class="table table-striped table-bordered mt-3">
            <?php
                $db = mysqli_connect("localhost","root","","db_lr");
                $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                $sql1 = "SELECT id,user_id,	account_officer_id,budgetSeleaction,budgetYear,budgetType,budgetCode,budgetSector,pageNo,type,image,date,comment FROM accountsofficeropinion WHERE id='$budget_id'";
                $result = $db->query($sql1);
                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        $user_id = $row['user_id'];
                        $sql2 = "SELECT * FROM tabel_user WHERE id = $id LIMIT 1";
                        $res2 =  $db->query($sql2);
                        $row2 = $res2->fetch_assoc();
                        $userName = $row2['name'];
                        //recommending_officer_id to recommending_officer_name
                        $account_officer_id = $row['account_officer_id'];
                                $sql3 = "SELECT * FROM tabel_user WHERE id = $account_officer_id LIMIT 1";
                                $res3 = $db->query($sql3);
                                $row3 = $res3->fetch_assoc();
                                $account_officer_name = $row3['name'];

                        foreach($result as $aType):
                            if($aType['budgetSeleaction'] == "work"){
                                $show2 = "কাজ";
                            }
                            if($aType['budgetSeleaction'] == "service"){
                                $show2 = "সেবা";
                            }
                            if($aType['budgetSeleaction'] == "buyingProduct"){
                                $show2 = "মালামাল ক্রয়";
                            }
                            if($aType['recommend'] == "yes"){
                                $show3 = "সুপারিশ করা হলো";
                            }
                            if($aType['recommend'] == "no"){
                                $show3 = "সুপারিশ করা হলো না";
                            }
                    echo "<tr>
                            <td class='text-end table-active'>ক্রমিক নং</td>
                            <td class='text-start'>".$row["id"]."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>আবেদনকারীর নাম</td>
                            <td class='text-start'>".$userName."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>কর্মকর্তা (হিসাব) দপ্তর</th>
                            <td class='text-start'>".$account_officer_name."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>বাজেটের ধরণ</th>
                            <td class='text-start'>".$show2."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>সুপারিশ</th>
                            <td class='text-start'>".$show3."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>সংযুক্ত ছবি</th>
                            <td class='text-start'>".$row["image"]."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>তারিখ</th>
                            <td class='text-start'>".$row["date"]."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>মন্তব্য</th>
                            <td class='text-start'>".$row["comment"]."</td>
                        </tr>
                        প্রস্তাবিত $show2 এর জন্য 2021 - 2022 অর্থ বছরে উন্নয়ন বাজেট কোড নম্বর 
                    , বাজেট খাত 
                    , এ বরাদ্দ আছে (বাজেট রেজিস্টারে রেকর্ড করা হয়েছে, পৃষ্ঠা নং - 
                    )।
            
                    প্রস্তাবিত কাজ 
                    পদ্ধতিতে ক্রয় করা যেতে পারে।";
                        endforeach;
                    }
                }
                else{
                    echo "0 result";
                }
            ?>
        </table>
        <input class="btn btn-primary" type="button" value="Back" onclick="history.back(-1)" />
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>