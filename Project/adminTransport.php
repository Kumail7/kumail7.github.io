<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/transport.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Transport</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">School Management System</a>
                <!-- Toggler/collapsibe Button -->
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
                                <a class="dropdown-item" href="adminTeachersAttendance.php">Teacher Attendance</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Teachers</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminTeachers.php">Teacher Records</a>
                                <a class="dropdown-item" href="adminPayroll.php">Payroll Management</a>
                            </div>
                    </li>
                    <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="adminTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminAnnouncements.php">Announcement</a></li>
                    
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="studentlogin.php">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                </ul>
                </ul>
            </div>
	    </nav>
    </header>

    <main class="container">
        <div>
                <?php
                    session_start();                               
                ?>
            <div class="table-responsive-md" id="transportTable">
            <!-- basic table -->
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1 >Transport<i class="fa fa-bus"></i></h1>
                <thead class="thead-info justify-content-center bg-info text-white">
                    <tr >
                        <th>Route Id</th>
                        <th>Driver's Name</th>
                        <th>Contact Number</th>
                        <th>Route</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $sql = "SELECT *  FROM transport";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                echo '<td>'. $row['routeId'] .'</td>';
                                echo '<td>'. $row['driver'] .'</td>';
                                echo '<td>'. $row['phonenumber'] .'</td>';
                                echo '<td>'. $row['route'] .'</td>';
                            echo '</tr>'; 
                        }   
                    }
                ?>
            </table>
        </div>
        <hr><hr>
        <div class="card">
				<div class="card-header bg-info"><h2 class="card-title text-white" id="cardtitle">Add/Update Transport Route</h2></div>
				<div class="card-body">
			
				<form action ="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                    <i class="fa fa-id-card"></i>
                                    <label for="routeId">Route</label>
                                    <input type="number" class="form-control" name="routeId" id="routeId" placeholder="RouteId" required>
                                </div>    
                            <div class="form-group col-md-3 ">
                                <i class=" fa fa-user" ></i>
                                <label for="driver">Driver's Name</label>
                                <input type="text" class="form-control" name="driver" id="driver" placeholder="Driver"  required>
                            </div>
                            <div class="form-group col-md-3">
                                <i class="fa fa-phone"></i>
                                <label for="phone">Contact Number</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group col-md-3">
                                <i class="fa fa-bus"></i>
                                <label for="route">Route</label>
                                <input type="text" class="form-control" name="route" id="route" placeholder="Area" required>
                            </div>
                        </div>	
                        
                    </div>
                 <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Update Transport Route<i class="fa fa-edit"></i></button>
			</form>
        </div>
    </main>
</body>
</html>
<?php
     if(isset($_POST['submit']))
     {
         $routeId= $_POST['routeId'];
         $name = $_POST['driver'];
         $phone= $_POST['phone'];
         $route= $_POST['route'];
         
         $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
         if($connection)
         {
              $sql ="insert into transport
                        (routeId, driver, phonenumber,route)
                        values ($routeId,'$name',$phone,'$route')
                        ON DUPLICATE KEY UPDATE
                        driver     = VALUES(driver),
                        phonenumber = VALUES(phonenumber),
                        route     = VALUES(route)";
              if (mysqli_query($connection, $sql)) 
              {
                echo "<script>alert(\"Record Updated Successfully.\");document.location='adminTransport.php';</script>";
              } 
             else 
             {  echo "error : ".mysqli_error($connection);
                 echo '<script>alert(\"Error in Inserting record! \")</script>';
             }
         }
         else
         {
             echo 'connection failed';
         }
     }
?>