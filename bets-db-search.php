<?php

require_once "layouts/config.php";

  $query = "SELECT * FROM sports";
  $result = mysqli_query($link, $query);
  $res = array();
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $res[] = $row;
    }
  } else {
    // Handle the case where the query fails
    $res[] = "Query failed";
  }
  //return json res
  echo json_encode($res);
?>