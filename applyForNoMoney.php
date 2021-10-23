<div class="container">
    <form action="descriptionOfDemand.php" method="POST" name="cart">
        <table>
            <tr>
                <td>১) নথি নম্বর:</td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>২) অফিস/বিভাগের নাম: </td>
                <td>
                    <select class="form-select mt-2 d-inline" name="recommending">
                        <option class="d-inline dropdown-menu" value="recommending null">অফিস/বিভাগের নাম বাছাই করুন</option>
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
                <td>৩) সংগ্রহের বিষয়: </td>
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
            </tr>
        </table>
        <table>
            <tr>
                <td>৪) ব্যয়ের উদ্দেশ্য(বিস্তারিত): </td>
                <td>
                    <textarea class="form-control" name="comment" cols="70" rows="4" placeholder="লিখুন..."></textarea>
                </td>
            </tr>
            <tr>
                <td>৫) অর্থবছর: </td>
                <td>
                    <select class="form-select mt-2 d-inline" name="recommending">
                        <option class="d-inline dropdown-menu" value="recommending null">অর্থবছর বাছাই করুন</option>
                        <option value="২০১৭-১৮">২০১৭-১৮</option>
                        <option value="২০১৮-১৯">২০১৮-১৯</option>
                        <option value="২০১৯-২০">২০১৯-২০</option>
                        <option value="২০২০-২১">২০২০-২১</option>
                        <option value="২০২১-২২">২০২১-২২</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>৬) অর্থের উৎস: </td>
                <td>
                    <select class="form-select mt-2 d-inline" name="recommending">
                        <option class="d-inline dropdown-menu" value="recommending null">অর্থের উৎস বাছাই করুন</option>
                        <option value="রাজস্ব">রাজস্ব</option>
                        <option value="উন্নায়ন">উন্নায়ন</option>
                        <option value="অন্যান্য">অন্যান্য</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>৭) ব্যয়ের বাজেট খাত: </td>
                <td>
                    <select class="form-select mt-2 d-inline" name="recommending">
                        <option class="d-inline dropdown-menu" value="recommending null">ব্যয়ের বাজেট খাত বাছাই করুন</option>
                        <option value="কাজ">কাজ</option>
                        <option value="সেবা">সেবা</option>
                        <option value="মালামাল ক্রয়">মালামাল ক্রয়</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>৮) ব্যয়ের বাজেট কোড: </td>
                <td>
                    <select class="form-select mt-2 d-inline" name="recommending">
                        <option class="d-inline dropdown-menu" value="recommending null">ব্যয়ের বাজেট কোড বাছাই করুন</option>
                        <option value="১">১</option>
                        <option value="২">২</option>
                        <option value="৩">৩</option>
                        <option value="৪">৪</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>৯) প্রকিউমেন্ট নম্বর: </td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>১০) পরিকল্পিত মূল্য: </td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>১১) প্রকিউমেন্ট টাইপ: </td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>১২) মালামাল/কাজের বিস্তারিত বিবরণ(নগদ ক্রয়ের ক্ষেত্রে মূল্যসহ): </td>
                <td><input class="form-control" type="text"></td>
            </tr>
            <tr>
                <td>সুপারিশের আবেদন করুন: </td>
                <td>
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
                </td>
            </tr>
        </table>
        <div class="mt-3"><strong>উল্লেখিত কাজ/ সেবা/ মালামাল ক্রয়ের জন্য প্রশাসনিক ও আর্থিক অনুমোদনের জন্য অনুরোধ করছি।</strong></div>
        <div class="text-center mt-4 mb-5">
            <input type="submit" class="btn btn-primary" name="submit" value="নিশ্চিত করুন">
        </div>  
    </form>
</div>