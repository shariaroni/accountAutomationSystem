<!-- copy
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    include 'user.php';
    include 'header.php';
    session::checksession();

    $pageType = 'general';
    include 'individualSessionCheck.php';
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
        $total = $_POST['total'];
        $need = $_POST['need'];
        $advanceAmount = (double) $_POST['advanceAmount'];
        $date = date("d-m-Y");
        $stage = 2;
        $status = "unseen";

        if($total < $advanceAmount && $need == "yes")
        {
            $msg =  "<div class='alert alert-danger'><strong>অগ্রীম চাহিদা মোট চাহিদার তুলনায় বেশি</strong></div>";
        }
        else
        {
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদনটি সম্পন্ন হয়েছে</strong></div>";
            
            $query = "INSERT INTO demand (budget_type, budgetType, comment, user_id, recommending_officer_id, total, need, advanceAmount, date, stage, status) VALUES ('$budget_type', '$budgetType', '$comment', $user_id, $recommending_officer_id, '$total', '$need', '$advanceAmount', '$date', $stage, '$status')";
            $run = mysqli_query($db, $query);
            
            $budget_id = mysqli_insert_id($db);

            for($i=0; $i<sizeof($_POST['item_name']); $i++){
                $item = $_POST['item_name'][$i];
                $qty = $_POST['qty'][$i];
                $price = $_POST['price'][$i];
                $item_total = $_POST['subtotal'][$i];
                $total += $item_total;
                $query1 = "SELECT * FROM demand_chart WHERE budget_id='$budget_id' and item='$item' and qty='$qty' and price='$price' and item_total='$item_total'";
                $run1 = mysqli_query($db, $query1);
                if(mysqli_num_rows($run1) == 0){
                  $query = "INSERT INTO demand_chart (budget_id, item, qty, price, item_total) VALUES ('$budget_id','$item', '$qty', '$price', '$item_total')";
                  $run = mysqli_query($db, $query);
                }
              }

            session::set("loginmgs", $msg);
            $_SESSION['status'] = "Data Inserted";
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদন সম্পন্ন হয়েছে</strong></div>";
            header("Location: index.php");
        }
    }
?> -->

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
                $new.find('input[name=qty]').val('1');
                $new.find('input[name=price]').val('0.00');
                autoCalcSetup();

            });

        });

    </script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.css"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>

    <!-- Navbar Start -->
    <?php
        include 'navbar.php';
    ?>
    <!-- Navbar End -->
    
    <!-- copy
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
                <div class="box mt-5"> 
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="well col-md-12">
                            <div class="item col-md-12">
                                <div class="h4 text-center mt-1 mb-1">
                                    <strong> চাহিদার বিবারণী ছক </strong> 
                                </div>
                                <hr>
                                <div class="col-md-3">কাজ/সেবা/মালামালের বিবারণ</div>
                                <div class="col-md-2">পরিমাণ(একক)</div>
                                <div class="col-md-2">একক মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</div>
                                <div class="col-md-3">মোট মূল্য(প্রযোজ্য হারে আয়কর ও ভ্যাটসহ)</div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="post_item col-md-12">
                                <div class="col-md-3"><input placeholder="Title" type="text" required="" name="item_name[]" class="form-control"></div>
                                <div class="col-md-2"><input placeholder="qty" type="number" id="qty_1" required="" onkeyup="return qty(1)" name="qty[]" class="form-control"></div>
                                <div class="col-md-2"><input placeholder="Price" type="number" id="price_1" required="" onkeyup="return price(1)"  name="price[]" class="form-control"></div>
                                <div class="col-md-3"><input placeholder="subtotal"  type="number" id="subtotal_1" readonly   name="subtotal[]" class="form-control subtotal"></div>
                                
                            </div>
                            <div id="showItem"></div>
                            <div class="col-md-12">
                            <hr>
                            <div class="mx-4" style="text-align:left;"><span class="btn btn-success addrow"><i class="fa fa-plus" aria-hidden="true"></i></span></div>
                            </div>
                            <div id="totalamount">
                                <div class="form-group">
                                <div class="col-md-offset-3 col-md-4 text-right">সর্বমোট প্রাক্কলিত মূল্য
                                    </div>
                                    <div class="col-md-3">
                                    <input type="text" readonly="" id="totalamounval" name="total" class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> 
                </div>
                <div class="text-center mt-5">
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
                </div>  
            </form>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- page script -->
        <script src="custom.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#disable").on("contextmenu",function(e){
                    return false;
                }); 
            }); 
            $(document).keypress("u",function(e) {
            if(e.ctrlKey){return false;}else{return true;}
            });
    </script>
    </body>
</html>
