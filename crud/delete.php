<?php

include "../layouts/config.php";

$data = file_get_contents('php://input');

parse_str($data, $output);

$table = $output['table'];
$condition = $output['id'];
$where = $output['where'];



$query = "DELETE FROM $table WHERE $where = $condition";
$result = mysqli_query($link, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$response = json_encode($data, JSON_PRETTY_PRINT);
echo $response;

if (!$result) {
    echo "Error!";
}

mysqli_close($link);
