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
if (isset($_GET["save"])) {


    $topic = $_GET['topic'];
    $name = $_GET['name'];
    $matric = $_GET['matric'];
    $pages = $_GET['pages'];

    if (empty($topic)) {
        $msg = "topic is required";
    } elseif (empty($name)) {
        $msg = "name is required";
    } elseif (empty($matric)) {
        $msg = "matric is required";
    } elseif (empty($pages)) {
        $msg = "pages is required";
    } else {
        $sqlstr = "INSERT INTO students (topic,name,matric,pages) VALUES ('$topic','$name','$matric','$pages')";
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
