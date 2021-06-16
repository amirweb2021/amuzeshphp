<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$selectCategoryUpdate = selectcategoryForUpdate($_GET['editecategory']);
editecategory($_GET['editecategory']);
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
<input class="form-control" name="name" placeholder="افزودن دسته بندی" value="<?php echo $selectCategoryUpdate['name'];?>">
</div>
<button class="btn btn-success btn-block" name="btneditecategory">ویرایش</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>