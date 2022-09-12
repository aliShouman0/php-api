<?php
if (isset($_GET['string'])) {
  $string = $_GET['string'];
  $results = [
    "isPalindrome" => strrev($string) == $string,
  ];
  echo json_encode($results);
} else {
  echo "error";
}
