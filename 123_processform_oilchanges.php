<?php

//php variables
$unit_num = filter_input(INPUT_POST, "unit_num", FILTER_VALIDATE_INT);
$date = $_POST["date"];
$providers = $_POST["providers"];
$labour_hours = filter_input(INPUT_POST, "labour_hours", FILTER_VALIDATE_FLOAT);
$current_kms = filter_input(INPUT_POST, "current_kms", FILTER_VALIDATE_INT);


//Connection to Database - phpmyadmin - localhost
$host = "localhost";
$dbname = "units";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);


//check connection                       
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());

}

//SQL query to insert user input into databse
$sql = "INSERT INTO oil_changes (unit_num, date, providers, labour_hours, current_kms) 
        VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "issdi",
                       $unit_num,
                       $date,
                       $providers,
                       $labour_hours,
                       $current_kms);

mysqli_stmt_execute($stmt);

echo "Record saved.";


//After Submitting information, it will take you back to the unit page
header("location:123.php");


?>