<?php

// Global variables
// ----------------
$dbhost = "127.0.0.1";
$dbusername = "root";
$dbuserpassword = "root";
$default_dbname = "volgaBooks";

$MYSQL_ERRNO = '';
$MYSQL_ERROR = '';

function db_connect()
{
   global $dbhost, $dbusername, $dbuserpassword, $default_dbname;
   global $MYSQL_ERRNO, $MYSQL_ERROR;

   $link_id = mysql_connect ( $dbhost, $dbusername, $dbuserpassword );
   if ( !link_id )
   {
      $MYSQL_ERRNO = 0;
	  $MYSQL_ERROR = "Connection failed to host: $dbhost.";
	  return 0;
   }
   else if ( empty ( $dbname ) &&
             !mysql_select_db ( $default_dbname ) )
   {
      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();
	  return 0;
   }
   else
      return $link_id;
}

function sql_error()
{
   global $MYSQL_ERRNO, $MYSQL_ERROR;

   if ( empty ( $MYSQL_ERROR ) )
   {
      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();
   }
   return "$MYSQL_ERRNO: $MYSQL_ERROR";
}

function error_message ( $msg )
{
   html_header();
   echo "<script>";
   echo "alert ( \"Error: $msg\" );";
   echo "history.go(-1);";
   echo "</script>";
   html_footer();
   exit;
}

?>
