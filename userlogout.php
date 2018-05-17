<?php include 'header.php'?>

<?php 
session_start();

if (isset($_SESSION['websiteUser'])){
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id();
}
    
header('Location: userlogin.php');
?>

<?php include 'footer.php'?>