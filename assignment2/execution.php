<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <title>Document</title>
</head>
<body>
    <div class="main" id="main">
        <h1>Acceleration Calculator</h1>
        <!-- <input type="number" name="acceleration" id="acceleration" class="inp" min="0" value="<?php echo htmlentities($acceleration)?>"> -->

        <?php 
    $con = mysql_connect("localhost","root","");
    if(!$con)
    {
        die('Could not connect: '.mysql_error());
    }
    else
    {
        //    echo 'Connected Successfully<br>';
        $db_selected = mysql_select_db("assignment2",$con);
        if(!$db_selected)
        {
            die("Can\'t use assignment2 : ".mysql_error());
        }
        else
        {
            if(isset($_POST['submit']))
            {
                if(isset($_POST['type']))
                {
                    // echo 'Type = ';
                    $type = $_POST['type']; 
                    // echo '<h3>'.$type.'</h3>';
                    //echo $type.'<br>';
                }
                $initialSpeed;
                $finalSpeed;
                $time;
                $acceleration;

                if($type==1)
                {
                   
                    if(isset($_POST['initialspeed']))
                    {
                        $initialSpeed=$_POST['initialspeed'];
                        if(isset($_POST['initialSpeedUnit']))
                        {
                            $initialSpeedUnit = $_POST['initialSpeedUnit'];
                            switch ($initialSpeedUnit) 
                            {
                                case 1:
                                    echo '<h3>Initial Speed = '.$initialSpeed.'m/s<br></h3>';
                                    break;

                                case 2:
                                    $sql ="select kmh from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'km/h</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select fts from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'ft/s</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 4:
                                    $sql ="select mph from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'mp/h</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 5:
                                    $sql ="select knots from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'knots</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 6:
                                    $sql ="select kms from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'kms</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 7:
                                    $sql ="select mis from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'mis</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 8:
                                    $sql ="select c from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'c</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                default:
                                    
                            }
                           
                        }
                        
                    }
                    if(isset($_POST['finalspeed']))
                    {
                        $finalspeed=$_POST['finalspeed'];
                        if(isset($_POST['finalSpeedUnit']))
                        {
                            $finalSpeedUnit = $_POST['finalSpeedUnit'];
                            switch ($finalSpeedUnit) 
                            {
                                case 1:
                                    echo '<h3>Final Speed = '.$finalspeed.'s<br></h3>';
                                    break;
                                case 2:
                                    $sql ="select kmh from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'km/h<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select fts from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'ft/s<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 4:
                                    $sql ="select mph from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'mp/h<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 5:
                                    $sql ="select knots from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'knots<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 6:
                                    $sql ="select kms from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'km/s<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 7:
                                    $sql ="select mis from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'mi/s<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 8:
                                    $sql ="select c from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $finalspeed=$finalspeed/$result['0'];
                                        echo 'Final Speed  = '.$finalspeed.'c<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                default:
                                    
                            }
                           
                        }
                        
                    }
                    if(isset($_POST['time']))
                    {
                        
                            $time=$_POST['time'];
                            
                            if(isset($_POST['timeUnit']))
                            {
                                $timeUnit = $_POST['timeUnit'];
                                switch ($timeUnit) 
                                {
                                    case 1:
                                        echo '<h3>Time  = '.$time.'s</h3>';
                                        break;

                                    case 2:
                                        $sql ="select min from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'mins</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 3:
                                        $sql ="select hrs from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'hrs</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 4:
                                        $sql ="select days from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'days</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 5:
                                        $sql ="select weeks from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'weeks</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 6:
                                        $sql ="select months from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'months</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 7:
                                        $sql ="select years from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'years</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    default:
                                        
                                }
                            }
                            }

                    $acceleration=($finalspeed-$initialSpeed)/$time;

                    if(isset($_POST['acceleration']))
                    {
                        if(isset($_POST['accelerationUnit']))
                        {
                            $accelerationUnit = $_POST['accelerationUnit'];
                            switch ($accelerationUnit) 
                            {
                                case 1:
                                    echo '<h3>Acceleration  = '.$acceleration.'ms/s<sup>2<sup>'.'<br></h3>';
                                    break;

                                case 2:
                                    $sql ="select g from acceleration where Ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'g'.'<br></h3>';
                                    }
                                    else
                                    {
                                        // echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select ftss from acceleration where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'ft/s<sup>2<sup>'.'<br></h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                default:
                                    
                            }
                           
                        }
                    }
                     
                    
                }
                if($type==2)
                {
                    if(isset($_POST['initialspeed']))
                    {
                        $initialSpeed=$_POST['initialspeed'];
                        if(isset($_POST['initialSpeedUnit']))
                        {
                            $initialSpeedUnit = $_POST['initialSpeedUnit'];
                            switch ($initialSpeedUnit) 
                            {
                                case 1:
                                    echo '<h3>Initial Speed = '.$initialSpeed.'m/s<br></h3>';
                                    break;

                                case 2:
                                    $sql ="select kmh from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'km/h</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select fts from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'ft/s</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 4:
                                    $sql ="select mph from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'mp/h</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 5:
                                    $sql ="select knots from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'knots</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 6:
                                    $sql ="select kms from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'kms</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 7:
                                    $sql ="select mis from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'mis</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 8:
                                    $sql ="select c from speed where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $initialSpeed=$initialSpeed/$result['0'];
                                        echo '<h3>Initial Speed = '.$initialSpeed.'c</h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                default:
                                    
                            }
                           
                        }
                        
                    }
                    if(isset($_POST['distance']))
                    {
                        
                        $distance = $_POST['distance']; 
                        
                        if(isset($_POST['distanceUnit']))
                        {
                            $distanceUnit = $_POST['distanceUnit'];
                            switch ($distanceUnit) 
                            {
                                case 1:
                                    echo 'Distance  = '.$distance.'m<br>';
                                    break;

                                case 2:
                                    $sql ="select mm from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'mm<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select cm from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'cm<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 4:
                                    $sql ="select km from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'km<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 5:
                                    $sql ="select inch from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'in<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 6:
                                    $sql ="select ft from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'ft<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 7:
                                    $sql ="select yd from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'yd<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                case 8:
                                    $sql ="select mi from distance where m =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $distance=$distance/$result['0'];
                                        echo 'Distance  = '.$distance.'mi<br>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                break;

                                default:
                                    
                            }
                           
                        }
                        
                    }
                    if(isset($_POST['time']))
                    {
                        
                            $time=$_POST['time'];

                            if(isset($_POST['timeUnit']))
                            {
                                $timeUnit = $_POST['timeUnit'];
                                switch ($timeUnit) 
                                {
                                case 2:
                                        $sql ="select min from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'mins</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 3:
                                        $sql ="select hrs from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'hrs</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 4:
                                        $sql ="select days from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'days</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 5:
                                        $sql ="select weeks from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'weeks</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 6:
                                        $sql ="select months from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'months</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 7:
                                        $sql ="select years from time where s =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $time=$time/$result['0'];
                                            echo '<h3>Time  = '.$time.'years</h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    default:
                                        
                                }
                            
                            }
                    }
                    $finalspeed=$distance/$time;
                    $acceleration = ($finalspeed-$initialSpeed)/$time;
                    if(isset($_POST['acceleration']))
                    {
                        if(isset($_POST['accelerationUnit']))
                        {
                            $accelerationUnit = $_POST['accelerationUnit'];
                            switch ($accelerationUnit) 
                            {
                                case 1:
                                    echo '<h3>Acceleration  = '.$acceleration.'ms/s<sup>2<sup>'.'<br></h3>';
                                    break;

                                case 2:
                                    $sql ="select g from acceleration where Ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'g'.'<br></h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select ftss from acceleration where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'ft/s<sup>2<sup>'.'<br></h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                default:
                                    
                            }
                           
                        }
                    }
                }
                if($type==3)
                {
                    $force;
                    $mass;   
                    if(isset($_POST['mass']))
                    {
                        
                        $mass=$_POST['mass'];
                        
                            if(isset($_POST['massUnit']))
                            {
                                $massUnit = $_POST['massUnit'];
                                switch ($massUnit) 
                                {
                                    case 1 :
                                        echo '<h3>Mass  = '.$mass.'kg<br></h3>';
                                        break;
                                    case 2:
                                        $sql ="select mg from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'mg<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 3:
                                        $sql ="select g from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'g<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 4:
                                        $sql ="select t from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'t<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 5:
                                        $sql ="select gr from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'gr<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 6:
                                        $sql ="select dr from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'dr<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 7:
                                        $sql ="select oz from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'oz<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 8:
                                        $sql ="select lb from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'lbs<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 9:
                                        $sql ="select stone from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'stone<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 10:
                                        $sql ="select uston from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'US ton<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 11:
                                        $sql ="select longton from mass where kg =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $mass=$mass/$result['0'];
                                            echo '<h3>Mass  = '.$mass.'Long ton<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    default:
                                        
                                }
                            
                            }

                    }
                    if(isset($_POST['force']))
                    {
                        
                        $force=$_POST['force'];
                            if(isset($_POST['forceUnit']))
                            {
                                $forceUnit = $_POST['forceUnit'];
                                switch ($forceUnit) 
                                {   case 1:
                                        echo '<h3>Force  = '.$force.'N<br></h3>';
                                        break;
                                    case 2:
                                        $sql ="select kn from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'kN<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 3:
                                        $sql ="select mn from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'MN<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                        break;

                                    case 4:
                                        $sql ="select gn from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'GN<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 5:
                                        $sql ="select tn from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'TN<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 6:
                                        $sql ="select pdl from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'pdl<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 7:
                                        $sql ="select lbf from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'lbf<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;

                                    case 8:
                                        $sql ="select dyn from netforce where n =1";
                                        if(mysql_query($sql,$con))
                                        {
                                            $temp = mysql_query($sql,$con);
                                            //echo "Query executed successfully!";
                                            $result = mysql_fetch_row($temp);
                                            //echo $result['0'];
                                            $force=$force/$result['0'];
                                            echo '<h3>Force  = '.$force.'dyn<br></h3>';
                                        }
                                        else
                                        {
                                            //echo "Error in executing query : ".mysql_error();
                                        }
                                    break;
                                    default:
                                        
                                }
                            }
                        
                    }
                    $acceleration=$force/$mass;
                    if(isset($_POST['acceleration']))
                    {
                        if(isset($_POST['accelerationUnit']))
                        {
                            $accelerationUnit = $_POST['accelerationUnit'];
                            switch ($accelerationUnit) 
                            {
                                case 1:
                                    echo '<h3>Acceleration  = '.$acceleration.'ms/s<sup>2<sup>'.'<br></h3>';
                                    break;

                                case 2:
                                    $sql ="select g from acceleration where Ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'g'.'<br></h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                case 3:
                                    $sql ="select ftss from acceleration where ms =1";
                                    if(mysql_query($sql,$con))
                                    {
                                        $temp = mysql_query($sql,$con);
                                        //echo "Query executed successfully!";
                                        $result = mysql_fetch_row($temp);
                                        //echo $result['0'];
                                        $acceleration=$acceleration/$result['0'];
                                        echo '<h3>Acceleration  = '.$acceleration.'ft/s<sup>2<sup>'.'<br></h3>';
                                    }
                                    else
                                    {
                                        //echo "Error in executing query : ".mysql_error();
                                    }
                                    break;

                                default:
                                    
                            }
                           
                        }
                    }
                }
                     
            }
        }
         
    }

    mysql_close($con);
    ?>

    </div>
</body>
</html>