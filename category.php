<?php include_once 'page/header.php';
$showpost = showpost();
if (isset($_GET['category'])){
    $cat = selectcate($_GET['category']);
}
?>
    <div id="search">
        <div class="search">
        </div>
        <div class="search1">
            <form method="post" action="serch.php">
                <input type="text" placeholder="آموزش مورد نظر خود را جستجو کنید..." name="serch">
                <button type="submit" name="btnsearch"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    </div>
    <div class="boxheader">
        <p>جدیدترین مطالب سایت</p>
    </div>

    <div class="boxfader"><br>
        <?php
        foreach ($cat as $value) {
            ?>
            <div class="box box1">
                <img src="admin/imag/<?php echo $value['pictures']; ?>">
                <div class="matnbox">
                    <p><?php echo $value['title']; ?></p>
                </div>
                <div class="matnbtn">
                    <a href="<?php echo 'page.php?id=' . $value['id']; ?>">
                        <button class="button">ادامه مطلب</button>
                    </a>
                </div>
            </div>
        <?php } ?>
<?php include_once 'page/footer.php' ?>