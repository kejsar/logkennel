<?php

// ============================================================================
// ADD BLOCK
// ============================================================================

function add_block($conn, $block_name)
{
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

function add_block_title($conn, $block_id, $block_title, $lang_id)
{
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

function add_block_text($conn, $block_id, $block_text, $lang_id)
{
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

  if ($id) {
    $title_id = add_block_title($conn, $id, $title, $lang);
    $text_id  = add_block_text($conn, $id, $text, $lang);
    if ($title_id && $text_id) return true;
  }

  return false;
}

// ============================================================================
// ADD DOG
// ============================================================================

function add_dog($conn, $dog_birth, $gender_type, $for_sale, $dog_info)
{
  $sql = "INSERT INTO `dog`
              (`id`, `dog_birth`, `gender_type`, `for_sale`, `dog_info`) 
            VALUES 
              (NULL, :dog_birth, :gender_type, :for_sale, :dog_info)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":dog_birth" => $dog_birth,
    ":gender_type" => $gender_type,
    ":for_sale" => $for_sale,
    ":dog_info" => $dog_info
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_dog_name($conn, $dog_id, $dog_name, $lang_id)
{
  $sql = "INSERT INTO `dog_name` 
              (`id`, `dog_id`, `dog_name`, `lang_id`) 
            VALUES 
              (NULL, :dog_id, :dog_name, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":dog_id" => $dog_id,
    ":dog_name" => $dog_name,
    ":lang_id" => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_dog_image($conn, $dog_id, $dog_image_link, $dog_image_alt_text, $main)
{
  $sql = "INSERT INTO `dog_image` 
              (`id`, `dog_id`, `dog_image_link`, `dog_image_alt_text`, `main`) 
            VALUES 
              (NULL, :dog_id, :dog_image_link, :dog_image_alt_text, :main)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":dog_id" => $dog_id,
    ":dog_image_link" => $dog_image_link,
    ":dog_image_alt_text" => $dog_image_alt_text,
    ":main" => $main
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_new_dog($conn, $dog_birth, $gender_type, $for_sale, $dog_info, $dog_name, $lang_id, $dog_image_link, $dog_image_alt_text, $main)
{
  $dog_id = add_dog($conn, $dog_birth, $gender_type, $for_sale, $dog_info);

  if (isset($dog_id) && $dog_id) {
    $dog_name_id = add_dog_name($conn, $dog_id, $dog_name, $lang_id);
    $dog_image_id = add_dog_image($conn, $dog_id, $dog_image_link, $dog_image_alt_text, $main);
    if ($dog_name_id && $dog_image_id) return true;
  }

  return false;
}

// ============================================================================
// ADD NEWS
// ============================================================================

function add_news($conn, $news_year, $news_month, $news_day)
{
  $sql = "INSERT INTO `news` 
              (`id`, `news_year`, `news_month`, `news_day`) 
            VALUES 
              (NULL, :news_year, :news_month, :news_day)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_year"  => $news_year,
    ":news_month" => $news_month,
    ":news_day"   => $news_day
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_news_image($conn, $news_id, $news_image_link, $news_image_alt, $main)
{
  $sql = "INSERT INTO `news_image` 
              (`id`, `news_id`, `news_image_link`, `news_image_alt`, `main`) 
            VALUES 
              (NULL, :news_id, :news_image_link, :news_image_alt, :main)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_id" => $news_id,
    ":news_image_link" => $news_image_link,
    ":news_image_alt" => $news_image_alt,
    ":main" => $main
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_news_link($conn, $news_id, $news_link, $lang_id)
{
  $sql = "INSERT INTO `news_link` 
              (`id`, `news_id`, `news_link`, `lang_id`) 
            VALUES 
              (NULL, :news_id, :news_link, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_id"   => $news_id,
    ":news_link" => $news_link,
    ":lang_id"   => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_news_text($conn, $news_id, $news_text, $lang_id)
{
  $sql = "INSERT INTO `news_text` 
              (`id`, `news_id`, `news_text`, `lang_id`) 
            VALUES 
              (NULL, :news_id, :news_text, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_id"   => $news_id,
    ":news_text" => $news_text,
    ":lang_id"   => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_news_title($conn, $news_id, $news_title, $lang_id)
{
  $sql = "INSERT INTO `news_title` 
              (`id`, `news_id`, `news_title`, `lang_id`) 
            VALUES 
              (NULL, :news_id, :news_title, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_id"    => $news_id,
    ":news_title" => $news_title,
    ":lang_id"    => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_new_news_item($conn, $news_year, $news_month, $news_day, $news_image_link, $news_image_alt, $main, $news_link, $news_text, $news_title, $lang_id)
{
  $news_id = add_news($conn, $news_year, $news_month, $news_day);
  if ($news_id) {
    $news_image_id = add_news_image($conn, $news_id, $news_image_link, $news_image_alt, $main);
    $news_link_id = add_news_link($conn, $news_id, $news_link, $lang_id);
    $news_text_id = add_news_text($conn, $news_id, $news_text, $lang_id);
    $news_title_id = add_news_title($conn, $news_id, $news_title, $lang_id);
    if ($news_image_id && $news_link_id && $news_text_id && $news_title_id) return true;
  }
  return false;
}
