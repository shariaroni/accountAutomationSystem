<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include 'user.php';
    include 'header.php';
    session::checksession();
?>

<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_lr');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, name FROM tabel_user WHERE type = 'recommendingOfficer' and verification_status = 1 and admin_verification_status = 1";
    $recommendingOfficerArray =  $conn->query($sql);
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
        $budget_type = $_POST['budget_type'];
        $budgetType = $_POST['budgetType'];
        $comment = $_POST['comment'];
        $user_id = session::get("id");
        $recommending_officer_id = $_POST['recommending'];
        $item = $_POST['item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $item_total = $_POST['item_total'];
        $total = $_POST['total'];
        $need = $_POST['need'];
        $advanceAmount = $_POST['advanceAmount'];
        $date = date("d-m-Y");
        $stage = 1;

        if($total < $advanceAmount && $need == "yes")
        {
            $msg =  "<div class='alert alert-danger'><strong>অগ্রীম চাহিদা মোট চাহিদার তুলনায় বেশি</strong></div>";
        }
        else
        {
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদনটি সম্পন্ন হয়েছে</strong></div>";
            
            $query = "INSERT INTO demand (budget_type, budgetType, comment, user_id, recommending_officer_id, item, qty, price, item_total, total, need, advanceAmount, date, stage) VALUES ('$budget_type', '$budgetType', '$comment', $user_id, $recommending_officer_id, '$item', '$qty', '$price', '$item_total', '$total', '$need', '$advanceAmount', '$date', $stage)";
        
            $run = mysqli_query($db, $query);
            
            // if ($run) {
            //     $_SESSION['status'] = "Data Inserted Successfully";
            //     header("Location: descriptionOfDemand.php");
            // }
            // else{
            //     $_SESSION['status'] = "Data Not Inserted Successfully!";
            //     header("Location: descriptionOfDemand.php");
            // }
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

    <!-- Navbar Start -->
    <div class="container">
        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>
        <h1>
            <strong>Account</strong> Automation System
        </h1>
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid container">
                <a class="navbar-brand" href="https://just.edu.bd/"><img src="images/logo.png" alt="JUST logo" width="30" height="30" class="d-inline-block align-text-top">
                        যবিপ্রবি</a>
                <ul class="navbar-nav mt-2">
                    <?php
                        $id = session::get("id");
                        $userlogin = session::get("login");
                        if ($userlogin == true) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=<?php echo $id; ?>">ইনডেক্স</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>">প্রোফাইল</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">লগ আউট</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">হোম</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">লগ ইন</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    
        <div class="container">
            <form action="descriptionOfDemand.php" method="POST" name="cart">
                <div class="container" style="max-width: 1000px;">
                    <div style="margin-top: 20px;" class="row">
                        <div class="col-6">
                                <h4 class="text-center">
                                    <strong> বাজেটের বিভাগ বাছাই করুন</strong> 
                                </h4>
                            <div style="max-width: 200px; margin: 0 auto">
                                <div class="form-check mt-3 d-block">
                                    <input class="form-check-input" id="revenue" name="budget_type" type="radio" value="revenue">
                                    <label class="form-check-label" for="revenue">রাজস্ব</label>
                                </div>
                                <div class="form-check mt-2 d-block">
                                    <input class="form-check-input" id="development" name="budget_type" type="radio" value="development">
                                    <label class="form-check-label" for="development">উন্নায়ন</label>
                                </div>
                                <div class="form-check mt-2 d-block">
                                    <input class="form-check-input" id="others" name="budget_type" type="radio" value="others">
                                    <label class="form-check-label" for="others">অন্যান্য</label>    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h4 text-center">
                                <strong> সুপারিশের আবেদন করুন </strong> 
                            </div>
                            <div style="max-width: 400px; margin: 0 auto">
                                <select class="form-select mt-3" name="recommending">
                                    <option class="dropdown-menu" value="recommending null">সুপারিশকারী কর্মকর্তা বাছাই করুন</option>
                                    <?php
                                        foreach($recommendingOfficerArray as $recommendingOfficer):
                                        ?>  
                                            <option value = <?php echo $recommendingOfficer['id'] ?> >
                                                <?php echo $recommendingOfficer['name'] ?>
                                            </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h4 class="text-center">
                                <strong> বাজেটের প্রকৃতি বাছাই করুন </strong> 
                            </h4>
                            <div style="max-width: 200px; margin: 0 auto">
                                <div class="form-check mt-3 d-block">
                                    <input class="form-check-input" id="work" name="budgetType" type="radio" value="work">
                                    <label for="work">কাজ</label>
                                </div>
                                <div class="form-check mt-2 d-block">
                                    <input class="form-check-input" id="service" name="budgetType" type="radio" value="service">
                                    <label for="service">সেবা</label>
                                </div>
                                <div class="form-check mt-2 d-block">
                                    <input class="form-check-input" id="buying" name="budgetType" type="radio" value="buyingProduct">
                                    <label for="buying">মালামাল ক্রয়</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h4 class="text-center">
                                <strong> বাজেটের প্রয়োজনীয়তা বর্ননা করুন </strong> 
                            </h4>
                            <div style="max-width: 400px; margin: 0 auto" class="form-group mt-3">
                                <textarea class="form-control" name="comment" cols="70" rows="4" placeholder="লিখুন..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h4 text-center mt-4 mb-3">
                    <strong> চাহিদার বিবারণী ছকঃ </strong> 
                </div>
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
                        <td style="text-align: right"> সর্বমোট প্রাক্কলিত মূল্য </td>
                        <td><input type="text" name="total" class="input form-control" value="" jAutoCalc="SUM({item_total})"></td>
                    </tr>
                    <tr>
                        <td class="text-start" colspan="99"><i name="add" class="bi bi-plus-circle"></i></td>
                    </tr>
                </table>

                <div class="h4 text-center mt-5">
                    <strong> অগ্রীম টাকার প্রয়োজনীয়তা </strong> 
                </div>
                <div style="max-width: 400px; margin: 0 auto">
                    <div class="input-group input-group-sm">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" id="money_yes" name="need" type="radio" value="yes" aria-label="Radio button for following text input">
                            <label class="form-check-label m-1" for="money_yes">আছে</label>
                        </div>
                        <input name="advanceAmount" type="text" class="form-control" aria-label="Text input with radio button" placeholder="পরিমাণ">
                        <div class="input-group-text mx-1">
                            <input class="form-check-input mt-0" id="money_no" name="need" type="radio" value="no" aria-label="Radio button for following text input">
                            <label class="form-check-label m-1" for="money_no">নেই</label>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 mb-5">
                    <input type="submit" class="btn btn-primary" name="submit" value="নিশ্চিত করুন">

                    <!-- Modal 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">নিশ্চিত করুন</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">বাজেট বিবারণী</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi cumque dolorum, ipsam fugiat nisi amet nobis eaque delectus quo, sequi architecto nihil quidem ipsa exercitationem aliquid perferendis necessitatibus. Omnis voluptatum, voluptatem voluptates temporibus dicta possimus reprehenderit ducimus eius ad perferendis culpa quasi ipsa ex pariatur cumque provident nam suscipit at?</p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label" for="cpass">পাসওয়ার্ড নিশ্চিত করুন</label>
                                        <input type="password" class="form-control" id="cpass">
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">বাতিল করুন</button>
                                    <button type="submit" class="btn btn-success">নিশ্চিত করুন</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>
