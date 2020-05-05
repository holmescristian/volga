// <showhelp.js>

/*
 * ----------------------------------------------------------------------------
 * The functions in this script are designed to show the help tips in a
 * "tip area".  These scripts assume the "tip area" is called "sidebar1"
 * ----------------------------------------------------------------------------
 */

/*
 * showHelp() - This function is called to add helpful tips to the "tip area".
 *
 * Parameter(s)
 * field - (string) A string that identifies the input textbox that help is
 *         being printed for.
 */
function showHelp ( field )
{
    // Get the parent node
    var sb1 = document.getElementById ( "sidebar1" );

    // Make sure the nodes have not already been added
    ensureEmpty ( sb1 );

    // Based on the field, fill in the help text
    var ti;	// Title shown in tip area
    var tx;	// Text shown in tip area
    switch ( field )
    {
	case "emailaddress":
	    ti = "Email Address";
	    tx = "Your email address is used as your user login identifier. " +
		     "Type in your email address in the field provided."
	    addNodes ( sb1, ti, tx );
	    break;

	case "confirmemailaddress":
	    ti = "Confirm Email Address";
	    tx = "To make sure you typed your email address correctly, " +
		     "type it again in this field.";
	    addNodes ( sb1, ti, tx );
	    break;

	case "password":
	    ti = "Password";
	    tx = "To make your new account secure, enter a password in the " +
		     "password field.";
	    addNodes ( sb1, ti, tx );
	    break;

	case "confirmpassword":
	    ti = "Password";
	    tx = "To make sure you typed your password correctly, " +
		     "type it again in this field.";
	    addNodes ( sb1, ti, tx );
	    break;

	// TODO: Put the other fields here...

	default:
	    ti = "Input Tip Area";
	    tx = "Look for helpful hints on what to type in the form here.";
	    addNodes ( sb1, ti, tx );
	    break;
    }
}

function ensureEmpty ( parentNode )
{
    if ( document.getElementById("helpTitle") != null )
	parentNode.removeChild ( document.getElementById ( "helpTitle" ) );

    if ( document.getElementById("helpText") != null )
	parentNode.removeChild ( document.getElementById ( "helpText" ) );
}

function addNodes ( parentNode, title, text )
{
    // Create the 2 new elements
    var newH4 = document.createElement ( "h4" );
    newH4.id = "helpTitle";
    newH4.appendChild ( document.createTextNode ( title ) );
    parentNode.appendChild ( newH4 );

    var newP  = document.createElement ( "p" );
    newP.id = "helpText";
    newP.appendChild ( document.createTextNode ( text ) );
    parentNode.appendChild ( newP );

}