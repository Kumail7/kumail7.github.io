<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminHome.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Teacher Attendance</title>
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
                            </div>
                        </li>
                        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Teachers</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adminTeachers.php">Teacher Records</a>
                                <a class="dropdown-item" href="adminPayroll.php">Payroll Management</a>
                                <a class="dropdown-item active" href="adminTeachersAttendance.php">Teacher Attendance</a>
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
        <div>
        <form action ="" method="post">
                <div class="table-responsive-md">
                <div  id="attendanceTable">
                <table class="table table-info" id="atdTable">
                    <thead class="thead-info bg-info text-white"><h1 class="bg-info text-white">Teachers Attendance</h1>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Presents</th>
                            <th>Absents</th>
                            <th>Leaves</th>
                            <th>Total Days</th>
                            <th>Perentage</th>
                            <th>Date</th>
                            <th>Attendance</th>
                        </tr>	
                    </thead>
                    <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                        
                        $sql = "SELECT *  FROM teacherattendance";
                        $result = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<tr>';
                                        echo '<td >'. $row['id'] .'</td>';    
                                        echo '<td>'. $row['name'] .'</td>';
                                        echo '<td>'. $row['presents'] .'</td>';
                                        echo '<td>'. $row['absents'] .'</td>';
                                        echo '<td>'. $row['leaves'] .'</td>';
                                        echo '<td>'. $row['total'] .'</td>';
                                        echo '<td>'. $row['attendance'] .'%</td>';
                                        echo '<td>'. date("d/F/Y") .'</td>';
                                        // echo "<td contenteditable='true'><input type='text' name='name[]'/></td>";
                                        echo '<td id="myTd"><select class= "form-control"name="attendance[]" >
                                                <option value="1">P</option>
                                                <option value="2">A</option>
                                                <option value="3">L</option>
                                            </select></td>';
                                    echo '</tr>';    
                            }
                        }
                        
                    ?>
                </table>
                </div>
            </div>
            <button type="submit" name ="submitAttendance" class="btn-block btn-lg btn-primary">Add Attendance<i class="fa fa-plus"></i></button>
            <button type="submit" name ="refresh" class="btn-block btn-lg btn-success">New Month<i class="fa fa-refresh" aria-hidden="true"></i></button>
        </form>
        </div>
        
    </main>       
    
    
</body>
</html>
<?php
    if(isset($_POST['refresh']))
    {
        $sql = "SELECT *  FROM teacherattendance order by id";
        $result = mysqli_query($connection, $sql);
        
        $index=0;
        $date=date("d/F/y");
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $tId=$row["id"];
                $query="update teacherattendance set presents=0,absents=0,leaves=0,total=0,attendance=0.00 where id=$tId";
                mysqli_query($connection,$query);
            }
        }
        echo "<script>alert('Attendance Refreshed successfully for the new session.'); document.location='adminTeachersAttendance.php';</script>";
    }
    if(isset($_POST['submitAttendance']))
    {  
        if ( isset( $_POST["attendance"] ) )
        { 
            $attendanceArray=array();
            foreach ( $_POST["attendance"] as $attendance ) // $_POST["name"] IS AN ARRAY.
            {    
                array_push($attendanceArray,$attendance);
            }
            $sql = "SELECT *  FROM teacherattendance order by id";
            $result = mysqli_query($connection, $sql);
            
            $index=0;
            $date=date("d/F/y");
            if(mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $tId=$row["id"];
                    $attendance=$attendanceArray[$index];
                    $index++;
                    $total=$row["total"];
                    
                    if($attendance==1)
                    {
                        $presents=$row["presents"];    
                        $presents++;
                        $total++;
                        $attendancePercentage = ($presents/$total)*100;
                        $query="update teacherattendance set presents=$presents,total=$total,attendance=$attendancePercentage where id=$tId";
                        mysqli_query($connection,$query);
                    }
                    else if($attendance==2)
                    {
                        $absents=$row["absents"];
                        $absents++;
                        $total++;
                        $attendancePercentage = ($presents/$total)*100;
                        $query="update teacherattendance set absents=$absents,total=$total,attendance=$attendancePercentage where id=$tId";
                        mysqli_query($connection,$query);
                    }
                    else if($attendance==3)
                    {
                        $leaves=$row["leaves"];
                        $leaves++;
                        $query="update teacherattendance set leaves=$leaves where id=$tId";
                        mysqli_query($connection,$query);
                    }
                }
                echo "<script>alert('Attendance Updated successfully for $date .'); document.location='adminTeachersAttendance.php';</script>";
            }
        }
        else echo "Error: no data";
    }
?>