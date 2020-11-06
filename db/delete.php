<?php

require ROOT . "db" . DS . "init.php";

function delete_rate($id) {
  $sql = "DELETE FROM `currency` WHERE id = :id";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":id" => $id
  ));
  return $result;
}
