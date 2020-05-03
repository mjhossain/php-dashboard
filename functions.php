<?php

function safeInput($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }


function testName($name) {
  if(preg_match('/^[A-Za-z\s]+$/', $name)){
    echo "Name Test Passed!";
    return true;
  } else {
    echo "Name Test Failed!";
    return false;
  }
}

function testUsername($username) {
  $length = strlen($username);
  if(preg_match('/\W/', $username) || $length < 8){
    echo "Username Test Failed!";
    return false;
  } else {
    echo "Username Test Passed!";
    return true;
  }
}

function testPassword($password) {
  if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $password)){
    echo "Username Test Passed!";
    return true;
  } else {
    echo "Password Test Failed!";
    return false;
  }
}




?>