<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['id']);
unset($_SESSION['login']);

setcookie('login', '', time() - 10); //удаляем логин
setcookie('key', '', time() - 10); //удаляем ключ

header("location: ../login.php");