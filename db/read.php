<?php

// ============================================================================
// READ BLOCK
// ============================================================================

function get_block($conn, $block_name, $lang_id) {
  $sql = "SELECT
              `block_title`.`block_title`,
              `block_text`.`block_text`,
              `block_image`.`block_image_link`,
              `block_image`.`block_image_alt_text`
            FROM `block` 
            INNER JOIN `block_title` ON `block`.`id` = `block_title`.`block_id`
            INNER JOIN `block_text` ON `block`.`id` = `block_text`.`block_id`
            INNER JOIN `block_image` ON `block`.`id` = `block_image`.`block_id`
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

function get_block_image($conn, $block_id) {
  $sql = "SELECT `block_image_link`, `block_image_alt_text`
            FROM `block_image` 
            WHERE `block_id` = :block_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":block_id" => $block_id
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

function get_dogs($conn, $search_type, $lang_id) {
  $sql = "SELECT 
              `dog`.`id`,
              `dog`.`dog_birth`,
              `dog`.`for_sale`,
              `dog`.`dog_info`,
              `dog_gender`.`gender_name`,
              `dog_name`.`dog_name`
            FROM `dog`
            INNER JOIN `dog_gender` ON `dog`.`gender_type` = `dog_gender`.`gender_type`
            INNER JOIN `dog_name`   ON `dog`.`id` = `dog_name`.`dog_id`

            WHERE ";

  if ($search_type === "males")    $sql .= " `dog`.`gender_type` = '1' AND ";
  if ($search_type === "females")  $sql .= " `dog`.`gender_type` = '0' AND ";
  if ($search_type === "for_sale") $sql .= " `dog`.`for_sale` = '1' AND ";

  $sql .= "       `dog_gender`.`lang_id` = :lang_id
              AND `dog_name`.`lang_id` = :lang_id

            ORDER BY `dog`.`id` ASC";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}

function get_dog($conn, $dog_id, $lang_id) {
  $sql = "SELECT 
              `dog`.`id`,
              `dog`.`dog_birth`,
              `dog`.`for_sale`,
              `dog`.`dog_info`,
              `dog`.`gender_type`,
              `dog_name`.`dog_name`
            FROM `dog`
              INNER JOIN `dog_name`   ON `dog`.`id` = `dog_name`.`dog_id`

            WHERE `dog`.`id` = :dog_id
              AND `dog_name`.`lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetchAll();
  return $result[0];
}

function get_gender_name($conn, $gender_type, $lang_id) {
  $sql = "SELECT `gender_name`
            FROM `dog_gender`
            WHERE `gender_type` = :gender_type
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":gender_type" => $gender_type,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["gender_name"];
}

function get_dog_main_image($conn, $dog_id) {
  $sql = "SELECT 
              `dog_image_link`,
              `dog_image_alt_text`
            FROM `dog_image`
            WHERE `dog_id` = :dog_id
              AND `main` = '1'";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id
  ));
  return $sth->fetch();
}

function get_dog_images($conn, $dog_id) {
  $sql = "SELECT 
              `dog_image_link`
            FROM `dog_image`
            WHERE `dog_id` = :dog_id
              AND `main` = '0'";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":dog_id" => $dog_id
  ));
  return $sth->fetchAll();
}

function get_all_dog_images($conn, $dog_id) {
  $sql = "SELECT 
              `dog_image_link`,
              `dog_image_alt_text`
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
  $sql = "SELECT 
              `lang_code`,
              `lang_name`
            FROM `lang` 
            WHERE `id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}

function get_lang_name($conn, $lang_code) {
  $sql = "SELECT `lang_name`
            FROM `lang` 
            WHERE `lang_code` = :lang_code";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_code" => $lang_code
  ));
  $result = $sth->fetch();
  return $result["lang_name"];
}

// ============================================================================
// READ MENU
// ============================================================================

function get_menu_links($conn) {
  $sql = "SELECT `menu_link` 
            FROM `menu`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_COLUMN, 0);
}

function get_menu($conn, $lang_id) {
  $sql = "SELECT `menu`.`menu_link`, `menu_title`.`menu_title`
            FROM `menu`
            INNER JOIN `menu_title` ON `menu`.`id` = `menu_title`.`menu_id`
            WHERE `menu_title`.`lang_id` = :lang_id
            ORDER BY `menu`.`id` ASC";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}

// ============================================================================
// READ ADMIN MENU
// ============================================================================

function get_admin_menu_links($conn) {
  $sql = "SELECT `admin_menu_link` 
            FROM `admin_menu`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  return $sth->fetchAll(PDO::FETCH_COLUMN, 0);
}

function get_admin_menu($conn, $lang_id) {
  $sql = "SELECT `admin_menu`.`admin_menu_link`, `admin_menu_title`.`admin_menu_title`
            FROM `admin_menu`
            INNER JOIN `admin_menu_title` ON `admin_menu`.`id` = `admin_menu_title`.`admin_menu_id`
            WHERE `admin_menu_title`.`lang_id` = :lang_id
            ORDER BY `admin_menu`.`id` ASC";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":lang_id" => $lang_id
  ));
  return $sth->fetchAll();
}

// ============================================================================
// READ NEWS
// ============================================================================

function get_news($conn)
{
  $sql = "SELECT * FROM `news`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  return $sth->fetchAll();
}

function get_news_item($conn, $news_id)
{
  $sql = "SELECT * FROM `news`
            WHERE `id` = :news_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id
  ));
  return $sth->fetch();
}

function get_news_image($conn, $news_id)
{
  $sql = "SELECT 
              `news_image_link`, 
              `news_image_alt_text`
            FROM `news_image`
            WHERE `news_id` = :news_id
              AND `main` = '1'";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id
  ));
  return $sth->fetch();
}

function get_news_link($conn, $news_id, $lang_id)
{
  $sql = "SELECT `news_link`
            FROM `news_link`
            WHERE `news_id` = :news_id
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["news_link"];
}

function get_news_text($conn, $news_id, $lang_id)
{
  $sql = "SELECT `news_text`
            FROM `news_text`
            WHERE `news_id` = :news_id
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["news_text"];
}

function get_news_title($conn, $news_id, $lang_id)
{
  $sql = "SELECT `news_title`
            FROM `news_title`
            WHERE `news_id` = :news_id
              AND `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id,
    ":lang_id" => $lang_id
  ));
  $result = $sth->fetch();
  return $result["news_title"];
}


function get_news_list($conn, $lang_id) {
  $news = get_news($conn);
  foreach ($news as $key => $news_item) {
    $news[$key]["image"] = get_news_image($conn, $news_item["id"]);
    $news[$key]["link"] = get_news_link($conn, $news_item["id"], $lang_id);
    $news[$key]["text"] = get_news_text($conn, $news_item["id"], $lang_id);
    $news[$key]["title"] = get_news_title($conn, $news_item["id"], $lang_id);
  }
  return $news;
}

function get_news_item_by_id($conn, $news_id, $lang_id) {
  $news_item = get_news_item($conn, $news_id);
  $news_item["image"] = get_news_image($conn, $news_id);
  $news_item["link"] = get_news_link($conn, $news_id, $lang_id);
  $news_item["text"] = get_news_text($conn, $news_id, $lang_id);
  $news_item["title"] = get_news_title($conn, $news_id, $lang_id);
  return $news_item;
}

function get_news_image_list($conn, $news_id)
{
  $sql = "SELECT `news_image_link`
            FROM `news_image`
            WHERE `news_id` = :news_id
              AND `main` = '0'";
  $sth = $conn->prepare($sql);
  $sth->execute(array(
    ":news_id" => $news_id
  ));
  return $sth->fetchAll();
}
