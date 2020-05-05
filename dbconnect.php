<?php

require_once 'resources.php';

$link = mysqli_connect( $host, $user, $password, $db);

if ( mysqli_connect_errno() ){
    echo $host;
}