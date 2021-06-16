<?php include_once 'page/header.php'?>
<?php sighnUserToSite(); ?>
<?php checkUserToSite(); ?>
<?php checkLogToSite(); ?>
    <div class="imgbox">
        <div class="fathersighn">
            <div class="leftbox">
               <div class="inputLOG">
               <?php
                if (isset($_GET['log'])){
                ?>
                <div class="alertinfolog" style="width: 480px">
    نام کاربری یا رمز عبور شما اشتباه است
                </div>
                <?php } ?>
                   <form method="post">
                <input type="text" style="#fff;outline: none;width: 400px" placeholder="نام کاربری" name="username" value="<?php if (isset($_COOKIE['username'])){
                    echo $_COOKIE['username'];
                } ?>"><br>
                    <input type="password" style="#fff;outline: none;width: 400px" placeholder="گذرواژه" name="password" value="<?php if (isset($_COOKIE['password'])){
                        echo $_COOKIE['password'];
                    } ?>"><br>
                    <div class="input-check">
                    <input type="checkbox" class="check" name="check" <?php if (isset($_COOKIE['username']) || isset($_COOKIE['password'])){
                        echo 'checked';
                    } ?>>
                    <label style="color: #fff;">مرا به خاطر بسپار</label>
                    </div>
                     <button type="submit" name="btnlog">ورود به سایت</button>
                   </form>
                    </div>
            </div>
            <div class="rightbox">
               <div class="iconn">
               <i class="fa fa-user-plus"></i>
               </div>
                <div class="inputbox">
                <?php
                if (isset($_GET['vorod'])){
                ?>
                <div class="alertsuccess">
                ثبت نام شما با موفقیت انجام شد
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['username'])){
                ?>
                <div class="alertdanger">
                نام کاربری از قبل موجود است
                </div>
                <?php } ?>
                <?php
                if (isset($_GET['input'])){
                ?>
                <div class="alertinfo">
                لطفا ورودی ها را چک کنید
                </div>
                <?php } ?>
                    <form method="post">
                    <input type="text" style="outline: none" placeholder="نام و نام خانوادگی" name="name"><br>
                    <input type="text"  style="outline: none" placeholder="نام کاربری" name="username"><br>
                    <input type="email"  style="outline: none" placeholder="ایمیل" name="email"><br>
                    <input type="password"  style="outline: none" placeholder="گذرواژه" name="password"><br>
                    <button class="btnsighn btn" name="btnsighn">ثبت نام</button><br>
                    <a href="index.php">قبلا ثبت نام کردید؟وارد شوید</a>
                    </form>
                    <div class="icon">
                    <a href="#" class="fa fa-telegram"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once 'page/footer.php'?>