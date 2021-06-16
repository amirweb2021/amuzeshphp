<?php include_once 'page/header.php'?>
<?php checklohToDashbord() ?>
<div class="ADDmininputLOG">
   <h3 style="text-align: center">فرم ورود مدیریت</h3><br>
   <?php  
   if (isset($_GET['ebteda'])){
    
   ?>
   <div class="alertalertinfo" style="text-align: center;">
   ادمین گرامی لطفا ابتدا وارد شوید
   </div>
   <?php }?>
   <?php  
   if (isset($_GET['admin'])){
    
   ?>
   <div class="alertalertdanger" style="text-align: center;">
   نام کاربری یا رمز عبور اشتباه است
   </div>
   <?php }?>
    <form method="post">
    <input type="text" placeholder="نام کاربری"name="username"><br>
    <input type="password" placeholder="پسورد" name="password"><br>
    <button type="submit" name="btnlog" style="border-radius: 50px">ورود به سایت</button>
    </form>
</div>
<?php include_once 'page/footer.php'?>