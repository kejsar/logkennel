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
  if ($id) $title_id = add_block_title($conn, $id, $title, $lang);
  if ($id) $text_id  = add_block_text($conn, $id, $text, $lang);
}

// ============================================================================
// ADD DOG
// ============================================================================

function add_dog($conn, $birth, $teeth, $patella, $owner, $after, $under, $gender_type, $puppy)
{
  $sql = "INSERT INTO `dog` 
              (`id`, `birth`, `teeth`, `patella`, `owner`, `after`, `under`, `gender_type`, `puppy`) 
            VALUES 
              (NULL, :birth, :teeth, :patella, :owner, :after, :under, :gender_type, :puppy)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":birth"       => $birth,
    ":teeth"       => $teeth,
    ":patella"     => $patella,
    ":owner"       => $owner,
    ":after"       => $after,
    ":under"       => $under,
    ":gender_type" => $gender_type,
    ":puppy"       => $puppy
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

function add_dog_image($conn, $dog_id, $link, $alt, $main)
{
  $sql = "INSERT INTO `dog_image` 
              (`id`, `dog_id`, `link`, `alt`, `main`) 
            VALUES 
              (NULL, :dog_id, :link, :alt, :main)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":dog_id" => $dog_id,
    ":link"   => $link,
    ":alt"    => $alt,
    ":main"   => $main
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_dog_result($conn, $dog_id, $result_text, $lang_id)
{
  $sql = "INSERT INTO `dog_result` 
              (`id`, `dog_id`, `result_text`, `lang_id`) 
            VALUES 
              (NULL, :dog_id, :result_text, :lang_id)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":dog_id"      => $dog_id,
    ":result_text" => $result_text,
    ":lang_id"     => $lang_id
  ));
  return $result ? $conn->lastInsertId() : false;
}

// ============================================================================
// ADD NEWS
// ============================================================================

function add_news($conn, $year, $month, $day)
{
  $sql = "INSERT INTO `news` 
              (`id`, `year`, `month`, `day`) 
            VALUES 
              (NULL, :year, :month, :day)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":year"  => $year,
    ":month" => $month,
    ":day"   => $day
  ));
  return $result ? $conn->lastInsertId() : false;
}

function add_news_image($conn, $news_id, $link, $alt, $main)
{
  $sql = "INSERT INTO `news_image` 
              (`id`, `news_id`, `link`, `alt`, `main`) 
            VALUES 
              (NULL, :news_id, :link, :alt, :main)";
  $sth = $conn->prepare($sql);
  $result = $sth->execute(array(
    ":news_id" => $news_id,
    ":link"    => $link,
    ":alt"     => $alt,
    ":main"    => $main
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

