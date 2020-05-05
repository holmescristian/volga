<?php
session_start();
require_once 'resources.php';
require_once  'dbconnect.php';

$required = array("txtEmailAddress","txtConfirmEmailAddress","txtPassword","txtConfirmPassword","txtFirstName","txtLastName","txtAddress","txtCity","selState","txtZipCode");
$userFields = array("txtEmailAddress","txtPassword","txtFirstName","txtLastName");
$locationFields = array("txtAddress","txtCity","selState","txtZipCode");
// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    } else {
        $_POST[$field];
    }
}
if ($_POST["txtEmailAddress"] != $_POST["txtConfirmEmailAddress"] ){
    $error = true;
}

if ($_POST["txtPassword"] != $_POST["txtConfirmPassword"] ){
    $error = true;
}
$address = stripslashes ( $_POST["txtEmailAddress"] );
if (!filter_var($address, FILTER_VALIDATE_EMAIL)){
    $error = true;

}
// safe
if ($error) {
    header("Location: register.php?register=failed");
} else {
    $values = "( ";
    foreach($userFields as $field) {
        if ($field === "txtLastName"){
            $values = $values."\"".$_POST[$field]."\")";
        } else if ($field == "txtEmailAddress") {
            $values = $values."\"".strtolower($_POST[$field])."\", ";
        } else{
            $values = $values."\"".$_POST[$field]."\", ";
        }
    }
    $query = "INSERT INTO tblUser (email, password, fName, lName) VALUES ".$values;

    if (mysqli_query($link, $query)) {
        echo "NEW USER <br>";
        $last_id = mysqli_insert_id($link);
        $query = "INSERT INTO tblAddress VALUES ";
        $values = "( ".$last_id.", ";
        foreach($locationFields as $field) {
            if ($field === "txtZipCode"){
                $values = $values."\"".$_POST[$field]."\")";
            } else {
                $values = $values."\"".$_POST[$field]."\", ";
            }
        }
        $query = "INSERT INTO tblAddress VALUES ".$values;
        echo $query;
        if (mysqli_query($link, $query)){
            session_start();
            $_SESSION["userLogin"] = $last_id;
            header("Location: index.php");
        }
    } else {
        header("Location: register.php?register=failed");
    }
}