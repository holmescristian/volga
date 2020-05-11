<?php
//header("Location: index.php");
require_once 'checkLogin.php';
require_once 'resources.php';
require_once  'dbconnect.php';
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VOLGA - V1.0.0</title>
    <link href="thrColFixHdr.css" rel="stylesheet" type="text/css" />
    <!--[if IE 5]>
    <style type="text/css">
        /* place css box model fixes for IE 5* in this conditional comment */
        .thrColFixHdr #sidebar1 { width: 180px; }
        .thrColFixHdr #sidebar2 { width: 190px; }
    </style>
    <![endif]--><!--[if IE]>
    <style type="text/css">
        /* place css fixes for all versions of IE in this conditional comment */
        .thrColFixHdr #sidebar2, .thrColFixHdr #sidebar1 { padding-top: 30px; }
        .thrColFixHdr #mainContent { zoom: 1; }
        /* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
    </style>
    <![endif]-->
</head>

<body class="thrColFixHdr">

<div id="container">

    <!-- begin #header -->
    <div id="header">
        <h1><img src="images/800px-Stalingrad1942Volga.gif" width="750" height="124" alt="Welcome to Volga" /></h1>
    </div>
    <!-- end #header -->

    <!-- end #sidebar1 -->
    <div id="sidebar1">
        <h3>Categories</h3>
        <?php
        $query = "SELECT * FROM tblGenres";
        if ( $result = mysqli_query($link, $query) ) {

            while( $arr = mysqli_fetch_assoc( $result)) {

                echo "<a style='color:#000000 ' href='booksByGenre.php?genre=".urlencode($arr["genreName"])."'>".$arr["genreName"]."</a>";
                echo "<br>";
            }
        }
        ?>
        </tbody>
        </table>

    </div>
    <!-- end #sidebar1 -->

    <!-- begin #sidebar2 -->
    <?php
    if (!isset($_SESSION["userLogin"])) {
        ?>
        <div id="sidebar2">
            <h3><a href="index.php">Home</a></h3>
            <h3 class="xsmallText">Site Search</h3>
            <p class="xxsmallText">Type your search criteria in the box below and click &quot;Search&quot;</p>
            <form id="frmSearch" name="frmSearch" method="post" action="">
                <label>
                    <input name="txtSearchSite" type="text" class="xsmallText" id="txtSearchSite" size="20" />
                </label>
                <label>
                    <input name="btnSearchSubmit" type="submit" class="xsmallText" id="btnSearchSubmit" value="&gt;" />
                </label>
            </form>
            <br />
            <hr />
            <h3 class="xsmallText">Customer Login</h3>
            <p class="xxsmallText">Before you can use our Web site, you need an account.
                If you already have an account, login below. If not, <a href="register.php">click here</a>.</p>
            <form id="frmLogin" name="frmLogin" method="post" action="">
                <p><span class="xsmallText">Username</span><br />
                    <input name="txtUsername" type="text" class="xsmallText" id="txtUsername" /></p>
                <p><span class="xsmallText">Password</span><br />
                    <input name="txtPassword" type="password" class="xsmallText" id="txtPassword" /></p>
            </form>
            <hr />
            <p class="smallText">
                <a href="http://www.naxosaudiobooks.com/">
                    <img src="images/ads/naxosaudiobooks.gif" alt="Ad: Naxos Audiobooks" width="138" height="170" border="0" />
                </a>
            </p>
        </div>
        <?php
    } else {
        $query = "SELECT * FROM tblUser WHERE id=".$_SESSION["userLogin"];
        ?>
        <div id="sidebar2">
            <h3><a href="index.php">Home</a></h3>

            <h3 class="xsmallText">Site Search</h3>
            <p class="xxsmallText">Type your search criteria in the box below and click &quot;Search&quot;</p>
            <form id="frmSearch" name="frmSearch" method="post" action="">
                <label>
                    <input name="txtSearchSite" type="text" class="xsmallText" id="txtSearchSite" size="20" />
                </label>
                <label>
                    <input name="btnSearchSubmit" type="submit" class="xsmallText" id="btnSearchSubmit" value="&gt;" />
                </label>
            </form>
            <br />
            <hr />
            <?php
            if ( $result = mysqli_query($link, $query) ) {
                $arr = mysqli_fetch_assoc( $result);
                echo "<h3 class=\"xsmallText\">Welcome ".$arr["fName"]." ".$arr["lName"]."</h3>";
                echo "<a href='userProfile.php'>User Profile</a>";
                echo "<br>";
                echo "<a href='logoutAction.php'>Logout</a>";
            }
            ?>
            <hr />
            <p class="smallText">
                <a href="http://www.naxosaudiobooks.com/">
                    <img src="images/ads/naxosaudiobooks.gif" alt="Ad: Naxos Audiobooks" width="138" height="170" border="0" />
                </a>
            </p>
        </div>
        <?php
    }
    ?>
    <!-- end #sidebar2 -->

    <!-- begin #mainContent -->
    <div id="mainContent">
        <?php
        $genre = $queries['genre'];
        $query = "SELECT
	tblBooks.*
FROM
	tblBooksGenresXref genreXref
INNER JOIN tblBooks ON tblBooks.isbn = genreXref.isbn
INNER JOIN tblGenres ON tblGenres.genreId = genreXref.genreId
WHERE tblGenres.genreName = \"$genre\"";
        if ( $result = mysqli_query($link, $query) ) {
        ?>
        <table border ="1">
            <thead>
            <th>Cover</th>
            <th>Title</th>
            <th>Price</th>

            </thead>
            <tbody>
            <?php
            while( $arr = mysqli_fetch_assoc( $result)) {
                echo "<tr>";
                echo "<td><img src=\"books/".$arr["imageFilename"]."\" </td>";
                echo "<td><a href='getBook.php?book=".$arr["isbn"]."'>".$arr["title"]."</a></td>";
                echo "<td>{$arr["price"]}</td>";
                echo "</tr>";
            }
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- end #mainContent -->

    <!-- This clearing element should immediately follow the #mainContent div in order
         to force the #container div to contain all child floats -->
    <br class="clearfloat" />

    <!-- begin #footer -->
    <div id="footer">
        <p>About Us | Site Map | New Arrivals | News</p>
    </div>
    <!-- end #footer -->

</div>
<!-- end #container -->
</body>
</html>
<?php
require_once  'dbdisconnect.php';
?>
