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
    <link rel="stylesheet" href="css/teacherStudents.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/teacher.js"></script>
    <title>Students</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">Teacher Portal</a>
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
    <main class="container">
        <div class="table-responsive-md" id="studentTable">
            <table class="table table-info"><h1 class="justify-content-center bg-info" id=t1>Student Records<i class="fa fa-book"></i></h1>
                <thead class="thead-info bg-info text-white">
                    <tr>
                        <th>Rollno</th>
                        <th>Name</th>
                        <th>Father's name</th>
                        <th>Class</th>
                        <th>Phone Number</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $user = $_SESSION['user']; //username of teacher logged in
                    $tId = $_SESSION['id'];

                    $sql = "SELECT classteacher FROM teacher where id='$tId'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);
                    if(mysqli_num_rows($result) > 0)
                    {
                        if($row['username'==$user])
                        {
                            $teacherClass = $row['classteacher'];
                        }
                    }

                    $sql = "SELECT *  FROM student order by rollno";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            if($row['class']==$teacherClass)
                            {
                                echo '<tr>';
                                    echo '<td>'. $row['rollno'] .'</td>';
                                    echo '<td>'. $row['sname'] .'</td>';
                                    echo '<td>'. $row['fathersname'] .'</td>';
                                    echo '<td>'. $row['class'] .'</td>';
                                    echo '<td>'. $row['phone'] .'</td>';
                                echo '</tr>';
                            }
                            
                        }
                    }
                    // echo $_SESSION['user'];
                    
                ?>
            </table>
        </div>
        <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createStudentPDF()">PDF<i class="fa fa-print"></i></button>
    </main>
    
</body>
</html>
