<?php
include 'admin/includ/init.php';
session_unset();
session_destroy();
header('location:user.php');
?>