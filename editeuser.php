<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$userupdate =  userForUpdate($_GET['editeuser']);
editeuser($_GET['editeuser']);
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
لطفا کاربر مورد نظر را ویرایش کنید
</div>
<form method="POST" style="margin-top: 20px;">
<div class="form-group">
<input class="form-control" name="name" type="text" placeholder="نام ونام خانوادگی" value="<?php echo $userupdate['name'];?>">
</div>
<div class="form-group">
<input class="form-control" name="username" type="text" placeholder="نام کاربری" value="<?php echo $userupdate['username'];?>">
</div>
<div class="form-group">
<input class="form-control" name="email" type="text" placeholder="ایمیل" value="<?php echo $userupdate['email'];?>">
</div>
<button class="btn btn-success btn-block" name="btnediteuser">ویرایش کاربر</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>