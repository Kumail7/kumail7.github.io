<?php
    session_start();
    if (isset($_POST['submit'])) 
    {
        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con,"wp_project");

        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);
    
        $result = mysqli_query($con,"select * from student where username = '$username' and password = '$password'")
                    or die("Failed to query".mysqli_error);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)>0)
        {
            if($row['username'==$username] && $row['password']==$password)
            {
                $_SESSION['user']=$username;
                $_SESSION['roll']=$row['rollno'];
                $_SESSION['class']=$row['class'];
                $_SESSION['sname']=$row['sname'];
                header("Location: studentHome.php");    
            }
                   
            else
            {
                echo "<script>alert('Incorrect Username or password!');document.location='index.php'</script>";
            }
        }
        else
        {   
            echo "<script>alert('Incorrect Username or password!');</script>";
        }
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/studentLogin.css">
    <!-- <script src="js/index.js"></script> -->
    <title>Student Login</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">Student Portal</a>
                    <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
    
                </div>
            </div>
	    </nav>
    </header>
    <div class="main container ">
        <div class="jumbotron">
            <h1>Student Login</h1>
            <div class="login">
              <form class="form-inline" action="" method ="POST">
                <div class="form-group mb-2">
                  <i class=" fa fa-user" ></i>
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" value="" name="username" placeholder="Username" required>
                  <i class="fa fa-lock"></i>
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-2" id="loginBtn">Login</button>
              </form>
            </div>
        </div>
    </div>
</body>
</html>