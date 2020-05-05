// <idcard.js>
//
// Some of this code came from:
//	http://blog.swiftbyte.com/web-development/identify-a-credit-card-using-javascript

function setCardImage()
{
    var img_path, img_Discover, img_Mastercard, img_Visa, img_Amex;
    var ccnumber, cclength;
    var cType;

    // Image variables.
    img_path = "images/cards/";
    img_Visa = "visa";
    img_Mastercard = "mastercard";
    img_Discover = "discover";
    img_Amex = "amex";

    // Sets the credit card number and length variables.
    ccnumber = document.getElementById('txtCardNumber').value;
    cclength = ccnumber.length;

    // Set all images to use the greyscale version.
    document.getElementById('imgVisa').src = img_path + img_Visa + "-grey.gif";
    document.getElementById('imgMc').src = img_path + img_Mastercard + "-grey.gif";
    document.getElementById('imgDisc').src = img_path + img_Discover + "-grey.gif";
    document.getElementById('imgAmex').src = img_path + img_Amex + "-grey.gif";

    // Remove any non numeric charater from the card number string.
    for (var i = 0; i <= cclength; i++)
    {
	ccnumber = ccnumber.replace(/[^0-9*]/, "");
    }

    document.getElementById('txtCardNumber').value = ccnumber;

    // Figure out what type of credit card number was entered.
    cType = getCardType ( ccnumber );

    /* Depending on the returned card type from the getCardType function
       change an image to representing the entered one to a full color image.

       We will also set the card type in the hidden
       field named cardtype for future referance.
    */
    if (cType == "visa")
    {
        document.getElementById('imgVisa').src = img_path + img_Visa + ".gif";
	document.getElementById('hidCardType').value = "Visa";
    }
    else if (cType == "mastercard")
    {
        document.getElementById('imgMc').src = img_path + img_Mastercard + ".gif";
	document.getElementById('hidCardType').value = "Master Card";
    }
    else if (cType == "discover")
    {
        document.getElementById('imgDisc').src = img_path + img_Discover + ".gif";
	document.getElementById('hidCardType').value = "Discover";
    }
    else if (cType == "amex")
    {
	document.getElementById('imgAmex').src = img_path + img_Amex + ".gif";
	document.getElementById('hidCardType').value = "American Express";
    }
    else
    {
        document.getElementById('hidCardType').value = "";
    }
}

// The following function is used to identify the card type.
function getCardType ( num )
{
    var cctype = "";

    // Check for Visa
    if ( num.substring ( 0, 1 ) == '4' )
    {
	if ( ( num.length == '13' ) || ( num.length == '16' ) )
	    return "visa";
    }

    // Check for Mastercard
    if ( ( num.substring ( 0, 2 ) >= '51') && ( num.substring ( 0, 2 ) <= '55' ) )
    {
	if ( num.length == '16' )
	    return "mastercard";
    }

    // Check for Discover
    if ( num.substring ( 0, 4 ) == '6011' )
    {
	if ( num.length == '16' )
	    return "discover";
    }

    // Check for American Express
    if ((num.substring(0, 2) == '34') || (num.substring(0, 2) == '37'))
    {
	if ( num.length == '15' )
	    return "amex";
    }

    // None of the above...
    return "";
}

// </idcard.js>