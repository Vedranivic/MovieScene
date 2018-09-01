function validateRegForm()
{
	var email = document.getElementById("email");
	var pass = document.getElementById("password");
	var pass2 = document.getElementById("password");
	et = email.value.indexOf("@");
	dot = email.value.lastIndexOf(".");
	document.getElementById("result").innerHTML = dot;
	
	if (et < 2 || ( dot - et < 2 ) || (email.value.length - dot < 2)) 
	{
		if(et == -1){alert("The '@' sign must exist"); email.focus();return false;}
		if(dot == -1){alert("The '.' sign must exist"); email.focus();return false;}
		if(et < 2){alert("The email address must contain a valid username!"); email.focus();return false;}
		if(dot-et<2){alert("The email address must contain a valid domain name"); email.focus();return false;}
		if(email.value.length - dot < 3){alert("The email address must contain a valid domain extension"); email.focus();return false;}
	}
	
	if(pass.value != pass2.value){
		alert("Entered passwords do not match!");
	}
 
    return( true );
}