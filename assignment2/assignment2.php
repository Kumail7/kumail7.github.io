<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>
        Assignment2
    </title>
    <script type="text/javascript">
        function GetSelectedTextValue(ddlFruits) 
        {
            var selectedText = ddlFruits.options[type.selectedIndex].innerHTML;
            var selectedValue = ddlFruits.value;
            // alert("Selected Text: " + selectedText + " Value: " + selectedValue);

            if(selectedValue=="1")
            {
                // alert("Selected Text: " + selectedText);
                document.getElementById("heading").innerHTML="Speed difference";
                
                document.getElementById("initialSpeedLabel").innerHTML="Initial Speed";
                document.getElementById("finalSpeedLabel").innerHTML="Final Speed";
                document.getElementById("timeLabel").innerHTML="Time";
                document.getElementById("accelerationLabel").innerHTML="Acceleration";

               // document.getElementById("inp1").value="";
                document.getElementById("first").style.display="";
                document.getElementById("third").style.display="";
                document.getElementById("secondSpeed").style.display="";
                document.getElementById("secondDistance").style.display="none";
                document.getElementById("firstMass").style.display="none";
                document.getElementById("secondMass").style.display="none";
            }
            else if(selectedValue=="2")
            {
                // alert("Selected Text: " + selectedText);
                document.getElementById("heading").innerHTML="Distance travelled";
                
                document.getElementById("first").style.display="";
                document.getElementById("initialSpeedLabel").innerHTML="Initial Speed";
                document.getElementById("distanceLabel").innerHTML="Distance";
                document.getElementById("timeLabel").innerHTML="Time";
                document.getElementById("accelerationLabel").innerHTML="Acceleration";


                document.getElementById("secondSpeed").style.display="none";
                document.getElementById("secondDistance").style.display="";
                document.getElementById("firstMass").style.display="none";
                document.getElementById("secondMass").style.display="none";
            }
            else if(selectedValue=="3")
            {
                // alert("Selected Text: " + selectedText);
                document.getElementById("heading").innerHTML="Net force";
                
                document.getElementById("massLabel").innerHTML="Mass";
                document.getElementById("forceLabel").innerHTML="Net force";
                document.getElementById("accelerationLabel").innerHTML="Acceleration";

                document.getElementById("first").style.display="none";
                document.getElementById("secondSpeed").style.display="none";
                document.getElementById("secondDistance").style.display="none";
                document.getElementById("third").style.display="none";
                document.getElementById("firstMass").style.display="";
                document.getElementById("secondMass").style.display="";
            }

        }
    </script>

</head>
<body>
    
    <div class="main" id="main">
    <h1>Acceleration Calculator </h1>
    <div class="div1">
          <form action="execution.php" method="POST">
                    <label for="">Given</label><select id="type" name="type" onchange="GetSelectedTextValue(this)" class="select">
                        <option id="option1" value="1" name="type1">Speed Difference</option>
                        <option id="option2" value="2" name="type2">Distance Travelled</option>
                        <option id="option3" value="3" name="type3">Mass and Force</option>
                    </select>
                <h3 id="heading">Speed difference</h3>

                <div id="first">
                            <label id="initialSpeedLabel">Initial speed</label><br>
                            <input type="number" name="initialspeed" id="initialSpeed" class="inp" min="0">
                                            <select name="initialSpeedUnit" id="" class="select">
                                                <option value="1">meters per second (m/s)</option>
                                                <option value="2">kilometers per hour (km/h)</option>
                                                <option value="3">feets per second (ft/s)</option>
                                                <option value="4">miles per hour (mph)</option>
                                                <option value="5">knots</option>
                                                <option value="6">kilometers per second (km/s)</option>
                                                <option value="7">miles per second (mi/s)</option>
                                                <option value="8">light speed (c)</option>
                                            </select><br>
                </div>
                <div id="firstMass" style="display: none;">
                    <label id="massLabel">Mass</label><br> <input type="number" name="mass" id="mass" class="inp" min="0">
                                    <select name="massUnit" id="" class="select">
                                        <option value="1">milligrams (mg)</option>
                                        <option value="2">grams (g)</option>
                                        <option value="3">kilograms (kg)</option>
                                        <option value="4">metric tons (t)</option>
                                        <option value="5">grains (gr)</option>
                                        <option value="6">drachms (dr)</option>
                                        <option value="7">ounces (oz)</option>
                                        <option value="8">pounds (lb)</option>
                                        <option value="9">stones (stone)</option>
                                        <option value="10">US short tons (US ton)</option>
                                        <option value="11">imperial tons (Long ton)</option>
                                    </select><br>
                </div>
                <div id="secondSpeed">
                            <label id="finalSpeedLabel">Final speed</label><br> <input type="number" name="finalspeed" id="finalSpeed" class="inp" min="0">
                                        <select name="finalSpeedUnit" id="" class="select">
                                            <option value="1">meters per second (m/s)</option>
                                            <option value="2">kilometers per hour (km/h)</option>
                                            <option value="3">feets per second (ft/s)</option>
                                            <option value="4">miles per hour (mph)</option>
                                            <option value="5">knots</option>
                                            <option value="6">kilometers per second (km/s)</option>
                                            <option value="7">miles per second (mi/s)</option>
                                            <option value="8">light speed (c)</option>
                                        </select><br>
                </div>     

                <!-- distance's second block -->
                <div id="secondDistance" style="display: none;">
                    <label id="distanceLabel">Distance</label><br>
                      <input type="number" name="distance" id="distance" class="inp" min="0">
                                <select name="distanceUnit" id="" class="select">
                                    <option value="1">meters (m)</option>
                                    <option value="2">milimeters (mm)</option>
                                    <option value="3">centimeters (cm)</option>
                                    <option value="4">kilometers (km)</option>
                                    <option value="5">inches (in)</option>
                                    <option value="6">feet (ft)</option>
                                    <option value="7">yards (yd)</option>
                                    <option value="8">miles (mi)</option>
                                    <option value="9">feet/inches</option>
                                    <option value="10">meters/centimeters</option>
                                </select><br>
                </div>
                <div id="secondMass" style="display: none;">
                    <label id="forceLabel">Net force</label><br>
                     <input type="number" name="force" id="force" class="inp" min="0">
                                    <select name="forceUnit" id="" class="select">
                                        <option value="1">newtons (N)</option>
                                        <option value="2">kilonewtons (kN)</option>
                                        <option value="3">meganewtons (MN)</option>
                                        <option value="4">giganewtons (GN)</option>
                                        <option value="5">teranewtons (TN)</option>
                                        <option value="6">poundals (pdl)</option>
                                        <option value="7">pounds-force (lbf)</option>
                                        <option value="8">dynes (dyn)</option>
                                    </select><br>
                </div>             
                <div id="third">
                            <label id="timeLabel">Time</label><br>
                            <input type="number" name="time" id="time" class="inp" min="0">
                                        <select name="timeUnit" id="" class="select">
                                                <option value="1">seconds (s)</option>
                                                <option value="2">minutes (mins)</option>
                                                <option value="3">hour (hrs)</option>
                                                <option value="4">day (days)</option>
                                                <option value="5">weeks (wks)</option>
                                                <option value="6">months (mos)</option>
                                                <option value="7">year (yrs)</option>
                                                <option value="8">minutes/seconds</option>
                                                <option value="9">hours/minutes</option>
                                        </select><br>
                </div>
                <div id="fourth">
                        <label id="accelerationLabel">Acceleration</label><br>
                        <input type="number" name="acceleration" id="acceleration" class="inp" min="0" >
                            <select name="accelerationUnit" id="" class="select">
                                    <option value="1">meters per second squared (m/s&sup2;)</option>
                                    <option value="2">gravitational field strength (g)</option>
                                    <option value="3">feet per second squared (feet/s&sup2;)</option>
                            </select><br>
                </div>
                <button name="submit">Calculate</button>
        </form>
    </div>
    </div>  
</body>
</html>