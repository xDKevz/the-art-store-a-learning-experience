/**
 * Confirms that new user trying to register an account has filled in the 
 * right information on registration page.
 * 
 * @param myform - the form element containing the elements with user-entered information
 */
function validate(myform)
{
    err="";
    
	document.getElementById("fname").style.backgroundColor = "white";
	document.getElementById("lname").style.backgroundColor = "white";
	document.getElementById("city").style.backgroundColor = "white";
	document.getElementById("country").style.backgroundColor = "white";
    document.getElementById("email").style.backgroundColor = "white";
	document.getElementById("passwordAgain").style.backgroundColor = "white";
    document.getElementById("password").style.backgroundColor = "white";
    
    document.getElementById("errfname").innerHTML = "";
    document.getElementById("errlname").innerHTML = "";
    document.getElementById("errcity").innerHTML = "";
    document.getElementById("errcountry").innerHTML = "";
    document.getElementById("erremail").innerHTML = "";
    document.getElementById("errpassword").innerHTML = "";
    document.getElementById("errpasswordAgain").innerHTML = "";

	if (myform.fname.value == "")
	{
		fname = "First Name cannot be empty";
		document.getElementById("fname").style.backgroundColor = "pink";
        document.getElementById("errfname").innerHTML = fname;
        err+="yes";
	}
	if (myform.lname.value == "")
	{
		lname = "Last Name cannot be empty";
		document.getElementById("lname").style.backgroundColor = "pink";
        document.getElementById("errlname").innerHTML = lname;
        err+="yes";
	}
    if (myform.city.value == "")
	{
		city = "City cannot be empty";
		document.getElementById("city").style.backgroundColor = "pink";
        document.getElementById("errcity").innerHTML = city;
        err+="yes";
	}
	if (myform.country.value == "")
	{
		country = "Country cannot be empty";
		document.getElementById("country").style.backgroundColor = "pink";
        document.getElementById("errcountry").innerHTML = country;
        err+="yes";
	}
	/*if (c.options[c.selectedIndex].text == "Select Country")
	{
		var country = "Please select your country.";
		document.getElementById("countryId").style.backgroundColor = "pink";
        document.getElementById("errcountry").innerHTML = country;
        err+="yes";
	}*/    
	if (myform.email.value == "")
	{
		var email = "Email address cannot be empty";
		document.getElementById("email").style.backgroundColor = "pink";
        document.getElementById("erremail").innerHTML = email;
        err+="yes";
	}
	else
	{
		var regexp = /^(\w+\.){0,2}\w+@([-a-z]+\.){1,2}[a-z]{2,6}$/i;
				if (!regexp.test(myform.email.value))
				{
					email = "You entered an invalid email format. Try again.";
					document.getElementById("email").style.backgroundColor = "pink";
                    document.getElementById("erremail").innerHTML = email;
                    err+="yes";
				}
	}
	if (myform.password.value == "")
	{
		var password = "Password cannot be empty.";
		document.getElementById("password").style.backgroundColor = "pink";
        document.getElementById("errpassword").innerHTML = password;
        err+="yes";
    }
    else if(myform.password.value.length<=5)
    {
		password = "Password length must be greater than or equal to six";
		document.getElementById("password").style.backgroundColor = "pink";
        document.getElementById("errpassword").innerHTML = password;
        err+="yes";	
    }
    else if(myform.password.value != myform.passwordAgain.value)
    {
            password = "Passwords don't match. Try again.";
            document.getElementById("password").style.backgroundColor = "pink";
            document.getElementById("errpassword").innerHTML = password;
            err+="yes";
    }
    
    if (myform.passwordAgain.value == "")
	{
		var passwordAgain = "Confirm your password";
		document.getElementById("passwordAgain").style.backgroundColor = "pink";
        document.getElementById("errpasswordAgain").innerHTML = passwordAgain;
        err+="yes";
    }

	if (err != "")
	{
		return false;
	}
	else
	{
		return true;
	}
	
}