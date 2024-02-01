<?php
session_start();
require_once("./connect.php");
$username = $_POST['Username'];
$email = $_POST['Email_Address'];
$password = $_POST['Password'];
$confirm_password = $_POST['Confirm_Password'];

if ($username == "" && $email == "" && $password == "" && $confirm_password == "") {
    $_SESSION['message'] = "Введіть дані для вводу";
    header('Location:../inc/register.php');
} else {
    if (strlen($username) >= 8 && strlen($username) <= 12 && preg_match('/[a-z]/', $username) && preg_match('/[A-Z]/', $username)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 12) {
            if ($password == $confirm_password) {
                $username = mysqli_real_escape_string($connect, $username);
                $email = mysqli_real_escape_string($connect, $email);
                $password = mysqli_real_escape_string($connect, $password);
                $confirm_password = mysqli_real_escape_string($connect, $confirm_password);

                $password = md5($password);
                mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (NULL, '$username', '$email', '$password')");

                $_SESSION['message'] = 'Ви успішно зареєструвались';
                header('Location:../inc/login.php');
            } else {
                $_SESSION['message'] = 'Паролі не співпадають';
                header('Location:../inc/register.php');
            }
        } else {
            $_SESSION['message'] = "Неправильно введено email";
            header('Location:../inc/register.php');
        }
    } else {
        $_SESSION['message'] = "Ім'я користувача повинно бути від 8 до 12 символів і містити як мінімум одну велику та одну малу літеру";
        header('Location:../inc/register.php');
    }
}
?>
