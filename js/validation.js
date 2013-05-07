function valdateContact()
{
	
	var name = document.forms["contact"]["name"].value.length;
	if(name==0){
		alert ("Please enter your name");
		return false;
	}
	
	var email = document.forms["contact"]["email"].value.length;
	if(email==0)
	{
		alert ("Please enter your email.");
		return false;
	}
	
	var phone = document.forms["contact"]["phone"].value.length;
	if(phone<=8 || phone>12)
	{
		alert ("Please enter your correct phone number");
		return false;
	}
	var message = document.forms["contact"]["message"].value.length;
	if(message==0)
	{
		alert ("Please enter your feedback.");
		return false;
	}
}

function userReg()
{
	
	var first_name = document.forms["user"]["first_name"].value.length;
	if(first_name==0){
		alert ("Please enter your first name");
		return false;
	}
	
	var last_name = document.forms["user"]["last_name"].value.length;
	if(last_name==0){
		alert ("Please enter your last name");
		return false;
	}
	
	var email = document.forms["user"]["email"].value.length;
	if(email==0)
	{
		alert ("Please enter your email.");
		return false;
	}
	
	var phone = document.forms["user"]["phone"].value.length;
	if(phone<=8 || phone>12)
	{
		alert ("Please enter your correct phone number");
		return false;
	}
	
	var age = document.forms["user"]["age"].value.length;
	if(age==0)
	{
		alert ("Please enter your correct age.");
		return false;
	}
}