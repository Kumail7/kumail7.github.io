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
    <title>Admin Announcements</title>
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
                                <a class="dropdown-item" href="adminTeachersAttendance.php">Teacher Attendance</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="adminTransport.php">Transport</a></li>
                        <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="adminAnnouncements.php">Announcement</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                    </ul>
                </div>
	    </nav>
    </header>
    <main class="container">
        <div>
            <div class="table-responsive-md" id="announcementTable">
            <!-- basic table -->
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1 >Announcements</h1>
                <thead class="thead-info justify-content-center bg-info text-white">
                    <tr >
                        <th>Id</th>
                        <th>Time</th>
                        <th>Announcement</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $sql = "SELECT *  FROM announcements order by time";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                echo '<td>'. $row['id'] .'</td>';
                                echo '<td>'. $row['time'] .'</td>';
                                echo '<td>'. $row['announcement'] .'</td>';
                            echo '</tr>'; 
                        }   
                    }
                ?>
            </table>
        </div>

        <div>
                <div class="card">
                    <div class="card-header bg-dark"><h2 class="card-title text-light" id="cardtitle">Add Announcement</h2></div>
                    <div class="card-body">
                
                    <form action ="" method="post" id="form">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                        <i class="fa fa-exclamation-triangle"></i>
                                        <label for="announcement">Announcement</label>
                                        <textarea name="announcement" form="form" placeholer="Enter Announcement here..."></textarea>
                                        <!-- <input type="number" class="form-control" name="routeId" id="routeId" placeholder="RouteId" required> -->
                                    </div>    
                            </div>	
                            
                        </div>
                        <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Add Announcement<i class="fa fa-edit"></i></button>
                    </form>
                </div>
        </div>
    </main>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $announcement= $_POST['announcement'];
        
        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
        if($connection)
        {
            $sql ="insert into announcements
                        (announcement)
                        values ('$announcement')";
                        
            if (mysqli_query($connection, $sql)) 
            {
                echo "<script>alert(\"Announcement Added Successfully.\");document.location='adminAnnouncements.php';</script>";
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