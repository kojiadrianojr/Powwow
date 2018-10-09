<?php 
session_start();
session_unset($_SESSION['username']);
session_unset($_SESSION['userid']);
session_destroy();

header('Location: ../admin-login.php');
?>