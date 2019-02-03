<?php
session_start();
unset($_SESSION['logget_user']);

setcookie('login', '', time() - 10); //удаляем логин
setcookie('key', '', time() - 10); //удаляем ключ

header("location: ../registration.php");