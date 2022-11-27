<!DOCTYPE html>
<html lan="en">
    <head>
        
        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">
        
        <title>Vehicle Quick Look Up</title>
        <h1 class="tablestitle">Vehicle Quick Look Up</h1>
  
    </head>
    <body>

        <!--QUICK LOOK UP TABLE-->
        <!--PHP code to connect to database and display information on page-->
        <table class="table_oilchanges">
            <thead>
            <tr>
                <th>Unit</th>
                <th>Driver</th>
                <th>Division</th>
            </tr>
<           /thead>
            <tbody>

                <?php

                //Connect to database
                $conn = mysqli_connect("localhost", "root", "", "units");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //SQL query to display the selected information only
                $sql = " SELECT unit_num,driver, division FROM vehicle_units";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["unit_num"]. "</td><td>" . $row["driver"] . "</td><td>" .$row["division"]. "</td></tr>";
                    }
                        echo "</table>";
                    } else { 
                        echo "0 results"; 
                    }

                $conn->close();
                ?>
                
            </tbody>
        </table>
    

    </body>
</html>

