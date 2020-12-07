<?php

// ADD NEW DOG ================================================================

if (isset($_POST["action"]) && $_POST["action"] === "add") {

  $dog_added = false;
  $link = "";
  $img_upload_error = "";
  $main = "1";

  if (isset($_FILES["imageinput"])) {

    require PARTS_DIR . "img.conv.php";

    $file_name = $_FILES["imageinput"]["name"];
    $file_tmp_loc = $_FILES["imageinput"]["tmp_name"];
    $file_type = $_FILES["imageinput"]["type"];
    $file_size = $_FILES["imageinput"]["size"];
    $file_error_msg = $_FILES["imageinput"]["error"];

    $link = date_timestamp_get(date_create());
    $img_upload_error = upload_image($link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg);

  }

  if ($link && !$img_upload_error) {
    $name        = isset($_POST["name"]) ? $_POST["name"] : "";
    $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
    $for_sale    = isset($_POST["for_sale"]) && $_POST["for_sale"] === "on" ? 1 : 0;
    $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
    $info        = isset($_POST["info"]) ? $_POST["info"] : "";
    $alt         = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";

    $dog_id = add_dog($conn, $birth, $gender_type, $for_sale, $info);

    if ($dog_id) {
      $dog_name_added = add_dog_name($conn, $dog_id, $name, LANG);
      $dog_image_added = add_dog_image($conn, $dog_id, $link, $alt, $main);
    }

    if (   $dog_id
        && $dog_name_added
        && $dog_image_added
    ) {
      $dog_added = true;
      reload_page();
    }
  }

}

// EDIT CURRENT DOG ===========================================================

if (isset($_POST["action"]) && $_POST["action"] === "edit") {

  $dog_id      = $_POST["id"];
  $dog_name    = isset($_POST["name"]) ? $_POST["name"] : "";
  $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
  $for_sale    = isset($_POST["for_sale"]) && $_POST["for_sale"] === "on" ? 1 : 0;
  $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
  $info        = isset($_POST["info"]) ? $_POST["info"] : "";
  $alt         = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";

  $dog_updated = false;
  $link = "";
  $img_upload_error = "";
  $dog_image_updated = 1;

  if (isset($_FILES["imageinput"]["tmp_name"]) && $_FILES["imageinput"]["tmp_name"] !== "") {

    require PARTS_DIR . "img.conv.php";
    
    $file_name = $_FILES["imageinput"]["name"];
    $file_tmp_loc = $_FILES["imageinput"]["tmp_name"];
    $file_type = $_FILES["imageinput"]["type"];
    $file_size = $_FILES["imageinput"]["size"];
    $file_error_msg = $_FILES["imageinput"]["error"];
    
    $old_image = isset($_POST["old_image"]) ? $_POST["old_image"] : "";

    $link = date_timestamp_get(date_create());
    $img_upload_error = upload_image($link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg);

  }

  $raw_dog_info_updated = update_dog($conn, $birth, $for_sale, $info, $gender_type, $dog_id);

  if ($raw_dog_info_updated) {

    $dog_name_updated = update_dog_name($conn, $dog_id, $dog_name, LANG);

    if ($link && !$img_upload_error) {
      if ($old_image) {
        $dog_image_updated = update_dog_image($conn, $dog_id, $link);
      } else {
        $dog_image_updated = add_dog_image($conn, $dog_id, $link, $alt, '1');
      }
      $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . $old_image . ".jpg";
      $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . "thumbs" . DS . $old_image . ".jpg";
      if (file_exists($old_img_link)) unlink($old_img_link);
      if (file_exists($old_thmb_link)) unlink($old_thmb_link);
    }

    update_dog_image_alt_text($conn, $dog_id, $alt);

  }

  if (   $raw_dog_info_updated
    && $dog_name_updated
    && $dog_image_updated
  ) {
    $dog_updated = true;
    reload_page();
  }

}

// DELETE CURRENT DOG =========================================================

if (isset($_POST["action"]) && $_POST["action"] === "delete") {

  $dog_delete_id = isset($_POST["delete_id"]) ? $_POST["delete_id"] : "";

  $dog_images = get_all_dog_images($conn, $dog_delete_id);

  foreach ($dog_images as $image) {
    $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . $image["dog_image_link"] . ".jpg";
    $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . "thumbs" . DS . $image["dog_image_link"] . ".jpg";
    if (file_exists($old_img_link)) unlink($old_img_link);
    if (file_exists($old_thmb_link)) unlink($old_thmb_link);
  }

  delete_dog_by_dog_id($conn, $dog_delete_id);
  reload_page();

}

// ADD PHOTOS TO THE GALLERY ==================================================

if (isset($_POST["action"]) && $_POST["action"] === "add_image") {

  $dog_id = isset($_POST["id"]) ? $_POST["id"] : "";
  $link = "";
  $img_upload_error = "";
  $alt = "";
  $main = "0";

  if (isset($_FILES["imageinput"])) {

    require PARTS_DIR . "img.conv.php";

    $total = count($_FILES['imageinput']['name']);

    for ($i = 0 ; $i < $total ; $i++) {
      $file_name = $_FILES["imageinput"]["name"][$i];
      $file_tmp_loc = $_FILES["imageinput"]["tmp_name"][$i];
      $file_type = $_FILES["imageinput"]["type"][$i];
      $file_size = $_FILES["imageinput"]["size"][$i];
      $file_error_msg = $_FILES["imageinput"]["error"][$i];
  
      if ($file_name !== "") {
        $link = date_timestamp_get(date_create()) . $i;
        $img_upload_error = upload_image($link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg);
      
        if (!$img_upload_error && $dog_id) {
          $dog_image_added = add_dog_image($conn, $dog_id, $link, $alt, $main);
        }
      }

      $file_name = "";
      $file_tmp_loc = "";
      $file_type = "";
      $file_size = "";
      $file_error_msg = "";
      $link = "";
      $img_upload_error = "";
    }

    reload_page();

  }

}

// DELETE IMAGE ===============================================================

if (isset($_POST["action"]) && $_POST["action"] === "delete_image") {

  $delete_link = isset($_POST["delete_link"]) ? $_POST["delete_link"] : "";
  if ($delete_link) {
    delete_dog_image($conn, $delete_link);
    reload_page();
  }

}
