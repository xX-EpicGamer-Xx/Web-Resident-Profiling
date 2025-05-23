<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "residents";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, last_name, age, sex, address, civil_status, nationality, pwd, single_parent, member_4ps, voter FROM residents";
$result = $conn->query($sql);

$residents = [];
while ($row = $result->fetch_assoc()) {
    $residents[] = $row; // Now we're using the address directly from the database
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($residents);
?>