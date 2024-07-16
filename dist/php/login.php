<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:GET");

$conn = new mysqli("localhost", "u800943294_library", "Iam_japhoo428", "u800943294_library");
if (isset($_GET["login"])) {
    $res = $msg = 0;
    $user = $_GET['user'];
    $password = $_GET['password'];
    if (empty($user)) {
        $msg = "Username is required";
    } elseif (empty($password)) {
        $msg = "Password is required";
    } else {
        $sqlstr = "SELECT user, password FROM users WHERE user = '$user'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        if ($count == 0) {
            $msg = "No records found for $user";
        } else {
            $row = $result->fetch_assoc();
            $pass = $row['password'];
            if (password_verify($password, $pass)) {
                $res = 1;
                $msg = "Login successful";
            } else {
                $msg = "Incorrect password";
            }
        }
    }
    $response = array(
        "res" => $res,
        "msg" => $msg
    );
    echo json_encode($response);
} else {
    echo 0;
}
