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
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['submit'])) {
        $item = $_POST['item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $item_total = $_POST['item_total'];
        $total = $_POST['total'];
        $query = "INSERT INTO demand (item,qty,price,item_total,total) VALUES ('$item','$qty','$price','$item_total','$total')";
        
        $run = mysqli_query($db, $query);
        if ($run) {
            $_SESSION['status'] = "Data Inserted Successfully";
            header("Location: generalInformation.php");
        }
        else{
            $_SESSION['status'] = "Data Not Inserted Successfully!";
            header("Location: descriptionOfDemand.php");
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
        <title>চাহিদার বিবারণ</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/descriptionOfDemand.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="dist/jautocalc.js"></script>
        <script type="text/javascript">
        
            $(document).ready(function() {

                function autoCalcSetup() {
                    $('form[name=cart]').jAutoCalc('destroy');
                    $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                    $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
                }
                autoCalcSetup();


                $('i[name=remove]').click(function(e) {
                    e.preventDefault();

                    var form = $(this).parents('form')
                    $(this).parents('tr').remove();
                    autoCalcSetup();

                });

                $('i[name=add]').click(function(e) {
                    e.preventDefault();

                    var $table = $(this).parents('table');
                    var $top = $table.find('tr[name=line_items]').first();
                    var $new = $top.clone(true);

                    $new.jAutoCalc('destroy');
                    $new.insertBefore($top);
                    $new.find('input[type=text]').val('');
                    autoCalcSetup();

                });

            });

        </script>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="h4 text-center my-4">
            চাহিদার বিবারণী ছকঃ 
    </div>
        <div class="container">
            <form action="descriptionOfDemand.php" method="POST" name="cart">
                <table class="table table-striped table-bordered table-hover" name="cart">
                    <tr class="table-success text-center">
                        <th>কাজ/সেবা/মালামালের বিবারণ</th>
                        <th>পরিমাণ(একক)</th>
                        <th>একক মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</th>
                        <th>মোট মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</th>
                        <th></th>
                    </tr>
                    
                    <tr name="line_items">
                        
                        <td><input type="text" name="item" class="input form-control"></td>
                        <td><input type="number" name="qty" class="input form-control" value="1"></td>
                        <td><input type="text" name="price" class="input form-control" value="0.00"></td>
                        <td><input type="text" name="item_total" class="input form-control" value="" jAutoCalc="{qty} * {price}"></td>
                        <td><i name="remove" class="bi bi-x-circle-fill"></i></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td style="text-align: right">সর্বমোট প্রাক্কলিত মূল্য</td>
                        <td><input type="text" name="total" class="input form-control" value="" jAutoCalc="SUM({item_total})"></td>
                    </tr>
                    <tr>
                        <td class="text-end" colspan="99"><i name="add" class="bi bi-plus-circle"></i></td>
                    </tr>
                </table>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-success" name="submit" value="নিশ্চিত করুন">
                </div>
            </form>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="budgetSeleaction.php" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="budgetSeleaction.php">1</a></li>
                    <li class="page-item active"><a class="page-link" href="descriptionOfDemand.php">2</a></li>
                    <li class="page-item"><a class="page-link" href="generalInformation.php">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="generalInformation.php" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>
