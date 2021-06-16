<?php
function sighnUserToSite(){
    global $connect;
    if (isset($_POST['btnsighn'])){
        if(checkUserToSite() == true){
            header('location:user.php?username=error');
        }else{
            if (!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
                $sql = 'INSERT INTO user_table SET name=?,username=?,email=?,password=?';
                $result = $connect->prepare($sql);
                $result->bindValue(1,$_POST['name']);
                $result->bindValue(2,$_POST['username']);
                $result->bindValue(3,$_POST['email']);
                $result->bindValue(4,md5($_POST['password']));
                $result->execute();
                $_SESSION['username']= $_POST['username'];
                header('location:user.php?vorod=true');
            }else{
                header('location:user.php?input=empty');
            }
        }
    }
}

function checkUserToSite(){
    global $connect;
    $sql = 'SELECT * FROM user_table WHERE username=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1,@$_POST['username']);
    $result->execute();
    if ($result->rowCount()>=1){
        return $result;
    }else{
        return false;
    }
}

function checkLogToSite(){
    global $connect;
    if (isset($_POST['btnlog'])){
        $sql = 'SELECT * FROM user_table WHERE username=? AND password=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1,$_POST['username']);
        $result->bindValue(2,md5($_POST['password']));
        $result->execute();
        if ($result->rowCount()){
            $_SESSION['username']= $_POST['username'];
            if (isset($_POST['check'])){
                setcookie('username',$_POST['username'],time() + (30 * 24 * 60 * 60));
                setcookie('password',$_POST['password'],time() + (30 * 24 * 60 * 60));
            }else {
                setcookie('username', '');
                setcookie('password', '');
            }
            header('location:index.php');
            return $result;
        }else{
            header('location:user.php?log=error');
            return false;
        }
    }
}

function checklohToDashbord()
{
    global $connect;
    if (isset($_POST['btnlog'])) {
        $sql = 'SELECT * FROM admiv_table WHERE username=? AND password=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->execute();
        if ($result->rowCount() >= 1) {
            $_SESSION['usernameadmin'] = $_POST['username'];
            header('location:dashbord.php');
            return $result;
        } else {
            header('location:index.php?admin=false');
            return false;
        }
    }
}

function addcategory()
{
    global $connect;
    if (isset($_POST['btncategory'])) {
        $sql = 'INSERT INTO category_table SET name=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->execute();
        header('location:addcategory.php?addcategory=ok');
    }
}

function showcategory()
{
    global $connect;
    $sql = 'SELECT * FROM category_table ';
    $result = $connect->prepare($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function deletecategory()
{
    global $connect;
    if (isset($_GET['deletecategory'])) {
        $sql = 'DELETE FROM category_table WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deletecategory']);
        $result->execute();
        if ($result->rowCount()) {
            header('location:showcategory.php?deletecate=success');
            return $result;
        } else {
            return false;
        }
    }
}

function selectcategoryForUpdate($id)
{
    global $connect;
    $sql = 'SELECT * FROM category_table WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function editecategory($id)
{
    global $connect;
    if (isset($_POST['btneditecategory'])) {
        $sql = 'UPDATE category_table SET name=? WHERE id =?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->bindValue(2, $id);
        $result->execute();
        header('location:showcategory.php?editecat=success');
    }
}

function showusers()
{
    global $connect;
    $sql = 'SELECT * FROM user_table';
    $result = $connect->prepare($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_OBJ);
        return $row;
    } else {
        return false;
    }
}

function deleteuser()
{
    global $connect;
    if (isset($_GET['deleteuser'])) {
        $sql = 'DELETE FROM user_table WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deleteuser']);
        $result->execute();
        if ($result->rowCount()) {
            header('location:showusers.php?deleteusers=success');
            return $result;
        } else {
            return false;
        }
    }
}

function userForUpdate($id)
{
    global $connect;
    $sql = 'SELECT * FROM user_table WHERE id = ?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function editeuser($id)
{
    global $connect;
    if (isset($_POST['btnediteuser'])) {
        $sql = "UPDATE category_table SET name=?,username=?,email=? WHERE id=?";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $id);
        $result->bindValue(2, $_POST['name']);
        $result->bindValue(3, $_POST['username']);
        $result->bindValue(4, $_POST['email']);
        $result->execute();
        header('location:showusers.php?editeuse=success');
        return $result;
    } else {
        return false;
    }
}

function addpost()
{
    global $connect;
    if (isset($_POST['btnaddpost'])) {
        $sql = 'INSERT INTO post_table SET category=?,title=?,author=?,tagslable=?,content=?,pictures=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['category']);
        $result->bindValue(2, $_POST['title']);
        $result->bindValue(3, $_POST['author']);
        $result->bindValue(4, $_POST['tagslable']);
        $result->bindValue(5, $_POST['content']);
        $file = $_FILES['file'];
        $_1 = explode('.', $file['name']);
        $_2 = end($_1);
        if (in_array($_2, ['jpg', 'jpeg', 'png', 'mp4'])) {
            $name = microtime('Y M D') . 'img-' . rand(1, 5000) . '.' . $_2;
            move_uploaded_file($file['tmp_name'], 'imag/' . $name);
            $result->bindValue(6, $name);
            @$result->execute();
            header('location:addpost.php?sendpost=success');
        } else {
            header('location:addpost.php?post=error');
        }
    }
}

function showpost()
{
    global $connect;
    global $count;
    $sql = "SELECT * FROM post_table";
    $result = $connect->prepare($sql);
    $result->execute();
    $tedad = $result->rowCount();
    $count = ceil($tedad / 4);
    if (!isset($_GET['page'])) {
        $cn = 0;
    } else {
        $cn = ($_GET['page'] - 1) * 4;
    }
    $sql = "SELECT * FROM post_table LIMIT {$cn},4";
    $result = $connect->prepare($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function deltepost()
{
    global $connect;
    if (isset($_GET['deletepost'])) {
        $sql = 'DELETE FROM post_table WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['deletepost']);
        @ $result->execute();
        if ($result->rowCount()) {
            header('location:showpost.php?delete=success');
            return $result;
        } else {
            return false;
        }
    }
}

function selectcategoryname($value)
{
    global $connect;
    $sql = 'SELECT * FROM category_table WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $value);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $valuename) {
            return $valuename['name'];
        }
    } else {
        return false;
    }
}

function timeTofarsi($value)
{
    $time = explode('-', $value);
    return gregorian_to_jalali($time['0'], $time['1'], $time['2'], '/');
}

function selectForpostupdate($id)
{
    global $connect;
    $sql = 'SELECT * FROM post_table WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() >= 1) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function editepost($id)
{
    global $connect;
    if (isset($_POST['btneditepost'])) {
        $sql = "UPDATE post_table SET category=?,title=?,author=?,content=?,pictures=? WHERE id=? ";
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['category']);
        $result->bindValue(2, $_POST['title']);
        $result->bindValue(3, $_POST['author']);
        $result->bindValue(4, $_POST['content']);
        $file = $_FILES['file'];
        $_1 = explode('.', $file['name']);
        $_2 = end($_1);
        if (in_array($_2, ['jpg', 'jpag', 'png', 'mp4'])) {
            $name = microtime('Y M D') . 'img-' . rand(1, 5000) . '.' . $_2;
            move_uploaded_file($file['tmp_name'], 'imag/' . $name);
            $result->bindValue(5, $name);
            $result->bindValue(6, $id);
            $result->execute();
            header('location:showpost.php?editepostt=success');
        } else {
            header('location:showpost.php?erroreditepost=danger');
        }
    }
}

function selectpostformnext($id)
{
    global $connect;
    if (isset($_GET['id'])) {
        $sql = 'SELECT * FROM post_table WHERE  id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount()) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
}

function serch($value)
{
    global $connect;
    if (isset($_POST['btnsearch'])) {
        $sql = 'SELECT * FROM post_table WHERE title LIKE ?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, "%$value%");
        $result->execute();
        if ($result->rowCount()) {
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
}

function selectcate($value)
{
    global $connect;
    if (isset($_GET['category'])) {
        $sql = 'SELECT * FROM post_table WHERE category=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $value);
        $result->execute();
        if ($result->rowCount()) {
            return $row = $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}

function addcoment()
{
    global $connect;
    if (isset($_POST['btnaddcoment'])) {
        $sql = 'INSERT INTO coment_table  SET name=?,email=?,coment=?,postid=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['name']);
        $result->bindValue(2, $_POST['email']);
        $result->bindValue(3, $_POST['coment']);
        $result->bindValue(4, $_GET['id']);
        $result->execute();
        echo '<script>alert("پیام شما دریافت شد و در حال بررسی میباشد")</script>';
    }
}

function showcoment()
{
    global $connect;
    $sql = 'SELECT * FROM coment_table';
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function selectpostnameforcat($value)
{
    global $connect;
    $sql = 'SELECT * FROM post_table WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $value);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $valuepost) {
            return $valuepost['title'];
        }
    }
}

function selecttimetofarsiforcat($value)
{
    $time = explode('-', $value);
    return gregorian_to_jalali($time['0'], $time['1'], $time['2'], '/');
}

function tayid($value)
{
    global $connect;
    $sql = 'UPDATE coment_table SET stadus=? WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, 1);
    $result->bindValue(2, $value);
    $result->execute();
    header('location:showcoment.php');
}

function laghv($value)
{
    global $connect;
    $sql = 'UPDATE coment_table SET stadus=? WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, 0);
    $result->bindValue(2, $value);
    $result->execute();
    header('location:showcoment.php');
}

function selectrepcoment($id)
{
    global $connect;
    $sql = 'SELECT * FROM coment_table WHERE id=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function repcoment()
{
    global $connect;
    if (isset($_POST['btnrepcoment'])) {
        $sql = 'INSERT INTO coment_table  SET name=?,email=?,coment=?,stadus=?,replay=?,postid=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, 'مدیر');
        $result->bindValue(2, 'amir.hz.09921103757@gmail.com');
        $result->bindValue(3, $_POST['coment']);
        $result->bindValue(4, '1');
        $result->bindValue(5, $_POST['replay']);
        $result->bindValue(6, $_POST['postid']);
        $result->execute();
        header('location:showcoment.php');
    }
}

function hazfcoment()
{
    global $connect;
    if (isset($_GET['hazfcoment'])) {
        $sql = 'DELETE FROM coment_table WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_GET['hazfcoment']);
        @$result->execute();
        if ($result->rowCount()) {
            header('location:showcoment.php?hazfsuccsess=true');
            return $result;
        } else {
            return false;
        }
    }
}

function editecoment($value)
{
    global $connect;
    if (isset($_POST['btneditecoment'])) {
        $sql = 'UPDATE coment_table SET coment=? WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $value);
        $result->bindValue(2, $_POST['coment']);
        $result->execute();
        if ($result->rowCount()) {
            header('location:showcoment.php?editecoment=true');
            return $result;
        } else {
            return false;
        }
    }
}

function selectcomentforpost()
{
    global $connect;
    $sql = 'SELECT * FROM coment_table WHERE stadus=? AND postid=? AND replay=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, '1');
    $result->bindValue(2, $_GET['id']);
    $result->bindValue(3, '0');
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);

    } else {
        return false;
    }
}

function selectrepcomentforpost($value)
{
    global $connect;
    $sql = 'SELECT * FROM coment_table WHERE replay=?';
    $result = $connect->prepare($sql);
    $result->bindValue(1, $value);
    $result->execute();
    if ($result->rowCount()) {
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function showadmininfo()
{
    global $connect;
    $sql = 'SELECT * FROM admiv_table';
    $result = $connect->query($sql);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    } else {
        return false;
    }
}

function selectadmininfoforupdate($id)
    {
        global $connect;
        $sql = 'SELECT * FROM admiv_table WHERE id=?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $id);
        $result->execute();
        if ($result->rowCount()) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }

function editeadmin($id)
{
    global $connect;
    if (isset($_POST['btnediteadmin'])) {
        $sql = 'UPDATE admiv_table SET username=?,password=?, WHERE id =?';
        $result = $connect->prepare($sql);
        $result->bindValue(1, $_POST['username']);
        $result->bindValue(2, md5($_POST['password']));
        $result->bindValue(3, $id);
        $result->execute();
        header('location:showadmininfo.php?editeadmin=success');
    }
}
?>