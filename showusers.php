<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$showusers =  showusers();
deleteuser();
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
لیست کاربران
</div>
<?php  
if (isset($_GET['deleteusers'])){
?>
<div class="alert alert-success">
حذف کاربر با موفقیت انجام شد
</div>
<?php }?>
<?php  
if (isset($_GET['editeuse'])){
?>
<div class="alert alert-success">
ویرایش کاربر با موفقیت انجام شد
</div>
<?php }?>
<table class="table table-dark table-hover">
    <thead style="font-size: 14px;">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>username</th>
        <th>email</th>
        <th>DELETE</th>
        <th>EDIT</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($showusers)){
      foreach ($showusers as $value){
     ?>
      <tr>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->username; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><a href="<?php echo 'showusers.php?deleteuser='.$value->id; ?>" class="btn btn-danger">حذف</a></td>
        <td><a href="<?php echo 'editeuser.php?editeuser='.$value->id; ?>" class="btn btn-warning">ویرایش</a></td>
      </tr>
      <?php }}else{
        ?>
        <div class="alertalertinfo" style="margin-bottom: 7px"> کاربری موجود نیست</div>
        <?php  }?>
    </tbody>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>