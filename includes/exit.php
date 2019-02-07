<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['id']);
unset($_SESSION['login']);

setcookie('login', '', time() - 10);
setcookie('key', '', time() - 10); 
header("location: ../login.php");