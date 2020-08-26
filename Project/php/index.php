<?php
if (isset($_POST['submit'])) 
{
    if(isset($_POST['role']))
    {
        $role = $_POST['role'];

        echo "You have selected :".$_POST['role'];  //  Displaying Selected Value

        if($role=="Admin")
        {
            
        }
        else if($role == "Teacher")
        {

        }
        else if($role=="Student")
        {

        }
    }
    else
    {
        echo "You have selected :".$_POST['role'];   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>School</title>
</head>
<body>
    <div class="main container">
        <div class="jumbotron">
            <h1>Login</h1>
            <div class="login">
              <form class="form-inline" action="" method ="POST">
                <div class="form-group mb-2">
                  <i class=" fa fa-user" ></i>
                  <label for="staticEmail2">Email</label>
                  <input type="text" class="form-control" id="staticEmail2" value="" placeholder="Username" required>
                  <i class="fa fa-lock"></i>
                  <label for="inputPassword2">Password</label>
                  <input type="password" class="form-control" id="inputPassword2" placeholder="********" required>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <div class="form-check">
                        <label style="margin-left: 50px; margin-right: 20px;">Admin <input class="check" type="radio" name="role" value="Admin" required></label>
                        <label style="margin-left: 20px; margin-right: 20px;">Teacher <input class="check" type="radio" name="role" value="Teacher" required></label>
                        <label style="margin-left: 20px; margin-right: 20px;">Student <input class="check" type="radio" name="role" value="Student" required></label><br>   	
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary mb-2">Login</button>
              </form>
            </div>
        </div>
    </div>
</body>
</html>