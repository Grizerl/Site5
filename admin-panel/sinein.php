<?php
session_start();
require_once './connect.php';

$name = $_POST['Username'];
$password = $_POST['Password'];
$password = md5($password);
$user= mysqli_query($connect, "SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'");

if (mysqli_num_rows($user) > 0) {
    $_SESSION['message'] = "Ви увійшли в акаунт";
    header("Location:../index.php");
} else {
    $_SESSION['message'] = "Невірні дані";
    header("Location:../inc/login.php");
}
?>
