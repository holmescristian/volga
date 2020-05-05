<?php
session_start();
if (!isset($_SESSION["userLogin"])){
    header("Location: index.phph");
    echo '<script type="text/javascript">';
    echo ' alert("Please login to continue")';  //not showing an alert box.
    echo '</script>';
}