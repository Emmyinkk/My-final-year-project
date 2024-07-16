<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers: Content-Type");

// Connect to database (replace with your own database credentials)
$conn = new mysqli("localhost", "u800943294_library", "Iam_japhoo428", "u800943294_library");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$res = $msg = 0;
// Get the data from the POST request
if (isset($_GET["lecturer"])) {


    $password = $_GET['password'];
    $name = $_GET['name'];
    $email = $_GET['email'];

    if (empty($password)) {
        echo "password is required";
    } elseif (empty($name)) {
        echo "name is required";
    } elseif (empty($email)) {
        echo "email is required";
    } else {
        $sqlstr = "SELECT id FROM users WHERE user = '$email'";
        $stmt = $conn->prepare($sqlstr);
        if ($stmt == false) {
            echo $conn->error;
            exit;
        }
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $count = $result->num_rows;
            if ($count > 0) {
                echo "Email already exists";
                exit;
            }
        } else {
            echo $conn->error;
            exit;
        }
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sqlstr = "INSERT INTO users (user,name,password) VALUES ('$email','$name','$pass')";
        $stmt = $conn->prepare($sqlstr);
        if ($stmt == false) {
            echo $conn->error;
            exit;
        }
        if ($stmt->execute()) {
            echo 1;
            exit;
        } else {
            // If insertion fails, return an error message
            echo "Error adding data: " . $conn->error;
            exit;
        }
        $conn->close();
    }
} else if (isset($_GET["retrieve"])) {
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
        $topic = $row['topic'];
        $matric = $row['matric'];
        $pages = $row['pages'];
        $x = array(
            "name" => $name,
            "topic" => $topic,
            "matric" => $matric,
            "pages" => $pages
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
