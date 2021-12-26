<!-- Treasure Statement Start -->
<div class="container text-center mt-5" style="max-width: 675px; margin: 0, auto">
    <form action="" method="post">
        <table class="table table-striped table-bordered mt-3">
            <?php
                $db = mysqli_connect("localhost","root","","db_lr");
                $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                $sql1 = "SELECT * FROM treasureopinion WHERE budget_id='$budget_id'";
                $result = $db->query($sql1);
                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        $treasure_id = $row['treasurer_id'];
                        $sql2 = "SELECT * FROM tabel_user WHERE id = $treasure_id and type = 'treasure' LIMIT 1";
                        $res2 =  $db->query($sql2);
                        $row2 = $res2->fetch_assoc();
                        //treasure_id to treasure_name
                        $treasure_name = $row2['name'];

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
                            <td class='text-start'>".$treasure_name."</td>
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
    </form>
</div>
<!-- Treasure Statement End -->