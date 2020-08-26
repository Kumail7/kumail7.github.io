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
    <title>Teacher Transport</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">Teacher Portal</a>
                <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav nav-pills">
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="teacherHome.php">Home</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Students</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="teacherStudents.php">Student Records</a>
                                <a class="dropdown-item" href="teacherStudentsMarks.php">Student Marks</a>
                                <a class="dropdown-item" href="teacherStudentsAttendance.php">Student Attendance</a>
                            </div>
                    </li>
                    <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="teacherTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="teacherAnnouncements.php">Announcements</a></li>
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
    </main>

</body>
</html>