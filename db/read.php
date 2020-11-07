<?php

function get_menu_links($conn) {
  $sql = "SELECT `link` 
            FROM `menu`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_COLUMN, 0);
}

function get_menu($conn, $lang) {
  $sql = "SELECT `menu`.`link`, `menu_title`.`menu_title`
            FROM `menu`
            INNER JOIN `menu_title` ON `menu`.`id` = `menu_title`.`menu_id`
            WHERE `menu_title`.`lang_id` = :lang
            ORDER BY `menu`.`id` ASC";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang" => $lang
  ));
  return $sth->fetchAll();
}

function get_block_id($conn, $block_name) {
  $sql = "SELECT `id` 
            FROM `block` 
            WHERE `block_name` = :block_name";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":block_name" => $block_name
  ));
  $result = $sth->fetch();
  return $result["id"];
}

function get_block_title($conn, $block_id, $lang_id) {
  $sql = "SELECT `block_title` 
            FROM `block_title` 
            WHERE `block_id` = :block_id 
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":block_id" => $block_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["block_title"];
}

function get_block_text($conn, $block_id, $lang_id) {
  $sql = "SELECT `block_text` 
            FROM `block_text` 
            WHERE `block_id` = :block_id 
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":block_id" => $block_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["block_text"];
}
