<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
addpost();
$shocate = showcategory();
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
    ارسال پست
</div>
<?php
if (isset($_GET['post'])){
?>
<div class="alert alert-danger" style="text-align: center;">
فرمت شما در سیستم ثبت نشده است
</div>
<?php }?>
<?php
if (isset($_GET['sendpost'])){
?>
<div class="alert alert-success" style="text-align: center;">
پست شما با موفقیت ارسال شد
</div>
<?php }?>
<form method="POST" style="margin-top: 20px;" enctype="multipart/form-data">
    <select class="form-control" name="category">
            <?php
            foreach ($shocate as $value){
            ?>
        <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
                <?php } ?>
    </select><br>
<div class="form-group">
<input class="form-control" name="title" placeholder="عنوان پست" type="text">
</div>
<div class="form-group">
<input class="form-control" name="author" placeholder="نویسنده مطلب" type="text">
</div>
    <div class="form-group">
        <input class="form-control" name="tagslable" placeholder="نام برچسب خود را وارد کنید.حداقل پنج برچسب وارد کنید بر اساس- " type="text">
    </div>
    <div class="form-group">
        <textarea class="form-control" cols="5" rows="5" name="content">

            </textarea><br>
        <script>
            CKEDITOR.replace('content',{
               language:'fa'
            });
        </script>

        <div class="form-group">
            <input type="file" name="file" class="form-control">
        </div>
    </div>
<button class="btn btn-success btn-block" name="btnaddpost">افزودن</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>