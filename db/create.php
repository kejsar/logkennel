<?php

function add_block($conn, $block_name) {
  $sql = "INSERT INTO `block` 
              (`id`, `block_name`) 
            VALUES 
              (NULL, :block_name)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":block_name" => $block_name
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_block_title($conn, $block_id, $block_title, $lang_id) {
  $sql = "INSERT INTO `block_title` 
              (`id`, `block_id`, `block_title`, `lang_id`) 
            VALUES 
              (NULL, :block_id, :block_title, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":block_id"    => $block_id,
    ":block_title" => $block_title,
    ":lang_id"     => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_block_text($conn, $block_id, $block_text, $lang_id) {
  $sql = "INSERT INTO `block_text` 
              (`id`, `block_id`, `block_text`, `lang_id`) 
            VALUES 
              (NULL, :block_id, :block_text, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":block_id"   => $block_id,
    ":block_text" => $block_text,
    ":lang_id"    => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_new_block($conn, $name, $title, $text, $lang)
{
  $id = add_block($conn, $name);
  if ($id) $title_id = add_block_title($conn, $id, $title, $lang);
  if ($id) $text_id  = add_block_text($conn, $id, $text, $lang);
}
