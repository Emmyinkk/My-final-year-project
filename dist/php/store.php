<?php
// Set the header to allow cross-domain requests
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:POST");

$conn = new mysqli("localhost", "u800943294_library", "Iam_japhoo428", "u800943294_library");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$data = json_decode(file_get_contents("php://input"));


// if($data->action == 'insert') {
//     $data = array(
//         ':sName' => $data->name,
//         ':matric' => $data->matric,
//         ':topic' => $data->topic
//     );

//     $query = "INSERT INTO project (name, matric, topic VALUES (:sName, :matric, :topic)";

//     $statement = $connect->prepare($query);

//     $statement->execute($data);

//     $output = array(
//         'message' => 'Data Inserted'
//     );

//     echo json_encode($output);
// }

// Get the data from the Vue.js app

// $name = $data->sName;
$matric = $data->matric;
$topic = $data->topic;

// Insert values into the "projects" table
$sql = "INSERT INTO projects ( matric, topic) VALUES ('$matric', '$topic')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
