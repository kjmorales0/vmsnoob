<?php

//php variables
$unit_num = filter_input(INPUT_POST, "unit_num", FILTER_VALIDATE_INT);
$date1 = $_POST["date1"];
$providers = $_POST["providers"];
$description = $_POST["description"];
$total_amount = filter_input(INPUT_POST, "total_amount", FILTER_VALIDATE_FLOAT); 


//connecting to database
$host = "localhost";
$dbname = "units";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);

//checking connection
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());

}


//SQL query to insert user input into database
$sql = "INSERT INTO other_repairs (unit_num, date1, providers, description, total_amount) 
        VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "isssd", 
                       $unit_num,
                       $date1,
                       $providers,
                       $description,
                       $total_amount);

mysqli_stmt_execute($stmt);

echo "Record saved.";


//Redirects you back to the unit page
header("location:101.html");



?>