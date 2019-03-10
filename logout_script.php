<?php

include "common.php";
if (!isset($_SESSION['email'])) {
header('location: index.php');
}

session_unset();
session_destroy();
header('location: index.php');
?>