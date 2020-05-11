<?php
session_start();
if (!isset($_SESSION["userLogin"])){
    echo '<script type="text/javascript">';
    echo ' alert("Please login to continue")';
    echo '</script>';
    header("Location: index.php");


}