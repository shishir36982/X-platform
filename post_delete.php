<?php
include 'common.php';
$a=$_GET['id'];

mysqli_query($con,"DELETE FROM threads WHERE th_id='$d' LIMIT 1");
mysqli_query($con,"DELETE FROM replies WHERE th_id='$a' ");
redirect('index3.php');?>
