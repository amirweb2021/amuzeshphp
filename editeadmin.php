<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$selectadmininfoforupdate  = selectadmininfoforupdate($_GET['editeadmin']);
if (isset($_GET['editeadmin'])){
editeadmin($_GET['editeadmin']);
}
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
<div class="alert alert-success" style="text-align: center;">
ویرایش دسته بندی
</div>
<form method="POST" style="margin-top: 20px;">
<div class="form-group">
<input class="form-control" name="username" placeholder="افزودن دسته بندی" value="<?php echo $selectadmininfoforupdate['username'];?>">
</div>
    <div class="form-group">
        <input class="form-control" name="password" placeholder="افزودن دسته بندی" value="<?php echo $selectadmininfoforupdate['password'];?>">
    </div>
<button class="btn btn-success btn-block" name="btnediteadmin">ویرایش</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>