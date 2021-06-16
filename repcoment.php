<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
if (isset($_GET['replay'])) {
    $selectrepcoment = selectrepcoment($_GET['replay']);
}
repcoment();
?>
<?php
if (isset($_SESSION['usernameadmin'])) {

} else {
    header('location:index.php?ebteda=vorod');
}
?>
    <div class="boxfather">
        <?php include_once 'page/sidbar.php' ?>
        <div class="container">

            <div class="leftbox" style="margin-top: 15px;">
                <div class="alert alert-secondary" style="text-align: center;">
                    لطفا کاربر مورد نظر را ویرایش کنید
                </div>
                <form method="POST" style="margin-top: 20px;">
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?php echo $selectrepcoment['email']; ?>"
                               disabled>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?php echo $selectrepcoment['coment']; ?>"
                               disabled>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?php echo $selectrepcoment['postid']; ?>"
                               name="postid" hidden>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?php echo $selectrepcoment['id']; ?>"
                               name="replay" hidden>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="coment"></textarea>
                    </div>
                    <button class="btn btn-success btn-block" name="btnrepcoment">ثبت پاسخ</button>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'page/footer.php' ?>