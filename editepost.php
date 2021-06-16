<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
addpost();
$shocate = showcategory();
$selectForUpdatepost = selectForpostupdate($_GET['editepost']);
if (isset($_POST['btneditepost'])){
$editepost = editepost($_GET['editepost']);
    if ($editepost == false){
        $postpic = 'imag/'.$selectForUpdatepost['pictures'];
        unlink($postpic);
    }
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
<div class="alert alert-secondary" style="text-align: center;">
    ارسال پست
</div>

<form method="POST" style="margin-top: 20px;" enctype="multipart/form-data">
    <select class="form-control" name="category">
        <?php
        foreach ($shocate as $value){
        ?>
        <option value="<?php echo $value['id']?>" <?php if ($selectForUpdatepost['category']==$value['id']){
            echo 'selected';
        }?>><?php echo $value['name']?></option>

        <?php }?>
    </select><br>
<div class="form-group">
<input class="form-control" name="title" placeholder="عنوان پست" type="text" value="<?php echo $selectForUpdatepost['title'];?>">
</div>
<div class="form-group">
<input class="form-control" name="author" placeholder="نویسنده مطلب" type="text" value="<?php echo $selectForUpdatepost['author'];?>">
</div>
    <div class="form-group">
        <input class="form-control" name="tags" value="<?php echo $selectForUpdatepost['tagslable']?>" type="text">
    </div>
    <div class="form-group">
        <textarea class="form-control" cols="5" rows="5" name="content">
            <?php echo $selectForUpdatepost['content'];?>
            </textarea><br>
        <script>
            CKEDITOR.replace('content',{
               language:'fa'
            });
        </script>
        <div class="form-group">
            <img src="imag/<?php echo $selectForUpdatepost['pictures'];?>" width="250px" height="150px" style="float: right;margin-bottom: 20px;border: 1px solid #ccc;border-radius: 8px">
        </div>
        <div class="form-group">
            <input class="form-control"placeholder="نویسنده مطلب" type="text" value="<?php echo $selectForUpdatepost['pictures'];?>" disabled>
        </div>
        <div class="form-group">
            <input type="file" name="file" class="form-control">
        </div>
    </div>
<button class="btn btn-success btn-block" name="btneditepost">ویرایش</button>
</form>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>