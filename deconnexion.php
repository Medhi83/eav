<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['pass']);
//session_unset();
//session_destroy();
header('Location: '.$_SERVER['HTTP_REFERER']);
exit();
