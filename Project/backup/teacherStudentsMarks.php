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
    <title>Student Marks</title>
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
                 
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout<i class="fa fa-user" style="margin-left:3px; color: white;"></i></a></li>
                 
                </ul>
                </ul>
            </div>
	    </nav>
    </header>

    <main class="container">

        <div class="table-responsive-md" id="marksTable">
            <!-- basic table -->
            <table class="table table-info"><h1 class="justify-content-center bg-info" id="t1">Student Marks</h1>
                <thead class="thead-info bg-info text-white">
                    <tr>
                        <th>Rollno</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Assessment1</th>
                        <th>Midterm</th>
                        <th>Assessment2</th>
                        <th>Final</th>
                    </tr>	
                </thead>
                <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                    $user = $_SESSION['user'];
                    $tId = $_SESSION['id'];
                    $sql = "SELECT id,classteacher,subjectname  FROM teacher where id='$tId'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);
                    if(mysqli_num_rows($result) > 0)
                    {
                        if($row['id'==$tId])
                        {
                            $teacherClass = $row['classteacher'];
                            $teacherSubject = $row['subjectname'];
                            // echo 'Teacher<br>'.$teacherSubject.' '.$teacherClass;
                        }
                    }
                    
                    $sql = "SELECT *  FROM studentmarks where class ='$teacherClass' order by subject,rollno";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                    echo '<td>'. $row['rollno'] .'</td>';
                                    echo '<td>'. $row['sname'] .'</td>';
                                    echo '<td>'. $row['class'] .'</td>';
                                    echo '<td>'. $row['subject'] .'</td>';
                                    echo '<td>'. $row['assessment1'] .'</td>';
                                    echo '<td>'. $row['midterm'] .'</td>';
                                    echo '<td>'. $row['assessment2'] .'</td>';
                                    echo '<td>'. $row['final'] .'</td>';
                            echo '</tr>';    
                        }
                        
                    }
                    // echo $_SESSION['user'];
                    
                ?>
            </table>
        </div>
        <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createMarksPDF()">PDF<i class="fa fa-print"></i></button>

        <div class="card">
				<div class="card-header bg-info"><h1 class="card-title bg-info" id="cardtitle">Add Student Marks</h1></div>
				<div class="card-body">
				    <form action ="" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <i class=" fa fa-id-card" ></i>
                                <label for="rollno">Roll No.</label>
                                <input type="number" class="form-control" name="rollno" id="rollno" placeholder="Roll No." required>
                            </div>
                            <div class="form-group col-lg-6">
                                <i class=" fa fa-id-card" ></i>
                                <label for="name">name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <i class=" fa fa-book" ></i>
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group col-lg-4 ">
                                <i class=" fa fa-pencil" ></i>
                                <label for="exam">Exam</label>
                                <select class= "form-control"name="exam" id="exam">
                                    <option value="1">Assessment1</option>
                                    <option value="2">Midterm</option>
                                    <option value="3">Assessment2</option>
                                    <option value="4">Final Exam</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <i class=" fa fa-graduation-cap" ></i>
                                <label for="marks">Marks</label>
                                <input type="number" class="form-control" name="marks" id="marks" placeholder="Marks"  required>
                            </div>
                        </div>	
                        <button type="submit" name ="submit" class="btn-block btn-lg btn-primary">Add Marks<i class="fa fa-plus"></i></button>
			        </form>
				</div>
        </div>

    </main>

</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $subject= $_POST['subject'];
        $exam= $_POST['exam'];
        $marks = $_POST['marks'];
        
        //currentclass =$class;

        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
        $result=mysqli_query($connection, "select class from student where rollno='$rollno'");
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $class = $row['class'];      
            }
        }       
        if($exam==1)
        {
            $exam="assessment1";    
        }
        else if($exam==2)
        {
            $exam="midterm";
        }
        else if($exam==3)
        {
            $exam="assessment2";
        }
        else if($exam==4)
        {
            $exam="final";   
        }
        $result=mysqli_query($connection, "select rollno,subject from studentmarks where rollno='$rollno'");
        if(mysqli_num_rows($result) > 0)
        {
            echo $sql;
            $updated=false;
            while ($row = mysqli_fetch_assoc($result)) 
            {
                if($rollno==$row['rollno'] && $subject==$row['subject'])
                {
                    $sql = "update studentmarks set $exam=$marks where rollno=$rollno";
                    $updated=true;
                }     
            }    
            if($updated==false) //new subject marks record inserted
            {
                $sql = "INSERT INTO studentmarks (rollno,sname,class,subject,$exam)
                VALUES($rollno,'$name', $class, '$subject', $marks);";
            }
            if (mysqli_query($connection, $sql)) 
            {
                echo "<script>alert(\"Marks Inserted Successfully.\");document.location='teacherStudents.php';</script>";
            } 
            else 
            {
                echo '<script>alert(\"Error in Inserting marks! \")</script>';
            }   
        }     
        else
        {
            $sql = "INSERT INTO studentmarks (rollno,sname,class,subject,$exam)
            VALUES($rollno,'$name', $class, '$subject', $marks);";
            echo $sql;
            if (mysqli_query($connection, $sql)) 
            {
                echo "<script>alert(\"Marks Inserted Successfully.\");document.location='teacherStudents.php';</script>";
            } 
            else 
            {
                echo '<script>alert(\"Error in Inserting marks! \")</script>';
            }   
        }
    }
?>