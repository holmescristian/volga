<?php
require_once ( 'MySqlConn.class.php');
$dbHostname = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbDatabaseName = 'volgaBooks';

$myConn = new MySqlConn ( $dbHostname, $dbUsername, $dbPassword);

$result = $myConn->connect_to_database();
if ( !$result )
    echo "Please Work";
    die ( 'Error connecting to the database' );

$result = $myConn->select_database ( $dbDatabaseName );
if ( !$result )
    echo "Please Work 2";
    die ( 'Error selecting to the database' );

$queryString = 'SELECT * FROM tblGenres ORDER BY genreName;';
$myConn->set_query_string ( $queryString );
$result = $myConn->execute_query();
if ( !$result )
    die ( 'The query failed for some reason' );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Example page showing connection object usage</title>
<style type="text/css">
#genreBox
{
    position: absolute;
    top: 20px;
    left: 20px;
    width: 200px;
    height: 400px;
    padding: 1em;
    background-color: #CCFFCC;
	color: #09881C;
    font-family: Arial,Helvetica,sans-serif;
}
.heading
{
    font-weight: bold;
    font-size: large;
}
.bookGenre
{
    font-weight: normal;
    font-size: x-small;
}
</style>
</head>
<body>
<div id="genreBox">
<p class="heading">Genres</p>
<p class="bookGenre">
<?php
$myRow = $myConn->get_first_result ( RETURN_ASSOC_ARRAY );
$num_rows = $myConn->get_number_of_returned_rows();
for ( $i=1 ; $i<=$num_rows ; $i++ )
{
    echo $myRow['genreName'] . '<br />';
    $myRow = $myConn->get_next_result ( RETURN_ASSOC_ARRAY );
}
?>
</p>
</div>
</body>

</html>
