<?php
session_start();

$_SESSION["username"] = null;
$_SESSION['errorMessage'] = null;
header('location:../index.php');

?>