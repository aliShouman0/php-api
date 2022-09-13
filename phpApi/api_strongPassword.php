<?php
//to give permission to other server to sent request by js example
header("Access-Control-Allow-Origin: http://127.0.0.1:5500 ");

if (isset($_POST["password"])) {

  $isStrong = true;
  $errors = array();

  $password = $_POST["password"];
  //   password more than 12 char
  if (strlen($password) < 12) {
    $isStrong = false;
    $errors[] = " At least 12 characters long but 14 or more is better!";
  }
  //  numbers in password
  if (!preg_match('~[0-9]+~', $password)) {
    $isStrong = false;
    $errors[] =  "At least one numbers!";
  }
  //  lower letter! in password
  if (!preg_match("#[a-z]+#", $password)) {
    $isStrong = false;
    $errors[]  = "At least one lower letter!";
  }
  //  upper letter in password
  if (!preg_match("#[A-Z]+#", $password)) {
    $isStrong = false;
    $errors[]  = "At least one upper letter!";
  }
  //  symbol in password
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
