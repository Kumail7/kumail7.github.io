<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/student.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Student Home</title>
</head>
<body>
    <header>
		<nav class="navbar  navbar-expand-sm bg-info navbar-light fixed-top">
            <div class="navbar-header">
                <a href="#" name="top" class="navbar-brand"><img src="logo.jpg" alt="logo" style="width:40px; padding-right: 3px;">School Portal</a>
                <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="">Home</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="studentRecord.php">Record</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="studentTransport.php">Transport</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="studentAnnouncements.php">Announcement</a></li>
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
                    $sname = $_SESSION['sname'];
                    echo "<div class='jumbotron text-white'><h1>$sname</h1></div>";                       
                ?>
            <div class="table-responsive-md" id="infoTable">
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1 >Student Information<i class="fa fa-info"></i></h1>
                <thead class="thead-info justify-content-center bg-info text-white">
                    <tr >
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
                    $rollno = $_SESSION['roll'];
                    $sql = "SELECT *  FROM student where rollno ='$rollno'";
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
                                if($row['feestatus']==0)
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
    </main>

</body>
</html>