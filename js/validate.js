/**
 * Confirms that new user trying to register an account has filled in the 
 * right information on registration page.
 * 
 * @param myform - the form element containing the elements with user-entered information
 */
function validate(myform)
{
    var err="";
    
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
		var fname = "First Name cannot be empty";
		document.getElementById("fname").style.backgroundColor = "pink";
        document.getElementById("errfname").innerHTML = fname;
        err+="yes";
	}
	if (myform.lname.value == "")
	{
		var lname = "Last Name cannot be empty";
		document.getElementById("lname").style.backgroundColor = "pink";
        document.getElementById("errlname").innerHTML = lname;
        err+="yes";
	}
    if (myform.city.value == "")
	{
		var city = "City cannot be empty";
		document.getElementById("city").style.backgroundColor = "pink";
        document.getElementById("errcity").innerHTML = city;
        err+="yes";
	}
	if (myform.country.value == "")
	{
		var country = "Country cannot be empty";
		document.getElementById("country").style.backgroundColor = "pink";
        document.getElementById("errcountry").innerHTML = country;
        err+="yes";
	}    
	if (myform.email.value == "")
	{
		var email = "Email cannot be empty";
		document.getElementById("email").style.backgroundColor = "pink";
        document.getElementById("erremail").innerHTML = email;
        err+="yes";
	}
	else
	{
		var regexp = /^(\w+\.){0,2}\w+@([-a-z]+\.){1,2}[a-z]{2,6}$/i;
				if (!regexp.test(myform.email.value))
				{
					email = "Please enter a valid email format";
					document.getElementById("email").style.backgroundColor = "pink";
                    document.getElementById("erremail").innerHTML = email;
                    err+="yes";
				}
	}
	if (myform.password.value == "")
	{
		var password = "Password cannot be empty";
		document.getElementById("password").style.backgroundColor = "pink";
        document.getElementById("errpassword").innerHTML = password;
        err+="yes";
    }
    else if( myform.password.value != myform.passwordAgain.value)
    {
            password = "Passwords must match";
            document.getElementById("password").style.backgroundColor = "pink";
            document.getElementById("errpassword").innerHTML = password;
            err+="yes";
    }
    
    if (myform.passwordAgain.value == "")
	{
		var passwordAgain = "Confirm Password cannot be empty";
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