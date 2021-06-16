<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$showcategory = showcategory();
deletecategory();
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
لیست دسته بندی
</div>
<?php  
if (isset($_GET['deletecate'])){
?>
<div class="alert alert-success">
  حذف دسته بندی با موفقیت انجام شد
</div>
<?php }?>
<?php  
if (isset($_GET['editecat'])){
?>
<div class="alert alert-success">
 دسته بندی مورد نظر با موفقیت ویرایش شد
</div>
<?php }?>

<table class="table table-dark table-hover">
    <thead style="font-size: 14px;">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>DELETE</th>
        <th>EDIT</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($showcategory)){
foreach ($showcategory as $value){
    ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['name'] ?></td>
        <td><a href="<?php echo 'showcategory.php?deletecategory='.$value['id']; ?>" class="btn btn-danger">حذف</a></td>
        <td><a href="<?php echo 'editecategory.php?editecategory='.$value['id']; ?>" class="btn btn-warning">ویرایش</a></td>
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