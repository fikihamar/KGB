<?php

session_start();

if (!isset($_SESSION['username'])) {

    header('location:login.php');
} else {
    header('location:admin/index.php');
}
include 'config/connection.php';
