<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
addcategory();
?>

<?php  
if (isset($_SESSION['usernameadmin'])){

}else{
    header('location:index.php?ebteda=vorod');
}
?>
<div class="boxfather">
<?php include_once 'page/sidbar.php' ?>
<div class="container">

<div class="leftbox" style="margin-top: 15px;">
<div class="alert alert-secondary" style="text-align: center;">
لطفا دسته بندی خود را به فارسی وارد کنید
</div>
<?php
if (isset($_GET['addcategory'])){
?>
<div class="alert alert-success" style="text-align: center;">
دسته بندی شما با موفقیت ثبت شد
</div>
<?php }?>
<form method="POST" style="margin-top: 20px;">
<div class="form-group">
<input class="form-control" name="name" placeholder="افزودن دسته بندی">
</div>
<button class="btn btn-success btn-block" name="btncategory">افزودن</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>