function validate()
{ 
	if( document.EmploymentApplication.firstname.value == "" )
	{
		alert( "Please provide your Name!" );
		document.EmploymentApplication.firstname.focus() ;
		return false;
	}
	
	if( document.EmploymentApplication.skillset.value == "" )
	{
		alert( "Please provide your Skills!" );
		document.EmploymentApplication.skillset.focus() ;
		return false;
	}
	
	var email = document.EmploymentApplication.emailAddress.value;
	atpos = email.indexOf("@");
	dotpos = email.lastIndexOf(".");
	if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
	{
		alert("Please enter correct email ID")
		document.EmploymentApplication.emailAddress.focus() ;
		return false;
	}
	
	if( document.EmploymentApplication.phoneNumber.value == "" ||
           isNaN( document.EmploymentApplication.phoneNumber.value) ||
           document.EmploymentApplication.phoneNumber.value.length != 10 )
    {
		alert( "Please provide a Mobile No in the format 123." );
		document.EmploymentApplication.phoneNumber.focus() ;
		return false;
	}
	
	if( document.EmploymentApplication.dob.value == "" )
	{
		alert( "Please provide your DOB!" );
		document.EmploymentApplication.dob.focus() ;
		return false;
	}
	
  
   return( true );
}

