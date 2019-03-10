<?php
include "common.php";
if (isset($_SESSION['email'])) {
header('location: products.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Navbar in Bootstrap</title>
    </head>
    <body>
       <?php
        include 'header.php';
        ?><br><br>
              <?php
              $user_id=$_SESSION['id'];
              $select_query = "SELECT items.name,items.price,users_items.item_id FROM users_items,items WHERE  user_id ='$user_id' and users_items.item_id=items.id";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));

if(mysqli_num_rows($select_query_result) == 0){
    header('location: products.php?items_error=add items');
}
else{
    $sum=0;
    while ($row = mysqli_fetch_array($select_query_result)) {
        $sum=$sum+$row['price'];
   
    }
    
}
              
             
           
              
 <?php
        include 'footer.php';
        ?>
    </body>
</html>