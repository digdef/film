<?php
session_start();
unset($_SESSION['logget_user']);

setcookie('login', '', time()); //удаляем логин
setcookie('key', '', time()); //удаляем ключ

header("location: ../registration.php");