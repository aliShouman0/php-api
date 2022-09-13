<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500 ");

if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {

  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];

  $results = [
    "solution" => pow($a, 3) + $b * $c - $a / $b
  ];
  echo json_encode($results);
} else {
  echo  json_encode("error");
}
