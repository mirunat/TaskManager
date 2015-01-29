<?php 
session_start();
include('dbconnection.php');
include('functions.php');

session_destroy();
header("Location: index.php");
die();
?>