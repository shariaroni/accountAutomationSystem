<!-- Recommending Officer Statement Start -->
<div class="container text-center mt-4" style="max-width: 500px; margin: 0, auto">
    <h4>সুপারিশকারী কর্মকর্তার মতামত</h4>
    <form action="" method="post">
    <table class="table table-striped table-bordered mt-3">
        <?php
            $db = mysqli_connect("localhost","root","","db_lr");
            $budget_id = mysqli_real_escape_string($db, $_GET['id']);
            $sql1 = "SELECT id,user_id,budget_type,budgetType,recommending_officer_id,comment,total,need FROM demand WHERE id='$budget_id'";
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

                    //recomending_officer_opinion
                    $budget_id = $row['id'];
                    $sql4 = "SELECT * FROM recommendingofficeropinion WHERE budget_id = $budget_id";
                    $result4 = $db->query($sql4);
                    $row4 = $result4->fetch_assoc();
                    if($row4['recommend'] == "yes"){
                        $show3 = "সুপারিশ করা হলো";
                    }
                    if($row4['recommend'] == "no"){
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
                            <td class='text-end table-active'>সুপারিশকারী কর্মকর্তা</th>
                            <td class='text-start'>".$recommending_officer_name."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>সুপারিশ</th>
                            <td class='text-start'>".$show3."</td>
                        </tr>
                        
                        <tr>
                            <td class='text-end table-active'>তারিখ</th>
                            <td class='text-start'>".$row4["date"]."</td>
                        </tr>
                        <tr>
                            <td class='text-end table-active'>মন্তব্য</th>
                            <td class='text-start'>".$row4["comment"]."</td>
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
<!-- Recommending Officer Statement End -->