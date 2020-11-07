<?php

function update_block($conn, $block_name, $block_id) {
  $sql = "UPDATE `block` 
            SET `block_name` = :block_name 
            WHERE `id` = :block_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_name" => $block_name,
    ":block_id"   => $block_id
  ));
}

function update_block_title($conn, $block_title, $block_id, $lang_id) {
  $sql = "UPDATE `block_title` 
            SET `block_title` = :block_title 
            WHERE `block_id` = :block_id 
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_title" => $block_title,
    ":block_id"    => $block_id,
    ":lang_id"     => $lang_id
  ));
}

function update_block_text($conn, $block_text, $block_id, $lang_id) {
  $sql = "UPDATE `block_text` 
            SET `block_text` = :block_text 
            WHERE `block_id` = :block_id 
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_text" => $block_text,
    ":block_id"   => $block_id,
    ":lang_id"    => $lang_id
  ));
}
