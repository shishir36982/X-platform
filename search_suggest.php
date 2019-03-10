<?php

//CREDENTIALS FOR DB
include "common.php";

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = mysqli_query ("SELECT * FROM threads WHERE threads.title LIKE '%{$query}%' ");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['createdby'],
            'value' => $row['title'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>
