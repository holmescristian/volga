<?php
session_start();
require_once 'resources.php';
require_once  'dbconnect.php';

$required = array("txtEmail","txtPassword");
// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    } else {
        $_POST[$field];
    }
}
// safe
if ($error) {
    echo '<script type="text/javascript">';
    echo ' alert("There was a problem logging in please try again")';  //not showing an alert box.
    echo '</script>';
    header("Location: index.php");
} else {
    $values = "( ";
    foreach($required as $field) {
        if ($field === "txtLastName"){
            $values = $values."\"".$_POST[$field]."\")";
        } else {
            $values = $values."\"".$_POST[$field]."\", ";
        }
    }
    $query = "SELECT * FROM tblUser WHERE email="."\"".strtolower($_POST["txtEmail"])."\" AND "."password=\"".$_POST["txtPassword"]."\"";

    if ($result = mysqli_query($link, $query)) {
        $arr = mysqli_fetch_assoc( $result);
        $_SESSION["userLogin"] = $arr["id"];
        header("Location: index.php");

    } else {
        echo '<script type="text/javascript">';
        echo ' alert("There was a problem logging in please try again")';  //not showing an alert box.
        echo '</script>';
        header("Location: index.php");
    }
}