<?php
// to give permission to other server to sent request by js example

header("Access-Control-Allow-Origin: http://127.0.0.1:5500 ");

if (isset($_GET['string'])) {
  $string = $_GET['string'];
  $results = [
    "isPalindrome" => strrev($string) == $string,
  ];
  echo json_encode($results);
} else {
  echo "error";
}
