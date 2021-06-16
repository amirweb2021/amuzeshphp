<?php include_once 'page/header.php' ?>
<?php checklohToDashbord() ?>
<?php  
if (isset($_SESSION['usernameadmin'])){

}else{
    header('location:index.php?ebteda=vorod');
}
?>
<div class="boxfather">
<?php include_once 'page/sidbar.php' ?>
<div class="leftbox">
</div>
</div>
<?php include_once 'page/footer.php' ?>