<?php

// ============================================================================
// READ BLOCK
// ============================================================================

function get_block($conn, $block_name, $lang_id) {
  $sql = "SELECT
              `block_title`.`block_title`,
              `block_text`.`block_text`
            FROM `block` 
            INNER JOIN `block_title` ON `block`.`id` = `block_title`.`block_id`
            INNER JOIN `block_text` ON `block`.`id` = `block_text`.`block_id`
            WHERE `block`.`block_name` = :block_name
              AND `block_title`.`lang_id` = :lang_id
              AND `block_text`.`lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":block_name" => $block_name,
    ":lang_id" => $lang_id
  ));
  return $sth->fetch();
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

// ============================================================================
// READ DOG
// ============================================================================

function get_dogs($conn) {
  $sql = "SELECT *
            FROM `dog`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  return $sth->fetchAll();
}

function get_dog($conn, $dog_id) {
  $sql = "SELECT *
            FROM `dog`
            WHERE `id` = :dog_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id
  ));
  return $sth->fetch();
}

function get_gender($conn, $gender_id, $lang_id) {
  $sql = "SELECT *
            FROM `gender`
            WHERE `id` = :gender_id
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":gender_id" => $gender_id,
    ":lang_id" => $lang_id
  ));
  return $sth->fetch();
}

function get_dog_image_main($conn, $dog_id) {
  $sql = "SELECT *
            FROM `dog_image`
            WHERE `dog_id` = :dog_id
              AND `main` = 1";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id
  ));
  return $sth->fetch();
}

function get_dog_images($conn, $dog_id) {
  $sql = "SELECT *
            FROM `dog_image`
            WHERE `dog_id` = :dog_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id
  ));
  return $sth->fetchAll();
}

// ============================================================================
// READ LANG
// ============================================================================

function get_lang_by_id($conn, $lang_id) {
  $sql = "SELECT * 
            FROM `lang` 
            WHERE `id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}

function get_lang_by_link($conn, $link) {
  $sql = "SELECT * 
            FROM `lang` 
            WHERE `link` = :link";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":link" => $link
  ));
  return $sth->fetchAll();
}

// ============================================================================
// READ MENU
// ============================================================================

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

// ============================================================================
// READ NEWS
// ============================================================================

function get_news_item_by_id($conn, $news_id, $lang_id) {
  $sql = "SELECT 
              `news`.`id`, 
              `news`.`year`, 
              `news`.`month`,
              `news`.`day`,
              `news_image`.`link`,
              `news_image`.`alt`,
              `news_link`.`news_link`,
              `news_text`.`news_text`,
              `news_title`.`news_title`
            FROM `news`
            INNER JOIN `news_image` ON `news`.`id` = `news_image`.`news_id`
            INNER JOIN `news_link` ON `menu`.`id` = `news_link`.`news_id`
            INNER JOIN `news_text` ON `menu`.`id` = `news_text`.`news_id`
            INNER JOIN `news_title` ON `menu`.`id` = `news_title`.`news_id`
            WHERE `news`.`id` = :news_id
              AND `news_link`.`lang_id` = :lang_id
              AND `news_text`.`lang_id` = :lang_id
              AND `news_title`.`lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id,
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}
