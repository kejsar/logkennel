<?php

// ============================================================================
// UPDATE BLOCK
// ============================================================================

function update_block_title($conn, $block_title, $block_id, $lang_id)
{
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

function update_block_text($conn, $block_text, $block_id, $lang_id)
{
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

function update_block_image_alt_text($conn, $block_id, $block_image_alt_text)
{
  $sql = "UPDATE `block_image` SET
              `block_image_alt_text` = :block_image_alt_text
            WHERE `block_id` = :block_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_image_alt_text" => $block_image_alt_text,
    ":block_id" => $block_id
  ));
}

function update_block($conn, $block_title, $block_text, $block_id, $lang_id)
{
  update_block_title($conn, $block_title, $block_id, $lang_id);
  update_block_text($conn, $block_text, $block_id, $lang_id);
}

// ============================================================================
// UPDATE DOG
// ============================================================================

function update_dog($conn, $dog_birth, $for_sale, $dog_info, $gender_type, $dog_id)
{
  $sql = "UPDATE `dog` SET 
              `dog_birth` = :dog_birth,
              `gender_type` = :gender_type,
              `for_sale` = :for_sale,
              `dog_info` = :dog_info
            WHERE `id` = :dog_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":dog_birth" => $dog_birth,
    ":gender_type" => $gender_type,
    ":for_sale" => $for_sale,
    ":dog_info" => $dog_info,
    ":dog_id" => $dog_id
  ));
}

function update_dog_name($conn, $dog_id, $dog_name, $lang_id)
{
  $sql = "UPDATE `dog_name` SET
              `dog_name` = :dog_name
            WHERE `dog_id` = :dog_id
              AND  `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  return $result = $sth->execute(array(
    ":dog_id" => $dog_id,
    ":dog_name" => $dog_name,
    ":lang_id" => $lang_id
  ));
}

function update_dog_image($conn, $dog_id, $dog_image_link)
{
  $sql = "UPDATE `dog_image` SET
              `dog_image_link` = :dog_image_link
            WHERE `dog_id` = :dog_id
              AND `main` = '1'";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":dog_image_link" => $dog_image_link,
    ":dog_id" => $dog_id
  ));
}

function update_dog_image_alt_text($conn, $dog_id, $dog_image_alt_text)
{
  $sql = "UPDATE `dog_image` SET
              `dog_image_alt_text` = :dog_image_alt_text
            WHERE `dog_id` = :dog_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":dog_image_alt_text" => $dog_image_alt_text,
    ":dog_id" => $dog_id
  ));
}

// ============================================================================
// UPDATE NEWS
// ============================================================================

function update_news($conn, $news_id, $news_year, $news_month, $news_day)
{
  $sql = "UPDATE `news` SET
              `news_year` = :news_year,
              `news_month` = :news_month,
              `news_day` = :news_day
            WHERE `id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_year" => $news_year,
    ":news_month" => $news_month,
    ":news_day" => $news_day,
    ":news_id" => $news_id
  ));
}

function update_news_image($conn, $news_id, $news_image_link, $news_image_alt_text, $main)
{
  $sql = "UPDATE `news_image` SET
              `news_image_link` = :news_image_link,
              `news_image_alt_text` = :news_image_alt_text,
              `main` = :main
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_image_link" => $news_image_link,
    ":news_image_alt_text" => $news_image_alt_text,
    ":main" => $main,
    ":news_id" => $news_id
  ));
}

function update_news_image_alt_text($conn, $news_id, $news_image_alt_text)
{
  $sql = "UPDATE `news_image` SET
              `news_image_alt_text` = :news_image_alt_text
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_image_alt_text" => $news_image_alt_text,
    ":news_id" => $news_id
  ));
}

function update_news_link($conn, $news_id, $news_link, $lang_id)
{
  $sql = "UPDATE `news_link` SET
              `news_link` = :news_link,
              `lang_id` = :lang_id
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_link" => $news_link,
    ":lang_id" => $lang_id,
    ":news_id" => $news_id
  ));
}

function update_news_text($conn, $news_id, $news_text, $lang_id)
{
  $sql = "UPDATE `news_text` SET
              `news_text` = :news_text,
              `lang_id` = :lang_id
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_text" => $news_text,
    ":lang_id" => $lang_id,
    ":news_id" => $news_id
  ));
}

function update_news_title($conn, $news_id, $news_title, $lang_id)
{
  $sql = "UPDATE `news_title` SET
              `news_title` = :news_title,
              `lang_id` = :lang_id
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":news_title" => $news_title,
    ":lang_id" => $lang_id,
    ":news_id" => $news_id
  ));
}


