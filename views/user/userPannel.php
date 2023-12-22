<?php
session_start();
if(isset($_SESSION['role']) &&  $_SESSION['role']!='2'){
    header("Location: login.php");
}
include(__DIR__ . '/../../includes/sidebarUser.php');
include(__DIR__ . '/../../app/models/Book.php');