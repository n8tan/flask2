<?php
session_start();
    unset($_SESSION['user']); //Unset the variable.
    header("location: index.php");
    exit();
?>