var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
function validate()
 {
var password = document.getElementById("password").value;
    if (username =="admin" && password == "admin") 
    {
        alert("Login successfully");
        // window.location = "adminHome.php"; // Redirecting to other page.
        return false;
    }
    else if (username =="teacher" && password == "teacher") 
    {
        alert("Login successfully");
        // window.location = "adminHome.php"; // Redirecting to other page.
        return false;
    }
    // if (username =="admin" && password == "admin") 
    // {
    //     alert("Login successfully");
    //     window.location = "adminHome.php"; // Redirecting to other page.
    //     return false;
    // }
    else 
    {
        attempt--;// Decrementing by one.
        alert("You have left " + attempt + " attempt;");
        // Disabling fields after 3 attempts.
        if (attempt == 0) 
        {
            document.getElementById("password").disabled = true;
            document.getElementById("submit").disabled = true;
            return false;
        }
    }
}