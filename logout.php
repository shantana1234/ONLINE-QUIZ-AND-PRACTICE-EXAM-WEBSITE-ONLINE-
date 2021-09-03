<?php session_start() ?>
<?php
$_SESSION['username'] = null;
$_SESSION['email'] = null;
$_SESSION['phone'] = null;    
    
header("Location: ..//project 2/home.php");
    
?>