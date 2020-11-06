<?php

$host      = "localhost";
$db_name   = "logkennel";
$user_name = "logkennel";
$password  = "123456";
$charset   = "utf8";

$dsn = "mysql:host=" . $host    . "; "
     . "dbname="     . $db_name . "; "
     . "charset="    . $charset;

$attr = array(
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

try {
  $conn = new PDO($dsn, $user_name, $password, $attr);
} catch (PDOException $e) {
  echo "Connection Error: " . $e->getMessage();
}
