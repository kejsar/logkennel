<?php

require ROOT . "db" . DS . "init.php";

function get_rate($id) {
  $sql = "SELECT `value` FROM `currency` WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":id" => $id
  ));
  $result = $sth->fetch();
  return $result["value"];
}
