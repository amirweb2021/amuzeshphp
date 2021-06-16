<?php include_once 'page/header.php';
$select = selectpostformnext($_GET['id']);
addcoment();
$selectcomentforpost = selectcomentforpost();
?>
    <div class="boxfader1">
        <div class="imagec">
            <img src="admin/imag/<?php echo $select['pictures']; ?>">
        </div>
        <div class="contentc">
            <h2><?php echo $select['title']; ?></h2>
            <p>نویسنده : <?php echo $select['author']; ?></p>
            <p>تاریخ انتشار : <?php echo timetofarsi($select['time']); ?></p>
            <p>دسته بندی : <?php echo selectcategoryname($select['category']); ?></p>
        </div>
        <br>
        <div class="matn1">
            <p><?php echo $select['content']; ?></p>
            <?php
            if (isset($_SESSION['username'])){
            ?>
            <button id="matn1btn">ارسال دیدگاه</button>
            <?php }else{
                ?>
            <div class="divbtn">
                برای نظر دادن ابتدا وارد حساب کاربری خود شوید
            </div>
            <?php }?>
            <div id="popup" style="display: none">
                <p> ارسال دیدگاه</p>
                <div class="popup-inp">
                    <form method="post">
                        <input type="text" placeholder=" نام کاربری" name="name" required><br>
                        <input type="email" placeholder=" ایمیل" name="email" required><br>
                        <textarea placeholder=" دیدگاه" name="coment" required></textarea>
                        <button type="submit" name="btnaddcoment">ارسال دیدگاه</button>
                    </form>
                    <i class="fa fa-close" id="popupclose"></i>
                </div>
            </div>
        </div>
        <div class="divspan">
            <?php
            $tags = explode('-', $select['tagslable']);
            foreach ($tags as $value) {
                echo "<span>$value</span>";
            }
            ?>
        </div>
    </div>
    <div class="boxheader">
        <p>لیست نظرات</p>
    </div>
<?php
if ($selectcomentforpost) {
    foreach ($selectcomentforpost as $value) {
        ?>
        <div class="nazar">
            <div class="boxfadercomment">
                <p>نام: <?php echo $value['name']; ?></p>
                <p style="margin-right: 20px">تاریخ:<?php echo timetofarsi($value['time']); ?></p>
            </div>
            <div class="bodycoment">
                <p>نظر: <?php echo $value['coment']; ?></p>
            </div>
        </div>
        <?php
        $selectrepcomentforpost = selectrepcomentforpost($value['id']);
        if ($selectrepcomentforpost) {
            foreach ($selectrepcomentforpost as $item) {
                ?>
                <div class="repmodir">
            <span style="margin-right: 10px">نام: <span style="color: red"><?php echo $item['name'] ?></span>
            <span style="margin-right: 10px"> تاریخ:<?php echo timetofarsi($item['time']) ?></span>
            <p style="margin-right: 10px"> پاسخ:<?php echo $item['coment'] ?></p>
                </div>
            <?php } ?>
        <?php } else {
            ?>
            <div></div>
        <?php } ?>
    <?php }
} else {
    ?>
    <p class="alertinfo" style="text-align: center">نظری برای این پست ارسال نشده است</p>
<?php } ?>
    <script src="script.js"></script>
<?php include_once 'page/footer.php' ?>