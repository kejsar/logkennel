<?php

// EDIT CURRENT BLOCK ===========================================================

if (isset($_POST["action"]) && $_POST["action"] === "edit") {

  $block_id      = $_POST["id"];
  $block_name    = isset($_POST["name"]) ? $_POST["name"] : "";
  $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
  $for_sale    = isset($_POST["for_sale"]) && $_POST["for_sale"] === "on" ? 1 : 0;
  $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
  $info        = isset($_POST["info"]) ? $_POST["info"] : "";
  $alt         = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";

  $block_updated = false;
  $link = "";
  $img_upload_error = "";
  $block_image_updated = 1;

  if (isset($_FILES["imageinput"]["tmp_name"]) && $_FILES["imageinput"]["tmp_name"] !== "") {

    require PARTS_DIR . "img.conv.php";
    
    $file_name = $_FILES["imageinput"]["name"];
    $file_tmp_loc = $_FILES["imageinput"]["tmp_name"];
    $file_type = $_FILES["imageinput"]["type"];
    $file_size = $_FILES["imageinput"]["size"];
    $file_error_msg = $_FILES["imageinput"]["error"];
    
    $old_image = isset($_POST["old_image"]) ? $_POST["old_image"] : "";

    $link = date_timestamp_get(date_create());
    $img_upload_error = upload_image($link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg, "blocks");

  }

  $raw_block_info_updated = update_block($conn, $birth, $for_sale, $info, $gender_type, $block_id);

  if ($raw_block_info_updated) {

    $block_name_updated = update_block_name($conn, $block_id, $block_name, LANG);

    if ($link && !$img_upload_error) {
      if ($old_image) {
        $block_image_updated = update_block_image($conn, $block_id, $link);
      } else {
        $block_image_updated = add_block_image($conn, $block_id, $link, $alt, '1');
      }
      $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "blocks" . DS . $old_image . ".jpg";
      $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "blocks" . DS . "thumbs" . DS . $old_image . ".jpg";
      if (file_exists($old_img_link)) unlink($old_img_link);
      if (file_exists($old_thmb_link)) unlink($old_thmb_link);
    }

    update_block_image_alt_text($conn, $block_id, $alt);

  }

  if (   $raw_block_info_updated
    && $block_name_updated
    && $block_image_updated
  ) {
    $block_updated = true;
    reload_page();
  }

}
