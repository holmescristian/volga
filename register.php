<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>VOLGA - V1.0.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
.alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
}

/* The close button */
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
    color: black;
}
</style>
<![endif]-->
<script type="text/javascript" src="idcard.js"></script>
<script type="text/javascript" src="showhelp.js"></script>
<script type="text/javascript" src="formhelpers.js"></script>

</head>

<body class="thrColFixHdr" onload="setupForm()">

<div id="container">
  
  <!-- begin #header -->
  <div id="header">
    <h1><img src="images/800px-Stalingrad1942Volga.gif" alt="Welcome to Volga" height="124" width="750" /></h1>
  </div>
  <!-- end #header -->
  
  <!-- end #sidebar1 -->
  <div id="sidebar1">
    <h3>Instructions</h3>
    <h4 id="helpTitle">Input Tip Area</h4>
    <p id="helpText">Look for helpful hints on what to type in the form here.</p>
  </div>
  <!-- end #sidebar1 -->
  

  <!-- begin #mainContent -->
  <div id="mainContentReg">
    <h1> NEW USER REGISTRATION</h1>
    <p>
Use the form below to register. When you register, you will receive our
free monthy newsletter and occational emails with book suggestions we
think you will find interesting.</p>
<p><span class="redText">* </span>
The items marked with a star are required for registration.</p>
<p>When you are finished, click the "register" button at the bottom of
the page.<br />
</p>
<p><span class="redText xsmallText"><b>
Note: Unfortunately, we can only accept registrations from the United States
at this time.  We apologize for the inconvenience.
</b></span></p>

<br />

<form action="registerAction.php" name="frmRegister" method="post">
  <table style="text-align: left; width: 100%" border="0" cellpadding="2" cellspacing="2">
    <tbody>

      <!-- Account ID & Password -->

      <tr>
        <td colspan="2" style="vertical-align: top;">
          <h3>Account ID &amp; Password</h3>
          <hr class="h3underline" />
	</td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Email Address:</td>
        <td style="vertical-align: top;">
	  <input name="txtEmailAddress" id="txtEmailAddress"
		 onfocus="showHelp('emailaddress')"
	         type="text" maxlength="64" size="16" tabindex="1"  />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Confirm Email Address:</td>
        <td style="vertical-align: top;">
	  <input name="txtConfirmEmailAddress" id="txtConfirmEmailAddress"
		 onfocus="showHelp('confirmemailaddress')"
	         type="text" maxlength="64" size="16" tabindex="2" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Password:</td>
        <td style="vertical-align: top;">
	  <input name="txtPassword" id="txtPassword"
		 onfocus="showHelp('password')"
	         type="password" maxlength="64" size="16" tabindex="3" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Confirm Password:</td>
        <td style="vertical-align: top;">
	  <input name="txtConfirmPassword" id="txtConfirmPassword"
		 onfocus="showHelp('confirmpassword')"
	         type="password" maxlength="64" size="16" tabindex="4" />
	  <span class="redText"> *</span>
        </td>
      </tr>

      <!-- User Information -->

      <tr>
        <td colspan="2" style="vertical-align: top;">
          <h3>User Information</h3>
          <hr class="h3underline" />
	</td>
      </tr>
      <tr>
        <td style="vertical-align: top;">First Name:</td>
        <td style="vertical-align: top;">
	  <input name="txtFirstName" id="txtFirstName"
	         type="text" maxlength="32" size="16" tabindex="5" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Last Name:</td>
        <td style="vertical-align: top;">
	  <input name="txtLastName" id="txtLastName"
	         type="text" maxlength="64" size="16" tabindex="6" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Address:</td>
        <td style="vertical-align: top;">
	  <input name="txtAddress" id="txtAddress"
	         type="text" maxlength="64" size="16" tabindex="7" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">City:</td>
        <td style="vertical-align: top;">
	  <input name="txtCity" id="txtCity"
	         type="text" maxlength="64" size="16" tabindex="9" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">State:</td>
        <td style="vertical-align: top;">
          <select name="selState" id="selState" tabindex="10">
	      <option id="placeholder1">--</option>
	  </select>
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Zip Code:</td>
        <td style="vertical-align: top;">
	  <input name="txtZipCode" id="txtZipCode"
	         type="text" maxlength="10" size="10" tabindex="11" />
	  <span class="redText"> *</span>
        </td>
      </tr>

      <!-- Billing Information -->

      <tr>
        <td colspan="2" style="vertical-align: top;">
          <h3>Billing Information</h3>
          <hr class="h3underline" />
	</td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Card Number:</td>
        <td style="vertical-align: top;">
	  <input name="txtCardNumber" id="txtCardNumber" onblur="setCardImage()"
	         type="text" maxlength="16" size="16" tabindex="12" />
	  <img id="imgVisa" src="images/cards/visa-grey.gif" alt="Visa" width="34" height="23" />
	  <img id="imgMc" src="images/cards/mastercard-grey.gif" alt="Mastercard" width="38" height="23" />
	  <img id="imgDisc" src="images/cards/discover-grey.gif" alt="Discover" width="30" height="19" />
	  <img id="imgAmex" src="images/cards/amex-grey.gif" alt="American Express" width="37" height="23" />
	  <input name="hidCardType" id="hidCardType"type="hidden" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Cardholder Name:</td>
        <td style="vertical-align: top;">
	  <input name="txtCardholderName" id="txtCardholderName"
	         type="text" maxlength="128" size="16" tabindex="13" />
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">Exp. Date:</td>
        <td style="vertical-align: top;">
          <select name="selExpMonth" id="selExpMonth" tabindex="14">
            <option id="placeholder2">--</option>
          </select>
          <select name="selExpYear" id="selExpYear" tabindex="15">
            <option id="placeholder3">--</option>
          </select>
	  <span class="redText"> *</span>
        </td>
      </tr>
      <tr><td colspan="2">&nbsp</td></tr>
      <tr><td colspan="2">&nbsp</td></tr>
      <tr>
	  <td colspan="2" align="center">
	  <input type="submit" value="Register"  />
	  <input type="reset" value="Clear" />
	</td>
      </tr>
    </tbody>
  </table>
  <p><br class="clearfloat" />
  
  <!-- begin #footer -->
  </p>
</form>

  </div>
  <div id="footer">
    <p>About Us | Site Map | New Arrivals | News</p>
  </div>
  <!-- end #footer -->

</div>
<!-- end #container -->

</body></html>

<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
if ($queries["register"] == "failed"){
    echo '<script type="text/javascript">';
    echo ' alert("There was a problem registering please try again")';  //not showing an alert box.
    echo '</script>';
}
?>