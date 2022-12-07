<!DOCTYPE html>
<html lan="en">
    <head>

        <!--LOGO redirects you to homepage-->
        <a href="index.html"><img src="vmsnoob_logocropped.png" alt="logo" id="pagelogo"></a>
        

        <title>VMPnoob - Unit 99</title>

        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">

        <!--Company Name - Unit #-->
        <h2 class="unitnumtitle">Empire Drywall - Unit 99</h2>

         <!--Calculator box for next oil change-->
         <div class="calculator_box">
                <h3 id="answer"></h3>
                    <input type="text" id="num1" placeholder="Enter Current KMs">
                    <input type="text" id="num2" placeholder="5000kms" readonly>
                    <button onclick="calculate()">Calculate</button>
            </div>
        
    </head>
    <body>

        <script>

             //Function to calculate next oil change in kilometers
             //User inputs current KMs and it outputs in how many KMs the next oil change will be, (every 5,000 kms)
             function calculate() {
            var field1=document.getElementById("num1").value;
            var field2=document.getElementById("num2").value;

            var result=parseInt(field1)+parseInt(5000);

            if (!isNaN(result)) {
            document.getElementById("answer").innerHTML="Next Oil Change is in  "+ result +" Kilometers.";
        }
    };

    function record_saved() {
        document.getElementById("submit_button").value;
        alert("Record Saved");
    };

    //"Oil Change History" Button Redirects you to the Oil Changes Table page
    function oilchangestable() {
        document.getElementById("oilchangehistory").value;
        window.location.href = "http://localhost:3000/99_oilchangestable.php";
        };
          

    //"Maintenance History" button redirects you to the Other Repairs & Maintenance table page
    function otherrepairstable(){
        document.getElementById("repairstable").value;
        window.location.href = "http://localhost:3000/99_otherrepairstable.php";
        }; 



        </script>


        <!--VEHICLE INFORMATION CARD TABLE-->
        <!--PHP code connecting to SQL database table to display information-->
        <div class="row">
            <div class="column">
        <table class="vehicleinfo">
            <thead>
            <tr>
                <th colspan="2">VEHICLE INFORMATION CARD</th>
            </tr>
            </thead>
            <tbody>
                
                <?php

                    //Connection to SQL 
                    $user = 'root';
                    $password = '';
                    $database = 'units';
                    $servername='localhost:3306';
                    $mysqli = new mysqli($servername, $user,
                            $password, $database);
 
                    // Checking for connection
                    if ($mysqli->connect_error) {
                        die('Connect Error (' .
                        $mysqli->connect_errno . ') '.
                        $mysqli->connect_error);
                    }
 
                    // SQL query to select data from database
                    $sql = " SELECT * FROM vehicle_units WHERE unit_num = 99 ";
                    $result = $mysqli->query($sql);
                    $mysqli->close();
                    ?>

                    <!--PHP CODE TO FETCH DATA FROM ROWS -->
                    <?php
                    // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td class="boldtitle">Make</td>
                        <td><?php echo $rows["make"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">Model</td>
                        <td><?php echo $rows["model"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">Year</td>
                        <td><?php echo $rows["year"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">VIN Number</td>
                        <td><?php echo $rows["vin_number"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">License Plate</td>
                        <td><?php echo $rows["license_plate"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">Driver</td>
                        <td><?php echo $rows["driver"]; ?></td>
                    </tr>
                    <tr>
                        <td class="boldtitle">Division(s)</td>
                        <td><?php echo $rows["division"]; ?></td>
                    </tr>

            </tbody>
            <?php
            }
            ?>
    </table>
    </div>
    

    <!--REGISTRATION & INSURANCE DETAILS TABLE-->
    <!--PHP code connecting to SQL database table to display information-->
    
    <div class="column">
    <table class="insurancetable">
        <thead>
            <tr>
                <th colspan="2">REGISTRATION & INSURANCE DETAILS</th>
            </tr>
        </thead>
        <tbody>

        <?php

        //Connection to SQL database
        $user = 'root';
        $password = '';
        $database = 'units';
        $servername='localhost:3306';
        $mysqli = new mysqli($servername, $user,
                 $password, $database);
  
        // Checking for connections
        if ($mysqli->connect_error) {
            die('Connect Error (' .
            $mysqli->connect_errno . ') '.
            $mysqli->connect_error);
        }
  
        // SQL query to select data from database
        $sql = " SELECT * FROM regist_insur WHERE unit_num = 99 ";
        $result = $mysqli->query($sql);
        $mysqli->close();
        ?>

        <?php
        // LOOP TILL END OF DATA
        while($rows=$result->fetch_assoc())
        {
        ?>
            
            <tr>
                <td>Registration Expiry</td>
                <td><?php echo $rows["reg_expiry"]; ?></td>
            </tr>
            
            <tr>
                <td>Registration Number</td>
                <td><?php echo $rows["reg_number"]; ?></td>
            </tr>
            <tr>
                <td>Insurance Company</td>
                <td><?php echo $rows["ins_comp"]; ?></td>
            </tr>
            <tr>
                <td>Policy #</td>
                <td><?php echo $rows["policy_num"]; ?></td>
            </tr>
            <tr>
                <td>Expiry Date</td>
                <td><?php echo $rows["ins_expiry"]; ?></td>
            </tr>
           
        </tbody>
        <?php
        }
        ?>

    </table>
    </div>
    </div>


    <!--OIL CHANGE LOG USER INPUT TABLE-->
    
    <form name="oilform" method="post" action="99_processform_oilchanges.php" onsubmit="required()">
    <table class="oilchanges">
        <thead>
            <tr>
                <th colspan="6">OIL CHANGE LOG</th>
            </tr>
            <tr>
                <td>Unit</td>
                <td>Date</td>
                <td>Provider</td>
                <td>Labour Hour(s)</td>
                <td>Cost</td>
                <td>Current KMs</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!--USER INPUT BOXES-->
                <td><input type="text" value="99"  name="unit_num" readonly></td>
                <td><input type="date" id="date" name="date" required></td>
                <td><input type="text" name="providers" required></td>
                <td><input type="text" id="labour_hours" name="labour_hours" required></td>
                <td><input type="text" id="cost" name="cost"></td>
                <td><input type="text" id="current_kms" name="current_kms"  required></td>
            </tr>
        </tbody>
    </table>

    <!--Submit Button, which submits user input to databse-->
    <input type="submit" value="Submit" class="submitbutton_oil" id="submit_button" onclick="record_saved()">
    </form>
    </div>

    <!--Oil Change History Button, which redirects you to Oil Change History Page-->
    <button type="button"  id="oilchangehistory" class="buttons" onclick="oilchangestable()">Oil Change History</button>



    <!--OTHER REPAIRS/ MAINTENANCE TABLE-->
    <form method="post" action="99_processform_otherrepairs.php">
    <table class="other_repairs" >
        <thead>
            <tr>
                <th colspan="5">OTHER REPAIRS/MAINTENANCE</th>
            </tr>
            <tr>
                <td>Unit</td>
                <td>Date</td>
                <td>Provider</td>
                <td>Description </td>
                <td>Total Amount</td> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <!--USER INPUT BOXES-->
                <td><input type="text" value="99"  name="unit_num" readonly></td>
                <td><input type="date" name="date" required></td>
                <td><input type="text" name="providers" required></td>
                <td><textarea  name="description" required></textarea></td>
                <td><input type="text" name="total_amount"required></td>
            </tr>
        </tbody> 
    </table>

    <!--Submit Button, which submits user input to databse-->
    <input type="submit" value="Submit" class="submitbutton_repairs" id="submit_button" onclick="record_saved()">
    </form>

    <!--Maintenance History Button, which redirects you to Maintenance History Page-->
    <button type="button"  id="repairstable" class="buttons" onclick="otherrepairstable()">Maintenance History</button>





    <!--Customer Service Phone Number - Bottom of Page-->
    <div class="customer_service">
        <p> ☎️Customer Service Line: 1-800-VMS-noob</p>
    </div>


    </body>
</html> 