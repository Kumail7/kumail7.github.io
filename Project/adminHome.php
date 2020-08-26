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
    <title>Admin</title>
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
                        <li class="nav-item"><a class="nav-link  active" id="navlink" id="navlink" href="adminHome.php">Home</a></li>
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
            <div class="jumbotron bg-info text-white">
                <h1>Admin Login Successful!</h1>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 thumbnail">
                    <div class="jumbotron bg-info text-white display" id="teachers">
                        <?php
                            $con = mysqli_connect("localhost","root","","wp_project");
                            if($con)
                            {
                                $doc = new DomDocument;
                                // We need to validate our document before referring to the id
                                $doc->validateOnParse = true;
                                // $doc->Load('book.xml');
                                $result = mysqli_query($con,"select count(*)from teacher");
                                if(!$result)
                                {
                                    die("Query Failed" . mysqli_error($con));
                                }
                                else 
                                {
                                    $row = mysqli_fetch_array($result);
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $dpTeachers = $row[0];   
                                        echo "<h1>Teachers <br> $dpTeachers</h1>";       
                                    }
                                }        
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 thumbnail">
                    <div class="jumbotron bg-info text-white" id="students">
                        <?php
                            $con = mysqli_connect("localhost","root","","wp_project");
                            if($con)
                            {
                                $doc = new DomDocument;
                                // We need to validate our document before referring to the id
                                $doc->validateOnParse = true;
                                // $doc->Load('book.xml');
                                $result = mysqli_query($con,"select count(*)from student");
                                if(!$result)
                                {
                                    die("Query Failed" . mysqli_error($con));
                                }
                                else 
                                {
                                    $row = mysqli_fetch_array($result);
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        $students = $row[0];   
                                        echo "<h1>Students <br> $students</h1>";       
                                    }
                                }        
                            }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
        
    </main>       
    
    
</body>
</html>