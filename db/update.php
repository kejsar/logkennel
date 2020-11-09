<?php

// ============================================================================
// UPDATE BLOCK
// ============================================================================

function update_block($conn, $block_name, $block_id)
{
  $sql = "UPDATE `block` 
            SET `block_name` = :block_name 
            WHERE `id` = :block_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_name" => $block_name,
    ":block_id"   => $block_id
  ));
}

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

// ============================================================================
// UPDATE DOG
// ============================================================================

function update_dog($conn, $birth, $puppy, $teeth, $patella, $owner, $after, $under, $gender_type, $dog_id)
{
  $sql = "UPDATE `dog` SET 
              `birth`     = :birth,
              `puppy`     = :puppy,
              `teeth`     = :teeth,
              `patella`   = :patella,
              `owner`     = :owner,
              `after`     = :after,
              `under`     = :under,
              `gender_type` = :gender_type
            WHERE `id` = :dog_id";
  $sth = $conn->prepare($sql);
  // var_dump($sth->debugDumpParams());
  return $sth->execute(array(
    ":birth"     => $birth,
    ":puppy"     => $puppy,
    ":teeth"     => $teeth,
    ":patella"   => $patella,
    ":owner"     => $owner,
    ":after"     => $after,
    ":under"     => $under,
    ":gender_type" => $gender_type,
    ":dog_id"    => $dog_id
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

function update_dog_image($conn, $dog_id, $link, $alt, $main)
{
  $sql = "UPDATE `dog_image` SET
              `link` = :link,
              `alt` = :alt,
              `main` = :main
            WHERE `dog_id` = :dog_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":link" => $link,
    ":alt" => $alt,
    ":main" => $main,
    ":dog_id" => $dog_id
  ));
}

function update_dog_result($conn, $dog_id, $result_text, $lang_id)
{
  var_dump($dog_id, $result_text, $lang_id);
  $sql = "UPDATE `dog_result` SET
              `result_text` = :result_text
            WHERE `dog_id` = :dog_id
              AND  `lang_id` = :lang_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":result_text" => $result_text,
    ":lang_id" => $lang_id,
    ":dog_id" => $dog_id
  ));
}

// ============================================================================
// UPDATE MENU
// ============================================================================

function update_menu($conn, $menu_id, $link, $image)
{
  $sql = "UPDATE `menu` SET
              `link` = :link,
              `image` = :image
            WHERE `id` = :menu_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":link" => $link,
    ":image" => $image,
    ":menu_id" => $menu_id
  ));
}

function update_menu_title($conn, $menu_id, $menu_title, $lang_id)
{
  $sql = "UPDATE `menu_title` SET
              `menu_title` = :menu_title,
              `lang_id` = :lang_id
            WHERE `menu_id` = :menu_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":menu_title" => $menu_title,
    ":lang_id" => $lang_id,
    ":menu_id" => $menu_id
  ));
}

function update_menu_subtitle($conn, $menu_id, $menu_subtitle, $lang_id)
{
  $sql = "UPDATE `menu_subtitle` SET
              `menu_subtitle` = :menu_subtitle,
              `lang_id` = :lang_id
            WHERE `menu_id` = :menu_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":menu_subtitle" => $menu_subtitle,
    ":lang_id" => $lang_id,
    ":menu_id" => $menu_id
  ));
}

// ============================================================================
// UPDATE NEWS
// ============================================================================

function update_news($conn, $news_id, $year, $month, $day)
{
  $sql = "UPDATE `news` SET
              `year` = :year,
              `month` = :month,
              `day` = :day
            WHERE `id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":year" => $year,
    ":month" => $month,
    ":day" => $day,
    ":news_id" => $news_id
  ));
}

function update_news_image($conn, $news_id, $link, $alt, $main)
{
  $sql = "UPDATE `news_image` SET
              `link` = :link,
              `alt` = :alt,
              `main` = :main
            WHERE `news_id` = :news_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":link" => $link,
    ":alt" => $alt,
    ":main" => $main,
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


