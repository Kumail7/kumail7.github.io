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
                 
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout<i class="fa fa-sign-out" style="margin-left:3px; color: white;"></i></a></li>
                 
                </ul>
                </ul>
            </div>
	    </nav>
    </header>

    <main class="container">

        <div class="table-responsive-md" id="marksTable">
            <form action="" method="post">
            <table class="table table-info"><h1 class="justify-content-center bg-info" id="t1">Student Marks</h1>
                <?php
                        $tId=$_SESSION['id'];
                        $connection = mysqli_connect('localhost', 'root', '', 'wp_project');
                        if(mysqli_query($connection,"select * from teacher where id=$tId"))
                        {
                            $result=mysqli_query($connection,"select * from teacher where id=$tId");
                            if(mysqli_num_rows($result)>0)
                            {
                                while ($row = mysqli_fetch_assoc($result)) 
                                {   
                                    $class =$row['classteacher'];
                                    $name =$row['name'];
                                }
                            }   
                        }
                        echo '<thead><tr><td class="bg-info text-white">Class : '.$class."</td></tr></thead>";
                ?>	 
                <thead class="thead-info bg-info text-white">
                    <tr>
                        <th>Rollno</th>
                        <th>Name</th>
                        <!-- <th>Class</th> -->
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

                    $students=mysqli_num_rows($result);

                    if(mysqli_num_rows($result) > 0)
                    {
                        if($row['id'==$tId])
                        {
                            $teacherClass = $row['classteacher'];
                            $teacherSubject = $row['subjectname'];
                            // echo 'Teacher<br>'.$teacherSubject.' '.$teacherClass;
                        }
                    }
                    
                    $sql = "SELECT *  FROM studentmarks where class ='$teacherClass' order by rollno,subject";
                    $result = mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {   
                            echo '<tr>';
                                // echo "<td contenteditable='true'><input type='number' name='naam[]'/></td>";
                                    echo '<td>'. $row['rollno'] .'</td>';
                                    echo '<td>'. $row['sname'] .'</td>';
                                    // echo '<td>'. $row['class'] .'</td>';
                                    echo '<td>'. $row['subject'] .'</td>';
                                    echo "<td contenteditable='true'><input type='number' min=0 max =20 name='exam1[]' class='marks' value=". $row['assessment1'] .'></td>';
                                    echo "<td contenteditable='true'><input type='number' min=0 max =100 name='midterm[]' class='marks' value=". $row['midterm'] .'></td>';
                                    echo "<td contenteditable='true'><input type='number' min=0 max =20 name='exam2[]' class='marks' value=". $row['assessment2'] .'></td>';
                                    echo "<td contenteditable='true'><input type='number' min=0 max =100 name='final[]' class='marks' value=". $row['final'] .'></td>';
                            echo '</tr>';    
                        }
                        
                    }
                    // echo $_SESSION['user'];
                    
                ?>
            </table>
        </div>
             <button class="btn-block btn-lg btn-primary"id="printPdf" onclick="createMarksPDF()">PDF<i class="fa fa-print"></i></button>
            <button class="btn-block btn-lg btn-primary"name="submitMarks">Submit Marks<i class="fa fa-enter"></i></button>
            <button class="btn-block btn-lg btn-success"name="refresh">New session<i class="fa fa-refresh"></i></button>
        </form>
        

    </main>

</body>
</html>
<?php

    if(isset($_POST['submitMarks']))
    {
        if( (isset($_POST['exam1'])) && (isset($_POST['midterm'])) && (isset($_POST['exam2'])) && (isset($_POST['final'])))
        {
            $assessment1= array(); //numberStudents*subjects
            $midterm= array();
            $assessment2= array();
            $final= array();
            $subject=array("Computer","English","Islamiyat","Maths","Science","SST","Urdu");
            $subjectSenior =array("Computer","Chemistry","English","Islamiyat","Maths","Pakistan Studies","Physics","Urdu");
            echo 'Assessment1'."<br>";
            foreach($_POST['exam1'] as $x)
            {
                echo $x."<br>";
                array_push($assessment1,$x);
            }
            echo 'Midterm'."<br>";
            foreach($_POST['midterm'] as $x)
            {
                echo $x."<br>";
                array_push($midterm,$x);
            }
            echo 'Assessment2'."<br>";
            foreach($_POST['exam2'] as $x)
            {
                echo $x."<br>";
                array_push($assessment2,$x);
            }
            echo 'Final'."<br>";
            foreach($_POST['final'] as $x)
            {
                echo $x."<br>";
                array_push($final,$x);
            }

            $index=0;
            $subIndex=0;

            $query = "select rollno from student where class =$teacherClass order by rollno"; // select rollnos
            $result = mysqli_query($connection,$query);
            $rollnos = array();
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    array_push($rollnos,$row['rollno']);
                }
            }         
            if($teacherClass<9)
            {
                foreach($rollnos as $r)
                {
                    echo '<br>Roll number : '.$r;
                    for($j=0;$j<7;$j++)
                    {
                        $subj=$subject[$subIndex];
                        echo "Subject : ".$subj."<br>";
                        $exam1=$assessment1[$index]; //exam1 marks
                        echo "Exam 1 : ".$exam1."<br>";
                        $mid=$midterm[$index];//mid marks
                        echo "Midterm : ".$mid."<br>";
                        $exam2=$assessment2[$index];//exam2 marks
                        echo "Exam 2 : ".$exam2."<br>";
                        $finals=$final[$index];//final marks
                        echo "Midterm : ".$finals."<br><br>";
                        $query = "update studentmarks set assessment1=$exam1,midterm=$mid,assessment2=$exam2,final=$finals where rollno=$r and subject='$subj'";
                        $index++;
                        $subIndex++;
                        if(mysqli_query($connection,$query))
                        {
                            echo 'Success';
                        }
                        else
                        {
                            echo 'Error : '.mysqli_error($connection);
                        }
                    }
                    $subIndex=0;
                }
                echo '<script>document.location="teacherStudentsMarks.php"</script>';
            }
            else
            {
                foreach($rollnos as $r)
                {
                    echo '<br>Roll number : '.$r;
                    for($j=0;$j<8;$j++)
                    {
                        $subj=$subjectSenior[$subIndex];
                        echo "Subject : ".$subj."<br>";
                        $exam1=$assessment1[$index]; //exam1 marks
                        echo "Exam 1 : ".$exam1."<br>";
                        $mid=$midterm[$index];//mid marks
                        echo "Midterm : ".$mid."<br>";
                        $exam2=$assessment2[$index];//exam2 marks
                        echo "Exam 2 : ".$exam2."<br>";
                        $finals=$final[$index];//final marks
                        echo "Midterm : ".$finals."<br><br>";
                        $query = "update studentmarks set assessment1=$exam1,midterm=$mid,assessment2=$exam2,final=$finals where rollno=$r and subject='$subj'";
                        $index++;
                        $subIndex++;
                        if(mysqli_query($connection,$query))
                        {
                            echo 'Success';
                        }
                        else
                        {
                            echo 'Error : '.mysqli_error($connection);
                        }
                    }
                    $subIndex=0;
                }
                echo '<script>document.location="teacherStudentsMarks.php"</script>';
            }
        }
    }
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
                echo "<script>alert(\"Marks Inserted Successfully.\");document.location='teacherStudentsMarks.php';</script>";
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
                echo "<script>alert(\"Marks Inserted Successfully.\");document.location='teacherStudentsMarks.php';</script>";
            } 
            else 
            {
                echo '<script>alert(\"Error in Inserting marks! \")</script>';
            }   
        }
    }
    if(isset($_POST['refresh']))
    {
        $query = "update studentmarks set assessment1=0,midterm=0,assessment2=0,final=0 where class=$teacherClass";
        if(mysqli_query($connection,$query))
        {
            echo '<script>alert("New Session Refreshed Successfully.");document.location="teacherStudentsMarks.php";</script>';
        }
    }
?>