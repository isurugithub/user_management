<?php
// Starting session
session_start();
 
// Removing session data
if(isset($_SESSION['login_user'])){
    unset($_SESSION['login_user']);
}

header("Location: ../index.php");

?>