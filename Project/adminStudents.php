<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminStudents.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
    <title>Students</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">School Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav nav-pills">
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminHome.php">Home</a></li>
                    
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Students</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="adminStudents.php">Student Records</a>
                            <a class="dropdown-item" href="adminStudentsFees.php">Fees Management</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Teachers</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="adminTeachers.php">Teacher Records</a>
                            <a class="dropdown-item" href="adminPayroll.php">Payroll Management</a>
                            <a class="dropdown-item" href="adminTeachersAttendance.php">Teacher Attendance</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminAnnouncements.php">Announcement</a></li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                </ul>
                
            </div>
	    </nav>
    </header>

    <main class="container">
        <div class="table-responsive-md" id="studentTable">
            <!-- basic table -->
            <table class="table table-info"><h1 class="justify-content-center bg-info" id=t1>Student Records<i class="fa fa-book"></i></h1>
                <thead class="thead-info bg-info text-white">
                    <tr>
                        <th>Roll no</th>
                        <th>Name</th>
                        <th>Father's name</th>
                        <th>Class</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Fees</th>
                        <th>Fee Status</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $sql = "SELECT *  FROM student order by rollno";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            echo '<tr>';
                                echo '<td>'. $row['rollno'] .'</td>';
                                echo '<td>'. $row['sname'] .'</td>';
                                echo '<td>'. $row['fathersname'] .'</td>';
                                echo '<td>'. $row['class'] .'</td>';
                                echo '<td>'. $row['username'] .'</td>';
                                echo '<td>'. $row['password'] .'</td>';
                                echo '<td>'. $row['phone'] .'</td>';
                                echo '<td>'. $row['fees'] .'</td>';
                                if($row['feestatus']==1)
                                {
                                    echo '<td>Paid</td>';
                                }
                                else if($row['feestatus']==0)
                                {
                                    echo '<td>Unpaid</td>';
                                }
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
        </div>
        <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createStudentPDF()">PDF<i class="fa fa-print"></i></button>

        <hr><hr>
        <div class="card">
				<div class="card-header bg-info"><h2 class="card-title" id="cardtitle">Add Student Record</h2></div>
				<div class="card-body">
			
				<form action ="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fname">Father's Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Father's Name" required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-user" ></i>
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username"  required>
                            </div>
                            <div class="form-group col-md-4">
                                <i class="fa fa-lock"></i>
                                <label for="inputPassword1">Password</label>
                                <input type="password" class="form-control" name="password1" id="inputPassword1" placeholder="**********" required>
                            </div>
                            <div class="form-group col-md-4">
                                <i class="fa fa-lock"></i>
                                <label for="inputPassword2">Re-enter Password</label>
                                <input type="password" class="form-control" name="password2" id="inputPassword2" placeholder="**********" required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-book" ></i>
                                <label for="class">Class</label>
                                <input type="number" class="form-control" name="class"  id="class" required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-phone" ></i>
                                <label for="number">Phone Number</label>
                                <input type="number" class="form-control" name="number" id="number" placeholder=""  required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-money" ></i>
                                <label for="fees">Fees</label>
                                <input type="number" class="form-control" name="fees" id="fees" placeholder=""  required>
                            </div>
                        </div>	
                        
                    </div>
                 <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Add Student<i class="fa fa-plus"></i></button>
			</form>

				</div>
			</div>
        </div>
        
        <hr><hr>
        <div>
            <div class="jumbotron bg-dark text-light"><h2>Delete student Record</h2>
            <form action="" method="POST">
                Roll number : <input type="text" name="rollno" id="roll">
                <button class="btn-danger btn-lg btn-block" name="deleteBtn">Delete<i class="fa fa-trash"></i></button>
            </form>
            </div>
            
        </div>
        <div class="card-footer bg-info"><p id="cardfooter">School Management System <i class="fa fa-copyright"></i></p></div>
    </main>

</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $username= $_POST['username'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $class = $_POST['class'];
        $number = $_POST['number'];
        $fees = $_POST['fees'];
        
        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
        if($pass1!=$pass2)
        {
            echo '<script>alert(\"Passwords do not match\")</script>';
        }
        else
        {
            $query="select * from student where username=$username";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0)
            {
                if(mysqli_query($connection,"update student set password=$pass1,phone=$number,class=$class,fees=$fees where username=$username"))
                {
                    echo "<script>alert(\"Record Updated Successfully.\");document.location='adminStudents.php';</script>";
                }
            }   
            else
            {
                $sql = "INSERT INTO student (sname, fathersname, username, password, phone, class, fees,feestatus) 
                VALUES('$name', '$fname', '$username', '$pass1', '$number','$class', '$fees',1);";
                
                 if (mysqli_query($connection, $sql)) 
                 {
                    $query="SELECT AUTO_INCREMENT
                                FROM information_schema.TABLES
                                WHERE TABLE_SCHEMA = 'wp_project'
                                AND TABLE_NAME = 'student'";
                    $result=mysqli_query($connection,$query);
                    if(mysqli_num_rows($result)>0)
                    {    
                        while ($row = mysqli_fetch_assoc($result)) 
                            {
                               $rollno= $row['AUTO_INCREMENT'];
                               $rollno--;
                            }
                    }
                    if($class==1 || $class==2 || $class==3 || $class==4 || $class==5 ||$class==6 || $class==7)
                    {
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'English')";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Urdu')";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Islamiyat');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Science');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Maths');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Computer');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'SST');";
                        mysqli_query($connection,$query);
                        echo "<script>alert(\"Record Inserted Successfully.\");document.location='adminStudents.php';</script>";
                    }
                    else
                    {
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'English')";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Urdu')";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Islamiyat');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Physics');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Chemistry');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Computer');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Maths');";
                        mysqli_query($connection,$query);
                        $query = "insert into studentmarks(rollno,sname,class,subject) 
                                values($rollno,'$name',$class,'Pakistan Studies');";
                        mysqli_query($connection,$query);
                    }
                        $result=mysqli_query($connection,"select teacherId from class where class=$class");
                        if(mysqli_num_rows($result)>0)
                        {    
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                $tId=$row['teacherId'];
                            }    
                        }
                        $query = "insert into studentattendance
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00)";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance 
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00)";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance 
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance 
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance 
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        $query = "insert into studentattendance
                                values($rollno,$tId,'$name',$class,0,0,0,0,0.00);";
                        mysqli_query($connection,$query);
                        echo "<script>alert(\"Record Inserted Successfully.\");document.location='adminStudents.php';</script>";
                } 
                else 
                {
                    echo '<script>alert(\"Error in Inserting record! \")</script>';
                }
            }     
        }
    }
    if(isset($_POST['deleteBtn']))
    {
        $roll = $_POST['rollno'];
        $conn= mysqli_connect('localhost', 'root', '', 'wp_project');
        $sql = "Delete from student where rollno = $roll";
        
        $result = mysqli_query($conn,"select rollno from student where rollno = '$roll'")
                    or die("Failed to query".mysqli_error);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)>0)
        {   
            if (mysqli_query($conn, $sql)) 
            {
                $query="delete from studentmarks where rollno=$roll";
                if(mysqli_query($conn,$query))
                {
                    $query ="delete from studentattendance where rollno=$roll";
                    if(mysqli_query($conn,$query))
                    {
                           echo "<script>alert(\"Record Deleted Successfully.\");document.location='adminStudents.php';</script>";
                    }
                }
            } 
           else 
           {
               echo "<script>alert(\"Error in Deleting record! \")</script>";
           }
        }
        else
        {
            echo "<script>alert(\"The record does not exist! \")</script>";
        }
    }
?>