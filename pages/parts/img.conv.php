<?php

function get_size($file, $w, $h, $crop=false)
{
  list($width, $height) = getimagesize($file);
  $r = $width / $height;
  if ($crop) {
    if ($width > $height) {
      $width = ceil($width - ($width * abs($r - $w / $h)));
    } else {
      $height = ceil($height - ($height * abs($r - $w / $h)));
    }
    $new_width = $w;
    $new_height = $h;
  } else {
    if ($w / $h > $r) {
      $new_width = $h * $r;
      $new_height = $h;
    } else {
      $new_width = $w;
      $new_height = $w / $r;
    }
  }
  return [$new_width, $new_height];
}

function img_resize($target, $img_dir, $dest_img_x, $dest_img_y, $file_ext)
{
  switch ($file_ext) {
    case "gif":
      $src_img = imagecreatefromgif($target);
      break;

    case "png":
      $src_img = imagecreatefrompng($target);
      break;

    case "jpg":
      $src_img = imagecreatefromjpeg($target);
      break;
  }

  $src_img_x = imagesx($src_img);
  $src_img_y = imagesy($src_img);

  $dest_image = imagecreatetruecolor($dest_img_x, $dest_img_y);

  imagecopyresampled($dest_image, $src_img, 0, 0, 0, 0, $dest_img_x, $dest_img_y, $src_img_x, $src_img_y);

  imagejpeg($dest_image, $img_dir, 85);
}

function image_convert()
{
  $message = "";

  var_dump($_FILES);
  
  if (!isset($_FILES["image-input"])) {
    return "Sorry, file is missing.";
  }

  $new_img_name = date_timestamp_get(date_create());

  $file_name = $_FILES["image-input"]["name"];
  $file_size = $_FILES["image-input"]["size"];
  $file_tmp  = $_FILES["image-input"]["tmp_name"];
// $file_type = $_FILES["image-input"]["type"];

  $file_ext_name = explode(".", $file_name);
  $raw_file_ext  = end($file_ext_name);
  $file_ext      = strtolower($raw_file_ext);
  if ($file_ext === "jpeg") {
    $file_ext  = "jpg";
  }

  $expensions = array("jpg", "png", "gif");

  if (in_array($file_ext, $expensions) === false) {
    $message .= "The " . $file_ext . " extension is not allowed, " . "please choose a JPEG, GIF or PNG file.";
  }

  if ($file_size > 5242880) {
    $message .= "File size must be less then 5 MB";
  }

  if ($message === "") {

    $tmp_dir   = ROOT_DIR . "public" . DS . "img" . DS . "tmp" . DS . $new_img_name  . "." . $file_ext;

    $img_dir   = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . $new_img_name  . ".jpg";

    $thumb_dir = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . "thumbs" . DS . $new_img_name  . ".jpg";

    move_uploaded_file($file_tmp, $tmp_dir);

    $img_dim = get_size($tmp_dir, 900, 900, false);
    $img_w = $img_dim[0];
    $img_h = $img_dim[1];
    img_resize($tmp_dir, $img_dir, $img_w, $img_h, $file_ext);

    $thmb_dim = get_size($tmp_dir, 200, 200, true);
    $thumb_w = $thmb_dim[0];
    $thumb_h = $thmb_dim[1];
    img_resize($tmp_dir, $thumb_dir, $thumb_w, $thumb_h, $file_ext);

    unlink($tmp_dir);
  }

  return $message !== "" ? $message : $new_img_name;
}
