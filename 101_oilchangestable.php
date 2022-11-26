<!DOCTYPE html>
<html lan="en">

    <head>
        
        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">
        
        <title>Oil Change History</title>
        <h1>Oil Change History</h1>
  
    </head>
    <body>
    
        <table class="table_oilchanges">
            <thead>
            <tr>
                <th>Unit</th>
                <th>Date</th>
                <th>Provider</td>
                <th>KMs at time of oil change</th>
                <th>Labour Hours</th>
            </tr>
            </thead>

            <tbody>


                <?php

                $conn = mysqli_connect("localhost", "root", "", "units");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = " SELECT unit_num, date, providers, current_kms, labour_hours FROM oil_changes ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["unit_num"]. "</td><td>" . $row["date"] . "</td><td>" .$row["providers"]. "</td><td>"
                            . $row["current_kms"]. "</td><td>" .$row["labour_hours"] . "</td></tr>";
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


