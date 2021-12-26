<!-- Director Statement Start -->
<div class="container text-center mt-5" style="max-width: 675px; margin: 0, auto">
    <form action="" method="post">
        <table class="table table-striped table-bordered mt-3">
            <?php
                $db = mysqli_connect("localhost","root","","db_lr");
                $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                $sql1 = "SELECT * FROM directoropinion WHERE budget_id='$budget_id'";
                $result = $db->query($sql1);
                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        $director_id = $row['director_id'];
                        $sql2 = "SELECT * FROM tabel_user WHERE id = $director_id and type = 'director' LIMIT 1";
                        $res2 =  $db->query($sql2);
                        $row2 = $res2->fetch_assoc();
                        //director_id to director_name
                        $director_name = $row2['name'];

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
                            <td class='text-start'>".$director_name."</td>
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
    </form>
</div>
<!-- Director Statement End -->