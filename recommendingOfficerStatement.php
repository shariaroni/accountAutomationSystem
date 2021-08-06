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
    <title>সুপারিশকারী কর্মকর্তার মতামত</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container text-center mt-5">
        <h4>সুপারিশকারী কর্মকর্তার মতামত</h4>
        <form action="" method="post">
        <table class="table table-striped table-bordered table-hover mt-3">
            <tr  class="table-dark">
                <th>ক্রমিক নং</th>
                <th>আবেদনকারীর নাম</th>
                <th>সুপারিশকারী কর্মকর্তা</th>
                <th>বাজেটের ধরণ</th>
                <th>সুপারিশ</th>
                <th>সংযুক্ত ছবি</th>
                <th>তারিখ</th>
                <th>মন্তব্য</th>
            </tr>
            <?php
                $db = mysqli_connect("localhost","root","","db_lr");
                $budget_id = mysqli_real_escape_string($db, $_GET['id']);
                $sql1 = "SELECT id,user_id,	recommending_officer_id,budgetSeleaction,recommend,image,date,comment FROM recommendingofficeropinion WHERE id='$budget_id'";
                $result = $db->query($sql1);
                if ($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                        $user_id = $row['user_id'];
                        $sql2 = "SELECT * FROM tabel_user WHERE id = $id LIMIT 1";
                        $res2 =  $db->query($sql2);
                        $row2 = $res2->fetch_assoc();
                        $userName = $row2['name'];
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$userName."</td>
                            <td>".$row["recommending_officer_id"]."</td>
                            <td>".$row["budgetSeleaction"]."</td>
                            <td>".$row["recommend"]."</td>
                            <td>".$row["image"]."</td>
                            <td>".$row["date"]."</td>
                            <td>".$row["comment"]."</td>
                        </tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }
                $db-> close();
                if (isset($_POST['back'])) {
                    header("Location: AccountsOfficerOpinion.php");
                }
            ?>
                <button name="back" class="btn btn-primary">Back</button>
        </table>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>