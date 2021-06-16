<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$showadmininfo = showadmininfo();
?>
<?php  
if (isset($_SESSION['usernameadmin'])){

}else{
    header('location:index.php?ebteda=vorod');
}
?>
<div class="boxfather">
<?php include_once 'page/sidbar.php' ?>
<div class="container-fluid text-center">
<div class="leftbox" style="margin-top: 15px;">
<div class="alert alert-secondary" style="text-align: center;">
لیست ادمین
</div>
<?php  
if (isset($_GET['editeadmin'])){
?>
<div class="alert alert-success">
ویرایش ادمین با موفقیت انجام شد
</div>
<?php }?>

<table class="table table-dark table-hover table-bordered">
    <thead style="font-size: 14px;">
      <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>EDIT</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($showadmininfo)){
foreach ($showadmininfo as $value){
    ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['username'] ?></td>
        <td><a href="<?php echo 'editeadmin.php?editeadmin='.$value['id']; ?>" class="btn btn-warning">ویرایش</a></td>
      </tr>
    <?php }}else{
    ?>
    <div class="alertalertinfo" style="margin-bottom: 7px">دسته بندی موجود نیست</div>
    <?php  }?>
    </tbody>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>