<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css">
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
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Students</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminStudents.php">Student Records</a>
                                <a class="dropdown-item active" href="adminStudentsFees.php">Fees Management</a>
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
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1>Student Fees Management</h1>
                <thead class="thead-info bg-info text-white">
                    <tr>
                        <th>Roll no</th>
                        <th>Name</th>
                        <th>Father's name</th>
                        <th>Class</th>
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
				<div class="card-header bg-info"><h2 class="card-title text-white" id="cardtitle">Add/Update Student Fees Record</h2></div>
				<div class="card-body">
			
				<form action ="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <i class=" fa fa-user" ></i>
                                <label for="rollno">Roll no</label>
                                <input type="number" class="form-control" name="rollno" id="rollno" placeholder="Roll no."  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <i class=" fa fa-money" ></i>
                                <label for="feestatus">Fee Status</label>
                                <select class= "form-control"name="feestatus" id="feestatus">
                                    <option value="1">Unpaid</option>
                                    <option value="2">Paid</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <i class=" fa fa-money" ></i>
                                <label for="months">Months</label>
                                <select class= "form-control"name="months" id="months">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>	
                        
                    </div>
                 <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Update Fees<i class="fa fa-edit"></i></button>
			</form>

				</div>
			</div>
        </div>
        
        <hr><hr>
        <div>
            <div class="jumbotron bg-info text-white"><h2>Refresh Fees</h2>
            <form action="" method="POST">
                <button class="btn-primary btn-lg btn-block" name="refreshBtn">New Month<i class="fa fa-refresh"></i></button>
                <button class="btn-success btn-lg btn-block" name="refreshSessionBtn">New Session<i class="fa fa-refresh"></i></button>
            </form>
            </div>
            
        </div>
        <div class="card-footer bg-info text-white"><p id="cardfooter">School Management System <i class="fa fa-copyright"></i></p></div>
    </main>

</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $feeStatus = $_POST['feestatus'];
        $months=$_POST['months'];
        $fees = 30000*$months;

        if($feeStatus==1)
        {
            $feeStatus=0;
        }
        else if($feeStatus==2)
        {
            $feeStatus=1;
        }
        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
        if($connection)
        {
            $sql ="update student set fees=$fees,feestatus=$feeStatus where rollno=$rollno";
            if (mysqli_query($connection, $sql)) 
            {
                echo "<script>alert(\"Fees Record Updated Successfully.\");document.location='adminStudentsFees.php';</script>";
            } 
            else 
            {
                echo '<script>alert(\"Error in Updating record! \")</script>';
            }
        }
    }
    if(isset($_POST['refreshBtn']))
    {
        $conn= mysqli_connect('localhost', 'root', '', 'wp_project');
        $result = mysqli_query($conn,"select * from student")
                    or die("Failed to query".mysqli_error);
        if(mysqli_num_rows($result)>0)
        {    
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $rollno=$row['rollno'];
                $sql ="select * from student where rollno=$rollno";
                $result2 = mysqli_query($conn,$sql)
                        or die("Failed to query".mysqli_error($connection));
                if(mysqli_num_rows($result2)>0)
                {    
                    while ($row = mysqli_fetch_assoc($result2)) 
                    {
                        $fees=$row['fees'];
                        $baseFee=$row['basefee'];
                        if($row['feestatus']==0)
                        {
                            $fees=$fees+$baseFee;
                        }
                        echo $baseFee."<br>";
                    }
                }
               
                $sql = "Update student set feestatus=0,fees=$fees where rollno=$rollno";
                mysqli_query($conn,$sql);
            }
            echo "<script>alert(\"Payroll Status Updated Successfully.\");document.location='adminStudentsFees.php';</script>"; 
        }
        else
        {
            echo "<script>alert(\"Failed to Execute Request. \")</script>";
        }
    }
    if(isset($_POST['refreshSessionBtn']))
    {
        $conn= mysqli_connect('localhost', 'root', '', 'wp_project');
        $result = mysqli_query($conn,"select * from student")
                    or die("Failed to query".mysqli_error);
        if(mysqli_num_rows($result)>0)
        {    
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $rollno=$row['rollno'];
                $baseFee=$row['basefee'];
                $sql = "Update student set fees=$baseFee,feestatus=0 where rollno=$rollno";
                mysqli_query($conn,$sql);
            }
            echo "<script>alert(\"Fees Status Updated Successfully.\");document.location='adminStudentsFees.php';</script>"; 
        }
        else
        {
            echo "<script>alert(\"Failed to Execute Request. \")</script>";
        }
    }
?>