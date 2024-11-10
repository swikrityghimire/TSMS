<?php
@include 'config.php';

session_start();
session_unset();
session_destroy();
$_SESSION['lin'] = 'lin';
header('location:login_form.php');

?>