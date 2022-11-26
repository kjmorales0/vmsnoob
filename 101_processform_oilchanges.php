<?php


$unit_num = filter_input(INPUT_POST, "unit_num", FILTER_VALIDATE_INT);
$date = $_POST["date"];
$providers = $_POST["providers"];
$current_kms = filter_input(INPUT_POST, "current_kms", FILTER_VALIDATE_INT);
$labour_hours = filter_input(INPUT_POST, "labour_hours", FILTER_VALIDATE_FLOAT);


$host = "localhost";
$dbname = "units";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);


if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());

}

$sql = "INSERT INTO oil_changes (unit_num, date, providers, current_kms, labour_hours) 
        VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "issid",
                       $unit_num,
                       $date,
                       $providers,
                       $current_kms,
                       $labour_hours);

mysqli_stmt_execute($stmt);

echo "Record saved.";

header("location:101.html");


?>