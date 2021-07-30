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
        <h4>ট্রেজারার মহোদয়ের মতামত</h4>
        <form action="" method="post">
        <table class="table table-striped table-bordered table-hover mt-3">
            <tr  class="table-dark">
                <th>ক্রমিক নং</th>
                <th>সুপারিশ</th>
                <th>সংযুক্ত ছবি</th>
                <th>তারিখ</th>
                <th>মন্তব্য</th>
            </tr>
            <?php
                        $db = mysqli_connect("localhost","root","","db_lr");
                        $sql1 = "SELECT id,parmited,image,day,month,year,comment FROM treasureopinion";
                        //$sql2 = "SELECT budget_type FROM budgetseleaction";
                        //$sql3 = "SELECT comment,budgetType FROM budgettype";
                        //$sql = "SELECT  FROM";
                        $result = $db->query($sql1);
                        if ($result-> num_rows > 0) {
                            while ($row = $result-> fetch_assoc()) {
                                echo "<tr><td>".$row["id"]."</td><td>".$row["parmited"]."</td><td>".$row["image"]."</td><td>".$row["day"].".".$row["month"].".".$row["year"]."</td><td>".$row["comment"]."</td></tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "0 result";
                        }
                        $db-> close();
                        if (isset($_POST['back'])) {
                            header("Location: vcSirOpinion.php");
                        }
                    ?>
                    <button name="back" class="btn btn-primary">Back</button>
        </table>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>   
</body>
</html>