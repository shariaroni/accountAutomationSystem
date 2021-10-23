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
    <title>বাজেট বিবারণী</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    
    <div class="text-center container">
        <div class="container text-center mt-5" style="max-width: 525px; margin: 0, auto">
            <h4> <strong> চাহিদা বিবারণী তথ্য</strong> </h4>
            <form action="" method="post">
                <table class="table table-striped table-bordered mt-3">
                    <?php
                    $db = mysqli_connect("localhost","root","","db_lr");
                    $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                    $sql1 = "SELECT * FROM demand WHERE id='$budget_id' LIMIT 1";
                    $result = $db->query($sql1);
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            $user_id = $row['user_id'];
                            $sql2 = "SELECT * FROM tabel_user WHERE id = $user_id LIMIT 1";
                            $res2 =  $db->query($sql2);
                            $row2 = $res2->fetch_assoc();
                            $userName = $row2['name'];
                            //recommending_officer_id to recommending_officer_name
                            $recommending_officer_id = $row['recommending_officer_id'];
                            $sql3 = "SELECT * FROM tabel_user WHERE id = $recommending_officer_id LIMIT 1";
                            $res3 = $db->query($sql3);
                            $row3 = $res3->fetch_assoc();
                            $recommending_officer_name = $row3['name'];

                            if($row['budget_type'] == "others"){
                                $show1 = "অন্যান্য";
                            }
                            else if($row['budget_type'] == "development"){
                                $show1 = "উন্নায়ন";
                            }
                            else if($row['budget_type'] == "revenue"){
                                $show1 = "রাজস্ব";
                            }

                            if($row['budgetType'] == "work"){
                                $show2 = "কাজ";
                            }
                            else if($row['budgetType'] == "service"){
                                $show2 = "সেবা";
                            }
                            else if($row['budgetType'] == "buyingProduct"){
                                $show2 = "মালামাল ক্রয়";
                            }

                            if($row['need'] == "yes"){
                                $show3 = "আছে";
                            }
                            else if($row['need'] == "no"){
                                $show3 = "নেই";
                            }

                            if($row['status'] == 'accepted')
                            {
                                $status = '<font class="text-success"> অনুমদিত </font>';
                            }
                            else if($row['status'] == 'rejected')
                            {
                                $status = '<font class="text-danger"> বাতিল </font>';
                            }
                            else
                            {
                                $status = '<font class="text-info"> প্রক্রিয়াধীন </font>';
                            }
        

                            $stage = array("", "", "সুপারিশকারী কর্মকর্তা", "কর্মকর্তা (হিসাব দপ্তর)", "উপ পরিচালক (হিসাব দপ্তর)", "পরিচালক (হিসাব দপ্তর)", "ট্রেজারার মহোদয়", "উপাচার্য মহোদয়");

                            echo "<tr>
                                    <td class='text-end table-active'>আবেদনকারীর নাম</td>
                                    <td class='text-start'>".$userName."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>বাজেটের বিভাগ</td>
                                    <td class='text-start'>".$show1."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>বাজেটের প্রকৃতি</td>
                                    <td class='text-start'>".$show2."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>সুপারিশকারী কর্মকর্তা</td>
                                    <td class='text-start'>".$recommending_officer_name."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>বাজেটের প্রয়োজনীয়তা বর্ননা</td>
                                    <td class='text-start'>".$row["comment"]."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>মোট টাকার পরিমাণ</td>
                                    <td class='text-start'>".$row["total"]."</td>
                                </tr>
                                <tr>
                                    <td class='text-end table-active'>অগ্রীম টাকার প্রয়োজনীয়তা</td>
                                    <td class='text-start'>".$show3."</td>
                                </tr>";
                            if($row['need'] == "yes")
                            {
                                echo "<tr>
                                        <td class='text-end table-active'>অগ্রীম টাকার পরিমান</td>
                                        <td class='text-start'>".$row['advanceAmount']."</td>
                                    </tr>";
                            }
                            if($row['status'] != "accepted")
                            {
                                if($row['status'] == "rejected")
                                {
                                    echo "<tr>
                                        <td class='text-end table-active'> সর্বশেষ অবস্থান</td>
                                        <td class='text-start'>".$stage[ (int)$row['stage'] ]."</td>
                                    </tr>";
                                }
                                else
                                {
                                    echo "<tr>
                                        <td class='text-end table-active'> বর্তমান অবস্থান</td>
                                        <td class='text-start'>".$stage[ (int)$row['stage'] ]."</td>
                                    </tr>";
                                }
                            }
                            echo "<tr>
                                    <td class='text-end table-active'> অবস্থা</td>
                                    <td class='text-start'>". $status ."</td>
                                </tr>";
                        }
                    }
                    else{
                        echo "0 result";
                    }
                    ?>
                </table>
            </form>
        </div>
    
        <div class="h4 text-center mt-5 mb-3">
            <strong> চাহিদার বিবারণী ছক </strong> 
        </div>
        <table class="table table-striped table-bordered table-hover" name="cart">
            <tr class="table-success text-center">
                <th>কাজ/সেবা/মালামালের বিবারণ</th>
                <th>পরিমাণ(একক)</th>
                <th>একক মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</th>
                <th>মোট মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</th>
                <th></th>
            </tr>
            <?php
                    $sql4 = "SELECT * FROM demand WHERE id='$budget_id'";
                    $result4 = $db->query($sql4);
                    foreach($result4 as $aData):
                        $item = $aData['item'];
                        $qty = $aData['qty'];
                        $price = $aData['price'];
                        $item_total = $aData['item_total'];
            ?>
            <tr>
                <td><input type="text" class="input form-control" value="<?php echo $item;?>" readonly></td>
                <td><input type="number" class="input form-control" value="<?php echo $qty;?>" readonly></td>
                <td><input type="text" class="input form-control" value="<?php echo $price;?>" readonly></td>
                <td><input type="text" class="input form-control" value="<?php echo $item_total;?>" readonly></td>
            </tr>
                    <?php endforeach;
                    $sql5 = "SELECT * FROM demand WHERE id='$budget_id'";
                    $result5 = $db->query($sql5);
                    $row5 = $result5-> fetch_assoc();
                    $total = $row5["total"];
                    ?>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td style="text-align: right"> সর্বমোট প্রাক্কলিত মূল্য </td>
                <td><input type="text" class="input form-control" value="<?php echo $total;?>" readonly></td>
            </tr>
        </table>
        <input class="btn btn-primary mb-5" type="button" value="Back" onclick="history.back(-1)" />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>