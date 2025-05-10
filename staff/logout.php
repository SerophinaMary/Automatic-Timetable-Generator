<?php 
session_start();
unset($_SESSION['teacher_id']);
unset($_SESSION['name']);
session_destroy();
header('location:index.php');

?>