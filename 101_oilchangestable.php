<!DOCTYPE html>
<html lan="en">

    <head>
        
    <a href="101.php"><img src="vmsnoob_logocropped.png" alt="logo" id="pagelogo"></a>
        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">
        
        <title>Oil Change History</title>
        <h1 class="tablestitle">Oil Change History</h1>
  
    </head>
    <body>

    <!--OIL CHANGES HISTORY table-->
    <!--PHP code to connect to database and display results-->
        <table class="table_oilchanges">
            <thead>
            <tr>
                <th>Unit</th>
                <th>Date</th>
                <th>Provider</td>
                <th>Labour Hours</th>
                <th>Current KMs</th>
            </tr>
            </thead>
            <tbody>

                <?php
                //Connect to database
                $conn = mysqli_connect("localhost", "root", "", "units");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //SQL query to display selected information
                $sql = " SELECT unit_num, date, providers, labour_hours, current_kms, next_oil_change FROM oil_changes WHERE unit_num = 101 ORDER BY date DESC ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["unit_num"]. "</td><td>" . $row["date"] . "</td><td>" .$row["providers"]. "</td><td>"
                            . $row["labour_hours"]. "</td><td>" .$row["current_kms"] . "</td></tr>";
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


