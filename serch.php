<?php include_once 'page/header.php';
$showpost = showpost();
if (isset($_POST['btnsearch'])){
    $serch = serch($_POST['serch']);
}
?>
    <div id="search">
        <div class="search">
        </div>
        <div class="search1">
            <form method="post">
                <input type="text" placeholder="دوست داری چی یاد بگیری..." name="serch" style="margin-right: 50px">
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
        if (!empty($serch)){
        foreach ($serch as $value) {
            ?>
            <div class="box box1">
                <img src="admin/imag/<?php echo $value['pictures']; ?>">
                <div class="matnbox">
                    <p><?php echo $value['title']; ?></p>
                </div>
                <div class="matnbtn">
                    <a href="<?php echo 'page.php?id='. $value['id']; ?>">
                        <button class="button">ادامه مطلب</button>
                    </a>
                </div>
            </div>
        <?php }  }else{
         ?>
        <div class="alertinfo">دوره مورد نظر یافت نشد</div>
            <?php }?>
    </div>

<?php include_once 'page/footer.php' ?>