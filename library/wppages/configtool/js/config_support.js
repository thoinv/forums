//<![CDATA[
//----------------------------------------------------------------------------------------------------------------------------
//import_support.js     Support functions for the javascript used on mulitple pages
//called by:        	index.html	
//version:				0.1
//----------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------
//GLOBALS :: should act as static vars due to being an included file
//----------------------------------------------------------------------------------------------------------------------------
var DebugMode = true;       //set to true or false to see or hide the alert boxes.
var bt = new Array(); 		//holds all the xmlHttp requests in an organized array

//----------------------------------------------------------------------------------------------------------------------------
//ErrorHandler: Global Error Handler for all the javascript code
//called by:    all .js fx
//inputs:       error object
//outputs:      alert box if in debug mode -- else silenty fails
//
//----------------------------------------------------------------------------------------------------------------------------
function ExceptionHandler(e,str_AdditionalMessage)
{
  if(str_AdditionalMessage===undefined){str_AdditionalMessage=".";}
  if(DebugMode)
  {
  	var ParseError = "fx " + e.constructor + "  generated an error \n" + e.name + " :: " + e.message + "\n Line: " + e.lineNumber + " FileName: " + e.fileName;
  	ParseError = ParseError + "\n\n" + str_AdditionalMessage;
	alert(ParseError);
	throw (null);
  }
  else
  {
      throw("An unanticipated error occured");
  }
}
//----------------------------------------------------------------------------------------------------------------------------
//isString:     Return a boolean value telling whether the first argument is a string.
//----------------------------------------------------------------------------------------------------------------------------
function isString(str_ck){return(typeof str_ck == 'string');}
//----------------------------------------------------------------------------------------------------------------------------
//
//----------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------
//called by:        index.php/form
//calls:            GetFeeds(request number, div id to place results, file to fetch)
//----------------------------------------------------------------------------------------------------------------------------
function GetHtmlNextStep(pagetype)
{
	try
	{
		var step = document.getElementById("nextStep").value;
		var nextStep 	= "themes/step_" + step +"." + pagetype;
		document.getElementById("userinput").innerHTML = "";
		GetFeeds(2,"userinput",nextStep);
		document.getElementById("feedback").innerHTML = "&nbsp;";
		UpdateLeftMenu(step);
	}		
	catch (e) 
	{
	    ExceptionHandler(e);
	}
}
//----------------------------------------------------------------------------------------------------------------------------
//AssignImport:		afte the user submits the form fetch a page
//called by:        index.php/form
//uses:             
//calls:            GetFeeds(request number, div id to place results, file to fetch)
//----------------------------------------------------------------------------------------------------------------------------
function AssignImport()
{
	try
	{
		document.getElementById("feedback").innerHTML = "Submitted....";
		var qrystring = "?";
		var runStep = document.getElementById("runStep").value;
		var userform = document.getElementById("frmUserInput");
		for(var ctr=0; ctr<userform.length; ctr++)
		{
			if(userform.elements[ctr].type=="text" || userform.elements[ctr].type=="password" || userform.elements[ctr].type=="select-one")
			{
				qrystring = qrystring + userform.elements[ctr].name + "=" + userform.elements[ctr].value + "&" ;
			}
		}
		qrystring = runStep + qrystring + "filler=TRUE";
		//alert(qrystring);
		GetFeeds(1,"feedback",qrystring); 					//xhtml request for the file
	}
	catch (e) 
	{
	    ExceptionHandler(e);
	}
}
function UpdateLeftMenu(runStep)
{
	try
	{
		var newclass = "inactive";
		var highlight = "active";
		
		for(var ctr=1; ctr<=6; ctr++)
		{
			idMenu = "lmenu_" + ctr;
			document.getElementById(idMenu).className = newclass;
		}
		idMenu = "lmenu_" + runStep;
		document.getElementById(idMenu).className = highlight;
		document.getElementById("stepid").innerHTML = runStep;
	}
	catch (e) 
	{
	    ExceptionHandler(e);
	}
}

//------------------------------------------------------------------------------------------------------------------------------
//GetFeeds:			xml requests to get the .html for the divs
//called by:        UserSubmit()
//passing in:       request number, div id to place results, file to fetch, new class name for the div
//uses:             var bt								//array to hold all the xml feed requests
//calls:            XML request
//outputs:          html - showing the results of the importer
//
//------------------------------------------------------------------------------------------------------------------------------
function GetFeeds(requestnum,iddiv,htmlfile,newclass) 
{
	try 
	{	
		var divTemp = document.getElementById(iddiv); 
		if(divTemp == null){throw new Error("Div not found");}
		if(window.XMLHttpRequest)
		{
			bt[requestnum] = new XMLHttpRequest(); // code for Firefox, Opera, IE7, etc.
			
		}
		else if (window.ActiveXObject)
		{
			bt[requestnum] = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
		}
		if (bt[requestnum] != null) 
		{
			bt[requestnum].onreadystatechange = function() 
			{
				if(bt[requestnum].readyState == 4)
				{
					if (bt[requestnum].status == 200)
					{
					    document.getElementById(iddiv).innerHTML = bt[requestnum].responseText; 	//output the html to the DIV
					    if(newclass!=null){document.getElementById(iddiv).className = newclass;}
					}
					else
					{
						ExceptionHandler(e, "Code: " + bt[requestnum].status + " :: " + bt[requestnum].statusText);						
					}
				}
			};
			bt[requestnum].open("GET", htmlfile, true);
			bt[requestnum].send(null);
		}
		else
		{
			ExceptionHandler(e, "Your browser of choice is ill-equiped for the situation at hand");
		}
	}
	catch (e) 
	{
	    ExceptionHandler(e,"GetFeeds: " + e.name + " :: " + e.message);
	}
}
//]]>