<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$showcoment = showcoment();
if (isset($_GET['tayid'])) {
    tayid($_GET['tayid']);
}
if (isset($_GET['laghv'])) {
    laghv($_GET['laghv']);
}
if (isset($_GET['hazfcoment'])) {
    hazfcoment();
}
?>
<?php
if (isset($_SESSION['usernameadmin'])) {

} else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidbar.php' ?>
        <div class="container-fluid text-center" style="font-size: 14px">
            <div class="leftbox" style="margin-top: 15px;">
                <div class="alert alert-secondary" style="text-align: center;">
                    لیست نظرات
                </div>
                <?php
                if (isset($_GET['hazfsuccsess'])) {
                    ?>
                    <div class="alert alert-success">حذف نظر با موفقیت انجام شد</div>
                <?php } ?>
                <table class="table table-dark table-hover table-bordered">
                    <thead style="font-size: 14px;">
                    <tr>
                        <th>id</th>
                        <th>post</th>
                        <th>name</th>
                        <!--                        <th>email</th>-->
                        <th>coment</th>
                        <th>stadus</th>
                        <th>replay</th>
                        <th>time</th>
                        <th>delete</th>
                        <th>edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($showcoment)) {
                        foreach ($showcoment as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php $cn = selectpostnameforcat($value['postid']);
                                    echo mb_substr($cn, '0', '17') . '...';
                                    ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <!--                                <td>--><?php //echo $value['email'] ?><!--</td>-->
                                <td><?php echo $value['coment'] ?></td>
                                <td><?php
                                    if ($value['stadus'] == 0) {
                                        ?>
                                        <a href="<?php echo 'showcoment.php?tayid=' . $value['id'] ?>"
                                           class="btn btn-success">تایید </a>
                                    <?php } else {
                                        ?>
                                        <a href="<?php echo 'showcoment.php?laghv=' . $value['id'] ?>"
                                           class="btn btn-danger">رد</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                    if ($value['replay'] == 0) {
                                        ?>
                                        <a href="<?php echo 'repcoment.php?replay=' . $value['id'] ?>"
                                           class="btn btn-primary">پاسخ</a>
                                    <?php } else {
                                        ?>
                                        <span class="btn btn-secondary">پاسخ</span>
                                    <?php } ?>
                                </td>
                                <td><?php echo selecttimetofarsiforcat($value['time']); ?></td>
                                <td><a href="<?php echo 'showcoment.php?hazfcoment=' . $value['id'] ?>"
                                       class="btn btn-danger">حذف</a></td>
                                <td><a href="<?php echo 'editecoment.php?editecom=' . $value['id'] ?>"
                                       class="btn btn-warning">ویرایش</a></td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <div class="alertalertinfo" style="margin-bottom: 7px">کامنتی موجود نیست</div>
                    <?php } ?>
                    </tbody>

            </div>
        </div>
    </div>
<?php include_once 'page/footer.php' ?>