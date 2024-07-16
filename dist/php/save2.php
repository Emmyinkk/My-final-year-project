<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Content-Type");

// Connect to database (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecturer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$res = $msg = 0;
// Get the data from the POST request
if(isset($_GET["save"])) {
    
    
    $name = $_GET['name'];
    $username = $_GET['username'];
    $password = $_GET['password'];

    if(empty($name)) {
        $msg = "name is required";
    } elseif (empty($username)) {
        $msg = "username is required";
    } elseif (empty($password)) {
        $msg = "password is required";
    } 
    else {
        $sqlstr = "INSERT INTO students (name,username,password) VALUES ('$name','$username','$password')";
        $stmt = $conn->prepare($sqlstr);

        if ($stmt->execute()) {
            // If insertion is successful, return a success message
            $msg = "successful";
            $res = 1;
        } else {
            // If insertion fails, return an error message
            $msg = "Error adding data: " . $conn->error;
        }
        $conn->close();

    }
}else if(isset($_GET["retrieve"])) {
    $msg = array();
            $sqlstr = "SELECT * FROM students ORDER BY id";
            $stmt = $conn->prepare($sqlstr);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
            foreach ($output as $row) {
                $name = $row['name'];
                $username = $row['username'];
                $password = $row['password'];
                $x = array(
                    "name" => $name,
                    "username" => $username,
                    "password" => $password,
                );
                array_push($msg, $x);
            }
            $res = 1;

} else {
    $msg = "no form data received.";
} 
$response = array(
    "msg" => $msg,
    "res" => $res
);
echo json_encode($response);