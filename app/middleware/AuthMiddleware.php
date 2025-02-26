<?php
ob_start(); // Start output buffering


if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    exit;
} 
ob_end_flush(); // Flush the output buffer
?>
