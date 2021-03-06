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
    <title>মতামত | উপাচার্য মহোদয়ের </title>
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
        if($data['type'] == 'vc'):
    ?>
    <div style="margin-top: 20px;" class="container text-center">
        <div class="row row-cols-1">
            <div class="col">
                <h4><strong>বাজেট বিবরণ</strong></h4>
                <?php
                    include 'budgetStatement.php';
                ?>
            </div>
        <div class="col">
            <h4><strong>পরিচালক (হিসাব) দপ্তরের মতামত</strong></h4>
            <?php
                include 'directorStatement.php';
            ?>
            </div>
            <div class="col">
                <h4><strong>ট্রেজারার মহোদয়ের মতামত</strong></h4>
                <?php
                    include 'treasureStatement.php';
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container text-center mt-5" style="max-width: 675px; margin: 0, auto">
        <h4><strong> উপাচার্য মহোদয়ের মতামত </strong></h4>
        <!-- VC Sir Statement Start -->
        <form action="" method="post">
            <table class="table table-striped table-bordered mt-3">
                <?php
                    $db = mysqli_connect("localhost","root","","db_lr");
                    $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                    $sql1 = "SELECT * FROM vcsiropinion WHERE budget_id='$budget_id'";
                    $result = $db->query($sql1);
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            $vcSir_id = $row['vcSir_id'];
                            $sql2 = "SELECT * FROM tabel_user WHERE id = $vcSir_id and type = 'vc' LIMIT 1";
                            $res2 =  $db->query($sql2);
                            $row2 = $res2->fetch_assoc();
                            //vcSirid to vcSir_name
                            $vcSir_name = $row2['name'];

                            $sql3 = "SELECT * FROM demand WHERE id='$budget_id'";
                            $result3 = $db->query($sql3);
                            $row3 = $result3-> fetch_assoc();

                            if($row['parmited'] == 'yes'){
                                $parmissionMSG = 'সুপারিশ করা হলো';
                            }
                            else{
                                $parmissionMSG = 'সুপারিশ করা হলো না';
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
                                <td class='text-start'>".$vcSir_name."</td>
                            </tr>
                            <tr>
                                <td class='text-end table-active'>মতামতের তারিখ</th>
                                <td class='text-start'>".$row["date"]."</td>
                            </tr>
                            <tr>
                                <td class='text-end table-active'>মন্তব্য</th>
                                <td class='text-start'>".$row["comment"]."</td>
                            </tr>
                            প্রস্তাবিত <b>$budgetType</b> এর জন্য  প্রশাসনিক ও আর্থিক অনুমোদনের- <b>".$parmissionMSG."</b>।";
                        }
                    }
                    else{
                        echo "0 result";
                    }
                ?>
            </table>
            <input class="btn btn-primary mb-5" type="button" value="Back" onclick="history.back(-1)" />
            </form>
            <!-- VC Sir Statement End -->
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>