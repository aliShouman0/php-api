<?php
if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {

  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];

  $results = [
    "solution" => pow($a, 3) + $b * $c - $a / $b
  ];
  echo json_encode($results);
} else {
  echo "error";
}
