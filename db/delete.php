<?php

// ============================================================================
// DELETE BLOCK
// ============================================================================

function delete_block_by_block_id($conn, $block_id) {
  $sql = "DELETE FROM `block` 
            WHERE `id` = :block_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_id" => $block_id
  ));
}

function delete_block_by_block_name($conn, $block_name) {
  $sql = "DELETE FROM `block` 
            WHERE `block_name` = :block_name";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_name" => $block_name
  ));
}

// ============================================================================
// DELETE DOG
// ============================================================================

function delete_dog_by_dog_id($conn, $dog_id) {
  $sql = "DELETE FROM `dog` 
            WHERE `id` = :dog_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":dog_id" => $dog_id
  ));
}

function delete_dog_image($conn, $image_id) {
  $sql = "DELETE FROM `dog_image` 
            WHERE `id` = :image_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":image_id" => $image_id
  ));
}

function delete_dog_result($conn, $result_id) {
  $sql = "DELETE FROM `dog_result` 
            WHERE `id` = :result_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":result_id" => $result_id
  ));
}

// ============================================================================
// DELETE NEWS
// ============================================================================

function delete_news_by_news_id($conn, $news_id) {
  $sql = "DELETE FROM `news` 
            WHERE `id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_id" => $news_id
  ));
}
