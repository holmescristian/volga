// <formhelpers.js>

/*
 * ----------------------------------------------------------------------------
 * The functions in this script are designed to help manage any form
 * that is being used in Volga.
 * ----------------------------------------------------------------------------
 */

var expyears = new Array();
var months = new Array (
    "01 - January", "02 - February", "03 - March", "04 - April",
    "05 - May", "06 - June", "07 - July", "08 - August", "09 - September",
    "10 - October", "11 - November", "12 - December" );
var states = new Array (
    "Alabama","Alaska","Arizona","Arkansas","California","Colorado",
    "Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho",
    "Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine",
    "Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey",
    "New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma",
    "Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota",
    "Tennessee","Texas","Utah","Vermont","Virginia","Washington",
    "West Virginia","Wisconsin","Wyoming" );

/*
 * setupForm() - The main function called as the onload event handler for the
 * body of the document.  Calls helper functions to set up states, months and
 * expiration dates for the credit card.
 */
function setupForm()
{
    var retval = addStates();
    if ( retval == false )
	alert ( "An error occured while loading the page.\n\n" +
                "A JavaScript could not run properly. An" +
	        "attempt will be made to continue..." );

    retval = addMonths();
    if ( retval == false )
	alert ( "An error occured while loading the page.\n\n" +
                "A JavaScript could not run properly. An" +
	        "attempt will be made to continue..." );
    
    retval = addYears();
    if ( retval == false )
	alert ( "An error occured while loading the page.\n\n" +
                "A JavaScript could not run properly. An" +
	        "attempt will be made to continue..." );
}

/*
 * addStates() - Function that adds <option>statename</option> to the state
 * dropdown box in the form.
 *
 * Returns false if it cannot add the states to the states dropdown box, true
 * otherwise.
 */
function addStates()
{
    var stateDropdown = document.getElementById ( "selState" );
    if ( stateDropdown == null )
	return false;

    // Remove the placeholder <option>
    var nodeToRemove = document.getElementById ( "placeholder1" );
    if ( nodeToRemove != null )
	stateDropdown.removeChild ( nodeToRemove );

    // For each state in the states array, make a new <option>statename</option>
    for ( var state in states )
    {
	var newOption = document.createElement ( "option" );
	newOption.appendChild ( document.createTextNode ( states[state] ) );
	stateDropdown.appendChild ( newOption );
    }

    return true;
}

function addMonths()
{
    var monthDropdown = document.getElementById ( "selExpMonth" );
    if ( monthDropdown == null )
	return false;

    // Remove the placeholder <option>
    var nodeToRemove = document.getElementById ( "placeholder2" );
    if ( nodeToRemove != null )
	monthDropdown.removeChild ( nodeToRemove );

    // For each state in the states array, make a new <option>statename</option>
    for ( var month in months )
    {
	var newOption = document.createElement ( "option" );
	newOption.appendChild ( document.createTextNode ( months[month] ) );
	monthDropdown.appendChild ( newOption );
    }

    return true;
}

function addYears()
{
    var yearDropdown = document.getElementById ( "selExpYear" );
    if ( yearDropdown == null )
	return false;

    // Remove the placeholder <option>
    var nodeToRemove = document.getElementById ( "placeholder3" );
    if ( nodeToRemove != null )
	yearDropdown.removeChild ( nodeToRemove );

    var myDate = new Date();
    var thisYear = parseInt ( myDate.getFullYear() );

    for ( var i=0 ; i<5 ; i++ )
    {
	var newOption = document.createElement ( "option" );
	newOption.appendChild ( document.createTextNode ( thisYear + i ) );
	yearDropdown.appendChild ( newOption );
    }

    return true;
}

function checkForm()
{
    var retval = true;

    // Make sure all the required fields are filled in
    if ( document.frmRegister.txtEmailAddress.value == "" )
    {
	flagError ( document.getElementById ( "txtEmailAddress" ) );
	retval = false;
    }

    return retval;
}

function flagError ( element )
{
    // Get the parent node
    var parent = element.parentNode;

    // Add a span to flag the error
    var newSpan = document.createElement ( "span" );
    newSpan.className = "required";
    newSpan.appendChild ( document.createTextNode ( " Required Field " ) );
    parent.appendChild ( newSpan );
}

// </formhelpers.js>
