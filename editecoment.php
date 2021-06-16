<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
if (isset($_GET['replay'])) {
    $selectrepcoment = selectrepcoment($_GET['replay']);
}
if (isset($_GET['editecom'])){
    $selectrepcoment = selectrepcoment($_GET['editecom']);
}
editecoment($_GET['editecom']);
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
                               >
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" value="<?php echo $selectrepcoment['name']; ?>"
                               >
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="coment"><?php echo $selectrepcoment['coment']?></textarea>
                    </div>
                    <button class="btn btn-success btn-block" name="btneditecoment">ثبت ویرایش</button>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'page/footer.php' ?>