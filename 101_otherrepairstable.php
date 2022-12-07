<!DOCTYPE html>
<html lan="en">

    <head>
        
    <a href="101.php"><img src="vmsnoob_logocropped.png" alt="logo" id="pagelogo"></a>
        <!--CSS for units pages-->
        <link href="units.css" rel="stylesheet">
        
        <title>Maintenance History</title>

        <!--Header-->
        <h1 class="tablestitle">Maintenance History</h1>
  
    </head>
    <body>

        <!--  OTHER REPAIRS TABLE-->
        <!--PHP code to connect to database and display selected results on page-->
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

                //Connect to database
                $conn = mysqli_connect("localhost", "root", "", "units");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT unit_num, date, providers, description, total_amount FROM other_repairs WHERE unit_num = 101 ORDER BY date DESC ";
            
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["unit_num"]. "</td><td>" . $row["date"]. "</td><td>"
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


