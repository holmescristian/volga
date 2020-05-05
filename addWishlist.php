<?php
session_start();
require_once 'resources.php';
require_once  'dbconnect.php';
//$queries = array();
//parse_str($_SERVER['QUERY_STRING'], $queries);

if ($_POST["submit" == "Add to Wishlist"]){
    $query = "INSERT INTO tblUserFavorites VALUES (".$_SESSION["userLogin"].", ".$_POST["isbn"].")";
} else {
    $query = "DELETE FROM tblUserWishlist WHERE id=".$_SESSION["userLogin"]." AND isbn='".$_POST["isbn"]."'";
}

print_r($_POST);
echo "<br>";
echo $query;
if (mysqli_query($link, $query)){
  //  header("Location: getBook.php?isbn=".$_POST["isbn"]);
}