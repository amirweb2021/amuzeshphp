<?php include_once 'page/header.php' ?>
<?php checklohToDashbord();
$showpost = showpost();
if (isset($_GET['deletepost']))
    $selectForUpdatepost = selectForpostupdate($_GET['deletepost']);
    $delete = deltepost();
    if ($delete == true){
        $picpost = 'imag/'.$selectForUpdatepost['pictures'];
        unlink($picpost);
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
<div class="container-fluid text-center">
<div class="leftbox" style="margin-top: 15px;">
<div class="alert alert-secondary" style="text-align: center;">
لیست کاربران
</div>
    <?php
    if (isset($_GET['delete'])){
    ?>
            <div class="alert alert-success">
                حذف پست با موفقیت انجام شد
            </div>
        <?php } ?>
    <?php
    if (isset($_GET['editepostt'])){
        ?>
        <div class="alert alert-success">
           پست شما با موفقیت ویرایش شد
        </div>
    <?php } ?>
    <?php
    if (isset($_GET['erroreditepost'])){
        ?>
        <div class="alert alert-success">
           ویرایش پست شما با خطا مواجه شد
        </div>
    <?php } ?>
    <div class="alert alert-primary">
        <?php
        for ($z = 1;$z <= $count;$z++){
            echo '<a href="showpost.php?page='.$z.'" class="btn btn-dark" style="margin-right:5px;">'.$z.'</a>';
        }
        ?>
    </div>
<table class="table table-dark table-hover">
    <thead style="font-size: 14px;">
      <tr>
        <th>ID</th>
        <th>TITLE</th>
          <th>CATEGORY</th>
        <th>DATE</th>
        <th>PICTURES</th>
        <th>DELETE</th>
        <th>EDIT</th>
      </tr>
    </thead>
    <tbody>
   <?php
   if (!empty($showpost)){
    foreach ($showpost as $value){
    ?>
      <tr>
        <td><?php echo $value->id;?></td>
          <td><?php echo $value->title; ?></td>
        <td><?php echo selectcategoryname($value->category); ?></td>
        <td><?php echo timeTofarsi ($value->time) ?></td>
        <td><img src="imag/<?php echo $value->pictures; ?>" width="70px" height="40px"></td>
        <td><a href="<?php echo 'showpost.php?deletepost='.$value->id; ?>" class="btn btn-danger">حذف</a></td>
        <td><a href="<?php echo 'editepost.php?editepost='.$value->id?>" class="btn btn-warning">ویرایش</a></td>
      </tr>
    <?php }}else{
   ?>
   <div class="alertalertinfo" style="margin-bottom: 7px">پستی موجود نیست</div>
   <?php }?>
    </tbody>
</div>
</div>
</div>
<?php include_once 'page/footer.php' ?>