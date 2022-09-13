<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500 ");

if (isset($_POST["password"])) {

  $isStrong = true;
  $errors = array();

  $password = $_POST["password"];
  if (strlen($password) < 12) {
    $isStrong = false;
    $errors[] = " At least 12 characters long but 14 or more is better!";
  }
  if (!preg_match('~[0-9]+~', $password)) {
    $isStrong = false;
    $errors[] =  "At least one numbers!";
  }
  if (!preg_match("#[a-z]+#", $password)) {
    $isStrong = false;
    $errors[]  = "At least one lower letter!";
  }
  if (!preg_match("#[A-Z]+#", $password)) {
    $isStrong = false;
    $errors[]  = "At least one upper letter!";
  }
  if (!preg_match('@[^\w]@', $password)) {
    $isStrong = false;
    $errors[]  = "At least one symbol!";
  }

  $results = [
    "isStrong" => $isStrong,
    "errors" => $errors
  ];
  echo json_encode($results);
} else {
  echo "error";
}
