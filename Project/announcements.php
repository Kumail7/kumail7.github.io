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
    <title>Announcements</title>
</head>
<body>
    <main class="container">
        <div>
            <div class="table-responsive-md" id="announcementTable">
            <table class="table table-info"><h1 class="justify-content-center bg-info" id=t1 >Transport</h1>
                <thead class="thead-info justify-content-center">
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
    </main>
</body>
</html>