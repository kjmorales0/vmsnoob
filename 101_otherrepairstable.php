<!DOCTYPE html>
<html lan="en">

    <head>
        
        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">
        
        <title>Maintenance History</title>
        <h1>Maintenance History</h1>
  
    </head>
    <body>
    
        <table class="table_otherrepairs">
            <thead>
            <tr>
                <th>Unit</th>
                <th>Date</th>
                <th>Provider</th>
                <th>Description</th>
                <th>Total Amount</th>
            </tr>
            </thead>

            <tbody>


                <?php

                $conn = mysqli_connect("localhost", "root", "", "units");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT unit_num, date1, providers, description, total_amount FROM other_repairs";
            
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["unit_num"]. "</td><td>" . $row["date1"]. "</td><td>"
                            . $row["providers"]. "</td><td>" .$row["description"] . "</td><td>" . $row["total_amount"]."</td></tr>";
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


