<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$conn = new mysqli("localhost", "u800943294_library", "Iam_japhoo428", "u800943294_library");
$topics = array();
$sqlstr = "SELECT * FROM students ORDER BY topic";
$stmt = $conn->prepare($sqlstr);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;
if ($count > 0) {
    while ($row = $result->fetch_assoc()) {
        $res[] = $row['topic'];
    }
    foreach ($res as $topic) {
        array_push($topics, $topic);
    }
}
echo json_encode($topics);
