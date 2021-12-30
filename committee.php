<!-- আরএফকিউ পদ্ধতিতে -->
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['rfq'])) {
        $user_id = session::get("id");
        $office_department_name = $_POST['office_department_name'];
        $fiscal_year = $_POST['fiscal_year'];
        $budget_code = $_POST['budget_code'];
        $budget_sector = $_POST['budget_sector'];
        $president_1 = $_POST['president_1'];
        $member_11 = $_POST['member_11'];
        $member_12 = $_POST['member_12'];
        $comment_11 = $_POST['comment_11'];
        $comment_12 = $_POST['comment_12'];
        $comment_13 = $_POST['comment_13'];
        $president_2 = $_POST['president_2'];
        $member_21 = $_POST['member_21'];
        $member_22 = $_POST['member_22'];
        $comment_21 = $_POST['comment_21'];
        $comment_22 = $_POST['comment_22'];
        $comment_23 = $_POST['comment_23'];
        $president_3 = $_POST['president_3'];
        $member_31 = $_POST['member_31'];
        $member_32 = $_POST['member_32'];
        $member_33 = $_POST['member_33'];
        $comment_31 = $_POST['comment_31'];
        $comment_32 = $_POST['comment_32'];
        $comment_33 = $_POST['comment_33'];
        $comment_34 = $_POST['comment_34'];
        $need = "no";

        $date = date("d-m-Y");
        $stage = 2;
        $status = "unseen";

        if($need != "no")
        {
            $msg =  "<div class='alert alert-danger'><strong>অগ্রীম চাহিদা মোট চাহিদার তুলনায় বেশি</strong></div>";
        }
        else
        {
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদনটি সম্পন্ন হয়েছে</strong></div>";

            $query = "INSERT INTO rfq (office_department_name, fiscal_year, budget_code, budget_sector, president_1, member_11, member_12, comment_11, comment_12, comment_13, president_2, member_21, member_22, comment_21, comment_22, comment_23, president_3, member_31, member_32, member_33, comment_31, comment_32, comment_33,comment_34, need, user_id, date, stage, status) VALUES ('$office_department_name', '$fiscal_year', '$budget_code', '$budget_sector', '$president_1', '$member_11', '$member_12', '$comment_11', '$comment_12', '$comment_13', '$president_2', '$member_21', '$member_22', '$comment_21', '$comment_22', '$comment_23', '$president_3', '$member_31', '$member_32', '$member_33', '$comment_31', '$comment_32', '$comment_33', '$comment_34', '$need', '$user_id', '$date', $stage, '$status')";
            $run = mysqli_query($db, $query);

            session::set("loginmgs", $msg);
            $_SESSION['status'] = "Data Inserted";
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদন সম্পন্ন হয়েছে</strong></div>";
            header('Location: index.php');
        }
    }
?>

<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    আরএফকিউ পদ্ধতিতে কাজ/সেবা/মালামাল সংগ্রহের জন্য কমিটি অনুমোদন
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <form action="applyType.php" method="POST">
                        <div class="accordion-body">
                            <table>
                                <tr>
                                    <td>১) অফিস/বিভাগের নাম: </td>
                                    <td>
                                        <select class="form-select mt-2 d-inline" name="office_department_name">
                                            <option class="d-inline dropdown-menu" value="office and department name null">অফিস/বিভাগের নাম বাছাই করুন</option>
                                            <option value="BE">Biomedical Engineering</option>
                                            <option value="ChE">Chemical Engineering</option>
                                            <option value="CSE">Computer Science and Engineering</option>
                                            <option value="EEE">Electrical and Electronic Engineering</option>
                                            <option value="IPE">Industrial and Production Engineering</option>
                                            <option value="PME">Petroleum and Mining Engineering</option>
                                            <option value="TE">Textile Engineering</option>
                                            <option value="APPT">Agro Product Processing Technology</option>
                                            <option value="CDM">Climate and Disaster Management</option>
                                            <option value="EST">Environmental Science and Technology</option>
                                            <option value="NFT">Nutrition and Food Technology</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>২) অর্থবছর: </td>
                                    <td>
                                        <select class="form-select mt-2 d-inline" name="fiscal_year">
                                            <option class="d-inline dropdown-menu" value="Fiscal year null">অর্থবছর বাছাই করুন</option>
                                            <option value="২০১৭-১৮">২০১৭-১৮</option>
                                            <option value="২০১৮-১৯">২০১৮-১৯</option>
                                            <option value="২০১৯-২০">২০১৯-২০</option>
                                            <option value="২০২০-২১">২০২০-২১</option>
                                            <option value="২০২১-২২">২০২১-২২</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>৩) ব্যয়ের খাত/খাতসমূহ: </td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered mt-3">
                                <tr class="text-center">
                                    <th>বাজেট কোড</td>
                                    <th>বাজেট খাত</td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" name="budget_code"></td>
                                    <td><input class="form-control" type="text" name="budget_sector"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        ৪) বর্ণিত ব্যয়ের খাত/ খাতসমূহের জন্য প্রয়োজনীয় বাজেট বরাদ্দ আছে। সংগ্রহ প্রক্রিয়াটি পিপিএ পিপিআর অনুযায়ী স্বচ্ছতার মাধ্যমে সম্পন্নের জন্য নিম্নবর্ণিত কমিটি গঠন করা প্রয়োজন।
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ক) দাপ্তরিক ব্যয় প্রাক্কলন কমিটিঃ
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered mt-3">
                                <tr class="text-center">
                                    <th>কমিটির পদ</th>
                                    <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                    <th>মন্তব্য</th>
                                </tr>
                                <tr>
                                    <td>সভাপতি</td>
                                    <td><input class="form-control" type="text" name="president_1"></td>
                                    <td><input class="form-control" type="text" name="comment_11"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_11"></td>
                                    <td><input class="form-control" type="text" name="comment_12"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_12"></td>
                                    <td><input class="form-control" type="text" name="comment_13"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>খ) দরপত্র উন্মুক্তকরণ ও মূল্যায়ন কমিটিঃ</td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered mt-3">
                                <tr class="text-center">
                                    <th>কমিটির পদ</th>
                                    <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                    <th>মন্তব্য</th>
                                </tr>
                                <tr>
                                    <td>সভাপতি</td>
                                    <td><input class="form-control" type="text" name="president_2"></td>
                                    <td><input class="form-control" type="text" name="comment_21"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_21"></td>
                                    <td><input class="form-control" type="text" name="comment_22"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_22"></td>
                                    <td><input class="form-control" type="text" name="comment_23"></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>গ) কাজ/ সেবা/ মালামাল এর গুণগতমান ও পরিমাণ পরীক্ষা/যাচাই কমিটিঃ</td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered mt-3">
                                <tr class="text-center">
                                    <th>কমিটির পদ</th>
                                    <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                    <th>মন্তব্য</th>
                                </tr>
                                <tr>
                                    <td>সভাপতি</td>
                                    <td><input class="form-control" type="text" name="president_3"></td>
                                    <td><input class="form-control" type="text" name="comment_31"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_31"></td>
                                    <td><input class="form-control" type="text" name="comment_32"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_32"></td>
                                    <td><input class="form-control" type="text" name="comment_33"></td>
                                </tr>
                                <tr>
                                    <td>সদস্য</td>
                                    <td><input class="form-control" type="text" name="member_33"></td>
                                    <td><input class="form-control" type="text" name="comment_34"></td>
                                </tr>
                            </table>
                            <div>
                                <strong>প্রস্তাবিত কমিটি অনুমোদনের জন্য উপস্থাপন করা হলো।</strong>
                            </div>
                            <div class="text-center mt-3 mb-5">
                                <input type="submit" class="btn btn-primary" name="rfq" value="নিশ্চিত করুন">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<!-- উন্মুক্ত দরপত্র পদ্ধতিতে -->
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['open_tenders'])) {
        $user_id = session::get("id");
        $office_department_name = $_POST['office_department_name'];
        $fiscal_year = $_POST['fiscal_year'];
        $budget_code = $_POST['budget_code'];
        $budget_sector = $_POST['budget_sector'];
        $president_1 = $_POST['president_1'];
        $member_11 = $_POST['member_11'];
        $member_12 = $_POST['member_12'];
        $comment_11 = $_POST['comment_11'];
        $comment_12 = $_POST['comment_12'];
        $comment_13 = $_POST['comment_13'];

        $president_2 = $_POST['president_2'];
        $member_21 = $_POST['member_21'];
        $member_22 = $_POST['member_22'];
        $comment_21 = $_POST['comment_21'];
        $comment_22 = $_POST['comment_22'];
        $comment_23 = $_POST['comment_23'];

        $president_3 = $_POST['president_3'];
        $member_31 = $_POST['member_31'];
        $member_32 = $_POST['member_32'];
        $member_33 = $_POST['member_33'];
        $member_34 = $_POST['member_34'];
        $comment_31 = $_POST['comment_31'];
        $comment_32 = $_POST['comment_32'];
        $comment_33 = $_POST['comment_33'];
        $comment_34 = $_POST['comment_34'];
        $comment_35 = $_POST['comment_35'];

        $president_4 = $_POST['president_4'];
        $member_41 = $_POST['member_41'];
        $member_42 = $_POST['member_42'];
        $member_43 = $_POST['member_43'];
        $comment_41 = $_POST['comment_41'];
        $comment_42 = $_POST['comment_42'];
        $comment_43 = $_POST['comment_43'];
        $comment_44 = $_POST['comment_44'];

        $need = "no";

        $date = date("d-m-Y");
        $stage = 2;
        $status = "unseen";

        if($need != "no")
        {
            $msg =  "<div class='alert alert-danger'><strong>অগ্রীম চাহিদা মোট চাহিদার তুলনায় বেশি</strong></div>";
        }
        else
        {
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদনটি সম্পন্ন হয়েছে</strong></div>";

            $query = "INSERT INTO open_tenders (office_department_name, fiscal_year, budget_code, budget_sector, president_1, member_11, member_12, comment_11, comment_12, comment_13, president_2, member_21, member_22, comment_21, comment_22, comment_23, president_3, member_31, member_32, member_33, member_34, comment_31, comment_32, comment_33, comment_34, comment_35, president_4, member_41, member_42, member_43, comment_41, comment_42, comment_43, comment_44, need, user_id, date, stage, status) VALUES ('$Office_department_name', '$fiscal_year', '$budget_code', '$budget_sector', '$president_1', '$member_11', '$member_12', '$comment_11', '$comment_12', '$comment_13', '$president_2', '$member_21', '$member_22', '$comment_21', '$comment_22', '$comment_23', '$president_3', '$member_31', '$member_32', '$member_33', '$member_34', '$comment_31', '$comment_32', '$comment_33', '$comment_34', '$comment_35', '$president_4', '$member_41', '$member_42', '$member_43', '$comment_41', '$comment_42', '$comment_43', '$comment_44', '$need', '$user_id', '$date', $stage, '$status')";
            $run = mysqli_query($db, $query);

            session::set("loginmgs", $msg);
            $_SESSION['status'] = "Data Inserted";
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদন সম্পন্ন হয়েছে</strong></div>";
            header("Location: index.php");
        }
    }
?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    উন্মুক্ত দরপত্র পদ্ধতিতে কাজ/সেবা/মালামাল সংগ্রহের জন্য কমিটি অনুমোদন
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table>
                            <tr>
                                <td>১) অফিস/বিভাগের নাম: </td>
                                <td>
                                    <select class="form-select mt-2 d-inline" name="office_department_name">
                                        <option class="d-inline dropdown-menu" value="Office department name null">অফিস/বিভাগের নাম বাছাই করুন</option>
                                        <option value="BE">Biomedical Engineering</option>
                                        <option value="ChE">Chemical Engineering</option>
                                        <option value="CSE">Computer Science and Engineering</option>
                                        <option value="EEE">Electrical and Electronic Engineering</option>
                                        <option value="IPE">Industrial and Production Engineering</option>
                                        <option value="PME">Petroleum and Mining Engineering</option>
                                        <option value="TE">Textile Engineering</option>
                                        <option value="APPT">Agro Product Processing Technology</option>
                                        <option value="CDM">Climate and Disaster Management</option>
                                        <option value="EST">Environmental Science and Technology</option>
                                        <option value="NFT">Nutrition and Food Technology</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>২) অর্থবছর: </td>
                                <td>
                                    <select class="form-select mt-2 d-inline" name="fiscal_year">
                                        <option class="d-inline dropdown-menu" value="Fiscal year null">অর্থবছর বাছাই করুন</option>
                                        <option value="২০১৭-১৮">২০১৭-১৮</option>
                                        <option value="২০১৮-১৯">২০১৮-১৯</option>
                                        <option value="২০১৯-২০">২০১৯-২০</option>
                                        <option value="২০২০-২১">২০২০-২১</option>
                                        <option value="২০২১-২২">২০২১-২২</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>৩) ব্যয়ের খাত/খাতসমূহ: </td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>বাজেট কোড</td>
                                <th>বাজেট খাত</td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" name="budget_code"></td>
                                <td><input class="form-control" type="text" name="budget_sector"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    ৪) বর্ণিত ব্যয়ের খাত/ খাতসমূহের জন্য প্রয়োজনীয় বাজেট বরাদ্দ আছে। সংগ্রহ প্রক্রিয়াটি পিপিএ পিপিআর অনুযায়ী স্বচ্ছতার মাধ্যমে সম্পন্নের জন্য নিম্নবর্ণিত কমিটি গঠন করা প্রয়োজন।
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ক) দাপ্তরিক ব্যয় প্রাক্কলন কমিটিঃ
                                </td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_1"></td>
                                <td><input class="form-control" type="text" name="comment_11"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_11"></td>
                                <td><input class="form-control" type="text" name="comment_12"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_12"></td>
                                <td><input class="form-control" type="text" name="comment_13"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>খ) দরপত্র উন্মুক্তকরণ ও মূল্যায়ন কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_2"></td>
                                <td><input class="form-control" type="text" name="comment_21"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_21"></td>
                                <td><input class="form-control" type="text" name="comment_22"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_22"></td>
                                <td><input class="form-control" type="text" name="comment_23"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>গ) দরপত্র মূল্যায়ণ কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_3"></td>
                                <td><input class="form-control" type="text" name="comment_31"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_31"></td>
                                <td><input class="form-control" type="text" name="comment_32"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_32"></td>
                                <td><input class="form-control" type="text" name="comment_33"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_33"></td>
                                <td><input class="form-control" type="text"  name="comment_34"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_34"></td>
                                <td><input class="form-control" type="text" name="comment_35"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>ঘ) কাজ/ সেবা/ মালামাল এর গুণগতমান ও পরিমাণ পরীক্ষা/যাচাই কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_4"></td>
                                <td><input class="form-control" type="text" name="comment_41"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_41"></td>
                                <td><input class="form-control" type="text" name="comment_42"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_42"></td>
                                <td><input class="form-control" type="text" name="comment_43"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_43"></td>
                                <td><input class="form-control" type="text" name="comment_44"></td>
                            </tr>
                        </table>
                        <div>
                            <strong>প্রস্তাবিত কমিটি অনুমোদনের জন্য উপস্থাপন করা হলো।</strong>
                        </div>
                        <div class="text-center mt-3 mb-5">
                            <input type="submit" class="btn btn-primary" name="open_tenders" value="নিশ্চিত করুন">
                        </div>
                    </div>
                </div>
            </div>

<!-- উন্মুক্ত দরপত্র(ইজিপি) পদ্ধতিতে -->
<?php
    $db = mysqli_connect("localhost","root","","db_lr");

    if (isset($_POST['egp'])) {
        $user_id = session::get("id");
        $office_department_name = $_POST['office_department_name'];
        $fiscal_year = $_POST['fiscal_year'];
        $budget_code = $_POST['budget_code'];
        $budget_sector = $_POST['budget_sector'];

        $president_1 = $_POST['president_1'];
        $member_11 = $_POST['member_11'];
        $member_12 = $_POST['member_12'];
        $comment_11 = $_POST['comment_11'];
        $comment_12 = $_POST['comment_12'];
        $comment_13 = $_POST['comment_13'];

        $president_2 = $_POST['president_2'];
        $member_21 = $_POST['member_21'];
        $comment_21 = $_POST['comment_21'];
        $comment_22 = $_POST['comment_22'];

        $president_3 = $_POST['president_3'];
        $member_31 = $_POST['member_31'];
        $member_32 = $_POST['member_32'];
        $comment_31 = $_POST['comment_31'];
        $comment_32 = $_POST['comment_32'];
        $comment_33 = $_POST['comment_33'];

        $president_4 = $_POST['president_4'];
        $member_41 = $_POST['member_31'];
        $member_42 = $_POST['member_42'];
        $member_43 = $_POST['member_43'];
        $comment_41 = $_POST['comment_41'];
        $comment_42 = $_POST['comment_42'];
        $comment_43 = $_POST['comment_43'];
        $comment_44 = $_POST['comment_44'];

        $need = "no";

        $date = date("d-m-Y");
        $stage = 2;
        $status = "unseen";

        if($need != "no")
        {
            $msg =  "<div class='alert alert-danger'><strong>অগ্রীম চাহিদা মোট চাহিদার তুলনায় বেশি</strong></div>";
        }
        else
        {
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদনটি সম্পন্ন হয়েছে</strong></div>";

            $query = "INSERT INTO egp (Office_department_name, fiscal_year, budget_code, budget_sector, president_1, member_11, member_12, comment_11, comment_12, comment_13, president_2, member_21, member_22, comment_21, comment_22, president_3, member_31, member_32, member_33, comment_31, comment_32, comment_33,comment_34, president_4, member_41, member_42, member_43, comment_41, comment_42, comment_43, comment_44, need, user_id, date, stage, status) VALUES ('$Office_department_name', '$fiscal_year', '$budget_code', '$budget_sector', '$president_1', '$member_11', '$member_12', '$comment_11', '$comment_12', '$comment_13', '$president_2', '$member_21', '$member_22', '$comment_21', '$comment_22', '$president_3', '$member_31', '$member_32', '$member_33', '$comment_31', '$comment_32', '$comment_33', '$comment_34', '$president_4', '$member_41', '$member_42', '$member_43', '$comment_41', '$comment_42', '$comment_43', '$comment_44', '$need', '$user_id', '$date', $stage, '$status')";
            $run = mysqli_query($db, $query);

            session::set("loginmgs", $msg);
            $_SESSION['status'] = "Data Inserted";
            $msg =  "<div class='alert alert-success'><strong>আপনার বাজেট আবেদন সম্পন্ন হয়েছে</strong></div>";
            header("Location: index.php");
        }
    }
?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    উন্মুক্ত দরপত্র(ইজিপি) পদ্ধতিতে কাজ/সেবা/মালামাল সংগ্রহের জন্য কমিটি অনুমোদন
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table>
                            <tr>
                                <td>১) অফিস/বিভাগের নাম: </td>
                                <td>
                                    <select class="form-select mt-2 d-inline" name="office_department_name">
                                        <option class="d-inline dropdown-menu" value="Office department name null">অফিস/বিভাগের নাম বাছাই করুন</option>
                                        <option value="BE">Biomedical Engineering</option>
                                        <option value="ChE">Chemical Engineering</option>
                                        <option value="CSE">Computer Science and Engineering</option>
                                        <option value="EEE">Electrical and Electronic Engineering</option>
                                        <option value="IPE">Industrial and Production Engineering</option>
                                        <option value="PME">Petroleum and Mining Engineering</option>
                                        <option value="TE">Textile Engineering</option>
                                        <option value="APPT">Agro Product Processing Technology</option>
                                        <option value="CDM">Climate and Disaster Management</option>
                                        <option value="EST">Environmental Science and Technology</option>
                                        <option value="NFT">Nutrition and Food Technology</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>২) অর্থবছর: </td>
                                <td>
                                    <select class="form-select mt-2 d-inline" name="fiscal_year">
                                        <option class="d-inline dropdown-menu" value="Fiscal year null">অর্থবছর বাছাই করুন</option>
                                        <option value="২০১৭-১৮">২০১৭-১৮</option>
                                        <option value="২০১৮-১৯">২০১৮-১৯</option>
                                        <option value="২০১৯-২০">২০১৯-২০</option>
                                        <option value="২০২০-২১">২০২০-২১</option>
                                        <option value="২০২১-২২">২০২১-২২</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>৩) ব্যয়ের খাত/খাতসমূহ: </td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>বাজেট কোড</td>
                                <th>বাজেট খাত</td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="text" name="budget_code"></td>
                                <td><input class="form-control" type="text" name="budget_sector"></td>
                            </tr>
                        </table>
                        <table>
                        
                            <tr>
                                <td>
                                    ৪) বর্ণিত ব্যয়ের খাত/ খাতসমূহের জন্য প্রয়োজনীয় বাজেট বরাদ্দ আছে। সংগ্রহ প্রক্রিয়াটি পিপিএ পিপিআর অনুযায়ী স্বচ্ছতার মাধ্যমে সম্পন্নের জন্য নিম্নবর্ণিত কমিটি গঠন করা প্রয়োজন।
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ক) দাপ্তরিক ব্যয় প্রাক্কলন কমিটিঃ
                                </td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_1"></td>
                                <td><input class="form-control" type="text" name="comment_11"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_11"></td>
                                <td><input class="form-control" type="text" name="comment_12"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_12"></td>
                                <td><input class="form-control" type="text" name="comment_13"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>খ) দরপত্র উন্মুক্তকরণ কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_2"></td>
                                <td><input class="form-control" type="text" name="comment_21"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_21"></td>
                                <td><input class="form-control" type="text" name="comment_22"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>গ) দরপত্র মূল্যায়ণ কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_3"></td>
                                <td><input class="form-control" type="text" name="comment_31"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_31"></td>
                                <td><input class="form-control" type="text" name="comment_32"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_32"></td>
                                <td><input class="form-control" type="text" name="comment_33"></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>ঘ) কাজ/ সেবা/ মালামাল এর গুণগতমান ও পরিমাণ পরীক্ষা/যাচাই কমিটিঃ</td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered mt-3">
                            <tr class="text-center">
                                <th>কমিটির পদ</th>
                                <th>নাম, পদবী ও প্রতিষ্ঠানের নাম</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>সভাপতি</td>
                                <td><input class="form-control" type="text" name="president_4"></td>
                                <td><input class="form-control" type="text" name="comment_41"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_41"></td>
                                <td><input class="form-control" type="text" name="comment_42"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_42"></td>
                                <td><input class="form-control" type="text" name="comment_43"></td>
                            </tr>
                            <tr>
                                <td>সদস্য</td>
                                <td><input class="form-control" type="text" name="member_43"></td>
                                <td><input class="form-control" type="text" name="comment_44"></td>
                            </tr>
                        </table>
                        <div>
                            <strong>প্রস্তাবিত কমিটি অনুমোদনের জন্য উপস্থাপন করা হলো।</strong>
                        </div>
                        <div class="text-center mt-3 mb-5">
                            <input type="submit" class="btn btn-primary" name="egp" value="নিশ্চিত করুন">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>