<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminTeachers.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
    <title>Teachers</title>
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
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Students</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminStudents.php">Student Records</a>
                                <a class="dropdown-item" href="adminStudentsFees.php">Fees Management</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Teachers</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item active" href="adminTeachers.php">Teacher Records</a>
                                <a class="dropdown-item" href="adminPayroll.php">Payroll Management</a>
                                <a class="dropdown-item" href="adminTeachersAttendance.php">Teacher Attendance</a>
                            </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminAnnouncements.php">Announcement</a></li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="login.html">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                </ul>
                </ul>
            </div>
	    </nav>
    </header>  

    <main class="container">

    <div class="table-responsive-md" id="teacherTable">
		<!-- basic table -->
		<table class="table table-info"><h1 class="justify-content-center bg-info" id=t1>Teacher Records</h1>
			<thead class="thead-info bg-info text-white">
				<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>SubjectId</th>
                    <th>Subject</th>
                    <th>Class Teacher</th>
                    <th>Phone Number</th>
                    <th>Salary</th>
				</tr>	
			</thead>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                $sql = "SELECT *  FROM teacher order by id";
                $result = mysqli_query($connection, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            echo '<td>'. $row['name'] .'</td>';
                            echo '<td>'. $row['username'] .'</td>';
                            echo '<td>'. $row['password'] .'</td>';
                            echo '<td>'. $row['subjectId'] .'</td>';
                            echo '<td>'. $row['subjectname'] .'</td>';
                            if($row['classteacher']==null)
                            {
                                echo '<td>-</td>';
                            }
                            else
                            {
                                echo '<td>'. $row['classteacher'] .'</td>';
                            }
                            echo '<td>'. $row['phonenumber'] .'</td>';
                            echo '<td>'. $row['basesalary'] .'</td>';
                        echo '</tr>';
                    }
                }
            ?>
        </table>
    </div>
    <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createTeacherPDF()">PDF<i class="fa fa-print"></i></button>
    
    <hr><hr>
    <div class="card">
				<div class="card-header bg-info"><h2 class="card-title" id="cardtitle">Add/Update Teacher Record</h2></div>
				<div class="card-body">
			
				<form action ="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
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
                                <i class=" fa fa-id-card" ></i>
                                <label for="subId">Subject Id</label>
                                <input type="number" class="form-control" name="subId"  id="subId" required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-file" ></i>
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject"  id="subject" required>
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-book" ></i>
                                <label for="class">Class Teacher</label>
                                <input type="text" class="form-control" name="class"  id="class">
                            </div>
                            <div class="form-group col-md-4 ">
                                <i class=" fa fa-money" ></i>
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control" name="salary" id="salary" placeholder=""  required>
                            </div>
                            <div class="form-group col-md-4">
                                <i class=" fa fa-phone" ></i>
                                <label for="number">Phone Number</label>
                                <input type="number" class="form-control" name="number" id="number" placeholder=""  required>
                            </div>
                        </div>	
                        
                    </div>
                 <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Add Teacher<i class="fa fa-plus"></i></button>
			</form>

				</div>
			</div>
        </div>
        
        <hr><hr>
        <div>
            <div class="jumbotron bg-dark text-light"><h2>Delete Teacher Record</h2>
            <form action="" method="POST">
                Username : <input type="text" name="user" id="user">
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
      $username= $_POST['username'];
      $pass1 = $_POST['password1'];
      $pass2 = $_POST['password2'];
      $number = $_POST['number'];
      $subId = $_POST['subId'];
      $subject = $_POST['subject'];
      $salary = $_POST['salary'];
      $classTeacher = $_POST['class'];

      $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
      if($pass1!=$pass2)
      {
          echo "<script>alert(\"Passwords do not match\")</script>";
      }
      else
      {     
          if($classTeacher=="")
          {
            $sql = "INSERT INTO teacher(name,username,password,subjectId,subjectname,salary,basesalary,phonenumber) 
                    VALUES('$name', '$username', '$pass1', '$subId', '$subject','$salary',$salary, '$number');";
            $query="select * from teacher where username=$username";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0)
            {
                if(mysqli_query($connection,"update teacher set password=$pass1,phonenumber=$number,subjectId=$subId,subjectname=$subject,classTeacher=null,salary=$salary,basesalary=$salary,salary=$salary where username='$username'"))
                {
                    echo "<script>alert(\"Record Updated Successfully.\");document.location='adminTeachers.php';</script>";
                }        
                else
                {
                    echo mysqli_error($connection);
                }
            }  
          }
        else
        {
            $sql = "INSERT INTO teacher(name,username,password,subjectId,subjectname,classteacher,salary,basesalary,phonenumber) 
                    VALUES('$name', '$username', '$pass1', '$subId', '$subject',$classTeacher,'$salary',$salary, '$number');";
            $query="select * from teacher where username='$username'";
            if(mysqli_query($connection,$query))
            {
                $result = mysqli_query($connection,$query);
                if(mysqli_num_rows($result)>0)
                {
                    $query="update teacher set password='$pass1',phonenumber=$number,subjectId=$subId,subjectname='$subject',
                    classteacher=$classTeacher,salary=$salary,basesalary=$salary where username='$username'";
                    echo $query."<br>";
                    if(mysqli_query($connection,$query))
                    {
                        echo "<script>alert(\"Record Updated Successfully.\");document.location='adminTeachers.php';</script>";
                    }  
                    else 
                    {
                        echo mysqli_error($connection);
                    }      
                }
    
            }
            
            
            if (mysqli_query($connection, $sql)) 
            {

                if(mysqli_query($connection, "select id from teacher where username='$username'"))
                {
                    $result=mysqli_query($connection, "select id from teacher where username='$username'");
                }
                else
                {
                    echo 'error : '.mysqli_error($connection);
                }
                
                if(mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $tId = $row['id'];       
                    }
                } 
                $query="SELECT AUTO_INCREMENT
                        FROM information_schema.TABLES
                            WHERE TABLE_SCHEMA = 'wp_project'
                            AND TABLE_NAME = 'teacher'";
                            $result=mysqli_query($connection,$query);
                            if(mysqli_num_rows($result)>0)
                            {    
                                while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                        $tId= $row['AUTO_INCREMENT'];
                                        $tId--;
                                    }
                            }                
                $query = "insert into teacherattendance
                            values($tId,'$name',0,0,0,0,0.00)";
                            echo $query;
                if(mysqli_query($connection,$query))
                {
                    echo '<script>alert(\"Error in Inserting record! \")</script>';
                }
                else
                {
                    echo '<script>alert(\"Error in Inserting record! : '.mysqli_error($connection).'\")</script>';
                }

                if($classTeacher!="")
                {
                    if(mysqli_query($connection,"update class set teacherId= $tId where class = $classTeacher;"))
                    {
                        mysqli_query($connection,"update teacher set classteacher= null where classteacher = $classTeacher;");
                        mysqli_query($connection,"update teacher set classteacher= $classTeacher where id = $tId;");
                    }
                }
                echo "<script>alert(\"Teacher Record Inserted Successfully.\");document.location='adminTeachers.php';</script>";  
            } 
            else 
            {
                echo '<script>alert(\"Error in Inserting record! \")</script>';
            }     
      }
  }
  if(isset($_POST['deleteBtn']))
  {
      $user = $_POST['user'];
      $conn= mysqli_connect('localhost', 'root', '', 'wp_project');
      $sql = "Delete from teacher where username = '$user'";
      
      if(mysqli_query($conn,"select *from teacher where username = '$user'"))
      {
        $result=mysqli_query($conn,"select *from teacher where username = '$user'");
        if(mysqli_num_rows($result)>0)
        {    
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo 'hello';
                echo $row['id'];
                $tId = $row['id'];       
            }
              if (mysqli_query($conn, $sql)) 
              {
                $query ="delete from teacherattendance where id=$tId";
                if(mysqli_query($conn,$query))
                {
                       echo "<script>alert(\"Record Deleted Successfully.\");document.location='adminTeachers.php';</script>";
                }
              } 
             else 
             {
                 echo "<script>alert(\"Error in Deleting record! \")</script>";
             }
        }
      }
    else
    {
        echo "<script>alert(\"The record does not exist! \")</script>";
    }
  }  
}
?>