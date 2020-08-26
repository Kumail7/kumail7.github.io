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
    <script src="js/student.js"></script>
    <title>Student Record</title>
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
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="studentHome.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" id="navlink" id="navlink" href="studentRecord.php">Record</a></li>
                    <li class="nav-item"><a class="nav-link" id="navlink" id="navlink" href="studentTransport.php">Transport</a></li>   
                    <li class="nav-item"><a class="nav-link " id="navlink" id="navlink" href="studentAnnouncements.php">Announcement</a></li>
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
                <div class="table-responsive-md">
                <div  id="attendanceTable">
                <table class="table table-info" id="atdTable">
                    <thead class="thead-info bg-info"><h1 class="bg-info text-white">Attendance</h1>
                        <tr>
                            <th>Presents</th>
                            <th>Absents</th>
                            <th>Leaves</th>
                            <th>Total Days</th>
                            <th>Perentage</th>
                        </tr>	
                    </thead>
                    <?php
                        session_start();
                        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                        $user = $_SESSION['user'];
                        $rollno = $_SESSION['roll'];

                        $sql = "SELECT *  FROM student where rollno='$rollno'";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_array($result);
                        $sql = "SELECT *  FROM studentattendance where rollno=$rollno";
                        $result = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<tr>';
                                        echo '<td>'. $row['presents'] .'</td>';
                                        echo '<td>'. $row['absents'] .'</td>';
                                        echo '<td>'. $row['leaves'] .'</td>';
                                        echo '<td>'. $row['total'] .'</td>';
                                        echo '<td>'. $row['attendance'] .'%</td>';
                                echo '</tr>';    
                            }
                        }
                        
                    ?>
                </table>
                </div>
            </div>
        </div>
        <div class="table-responsive-md" id="marksTable">
            <!-- basic table -->
            <table class="table table-info"><h1 class="justify-content-center bg-info text-white" id=t1 >Progress Report</h1>
            <?php
                        $rollno=$_SESSION['roll'];
                        if(mysqli_query($connection,"select * from student where rollno=$rollno"))
                        {
                            $result=mysqli_query($connection,"select * from student where rollno=$rollno");
                            if(mysqli_num_rows($result)>0)
                            {
                                while ($row = mysqli_fetch_assoc($result)) 
                                {   
                                    $class =$row['class'];
                                    $name =$row['sname'];
                                }
                            }   
                        }
                        echo '<thead class="bg-info"><tr><td class="bg-info text-white">Name : '.$name."</td>";
                        echo '<td class="bg-info text-white">Roll number : '.$rollno."</td>";
                        echo '<td class="bg-info text-white">Class : '.$class."</td></tr></thead>";
                    ?>	    
            <thead class="thead-info justify-content-center bg-info text-white">
                    <tr >
                        <th>Subject</th>
                        <th>Assessment1</th>
                        <th>Midterm</th>
                        <th>Assessment2</th>
                        <th>Final</th>
                    </tr>
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $rollno = $_SESSION['roll'];
                    $sql = "SELECT *  FROM studentmarks where rollno ='$rollno' order by subject,rollno";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                    echo '<td>'. $row['subject'] .'</td>';
                                    echo '<td>'. $row['assessment1'] .'</td>';
                                    echo '<td>'. $row['midterm'] .'</td>';
                                    echo '<td>'. $row['assessment2'] .'</td>';
                                    echo '<td>'. $row['final'] .'</td>';
                            echo '</tr>';    
                        }   
                    }
                ?>
            </table>
        </div>
        <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createMarksPDF()">PDF<i class="fa fa-print"></i></button>
    </main>

</body>
</html>