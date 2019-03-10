<?php
include "common.php";

require_once __DIR__ . '/vendor/autoload.php';

$myOptions = array('strictness' => 'permissive', 'also_check' => array('foobar','bhenchod','madarchod'));
$filter = new \JCrowe\BadWordFilter\BadWordFilter($myOptions);
$c_id=$_REQUEST['c_id'];

$result1 = mysqli_query($con,"SELECT * FROM logs  where c_id='$c_id' ORDER BY id DESC");





while($extract = mysqli_fetch_array($result1)) {
			$id=$extract['u_id'];
	  $cleanString = $filter->clean($extract['msg']);
			echo "<a href=profile.php?id=$id>" . $extract['username'] . "</a> : <span>" . $cleanString. "</span><br />";

}
