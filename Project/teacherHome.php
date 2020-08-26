<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/teacherHome.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Teacher</title>
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
                    <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="teacherHome.php">Home</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Students</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="teacherStudents.php">Student Records</a>
                                <a class="dropdown-item" href="teacherStudentsMarks.php">Student Marks</a>
                                <a class="dropdown-item" href="teacherStudentsAttendance.php">Student Attendance</a>
                            </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="teacherTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="teacherAnnouncements.php">Announcements</a></li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                </ul>
                </ul>
            </div>
	    </nav>
    </header>

    <main>

    </main>       
    
    <div class="main container">
        <div class="jumbotron bg-info text-white">
            <?php                                                        
                $tname = $_SESSION['tname'];
                $subject = $_SESSION['subject'];
                echo "<h1 >$tname</h1>";                       
            ?>
        </div>
        <div class="table-responsive-md" id="infoTable">
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1 >Teacher's Information<i class="fa fa-info"></i></h1>
                <thead class="thead-info justify-content-center bg-info text-white">
                    <tr >
                        <th>Id</th>
                        <th>Name</th>
                        <th>Class Teacher</th>
                        <th>Subject</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Salary</th>
                        <th>Base Salary</th>
                        <th>Salary Status</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $tId = $_SESSION['id'];
                    $sql = "SELECT *  FROM teacher where id ='$tId'";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                echo '<td>'. $row['id'] .'</td>';
                                echo '<td>'. $row['name'] .'</td>';
                                if($row['classteacher']=="")
                                {
                                    echo '<td>-</td>';
                                }
                                else
                                {
                                    echo '<td>'. $row['classteacher'] .'</td>';
                                }
                                echo '<td>'. $subject .'</td>';
                                echo '<td>'. $row['username'] .'</td>';
                                echo '<td>'. $row['password'] .'</td>';
                                echo '<td>'. $row['phonenumber'] .'</td>';
                                echo '<td>'. $row['salary'] .'</td>';
                                echo '<td>'. $row['basesalary'] .'</td>';
                                if($row['salarystatus']==0)
                                {
                                    echo '<td>Unpaid</td>';
                                }
                                else 
                                {
                                    echo '<td>Paid</td>';
                                }
                                
                            echo '</tr>'; 
                        }   
                    }
                ?>
            </table>
            </div>
    </div>
</body>
</html>