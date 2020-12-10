<?php

// ADD NEW NEWS ITEM ==========================================================

if (isset($_POST["action"]) && $_POST["action"] === "add") {

  $news_added = false;
  $link = "";
  $img_upload_error = "";

  if (isset($_FILES["imageinput"])) {

    require PARTS_DIR . "img.conv.php";

    $file_name = $_FILES["imageinput"]["name"];
    $file_tmp_loc = $_FILES["imageinput"]["tmp_name"];
    $file_type = $_FILES["imageinput"]["type"];
    $file_size = $_FILES["imageinput"]["size"];
    $file_error_msg = $_FILES["imageinput"]["error"];

    $img_link = date_timestamp_get(date_create());
    $img_upload_error = upload_image($img_link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg, "news");

  }

  $alt   = isset($_POST["news_img_alt"]) ? $_POST["news_img_alt"] : "";
  $title = isset($_POST["news_title"]) ? $_POST["news_title"] : "";
  $text  = isset($_POST["news_text"]) ? $_POST["news_text"] : "";
  $news_link = get_link($title);
  $main = "1";

  $date = new DateTime();
  $news_year  = $date->format("Y");
  $news_month = $date->format("m");
  $news_day   = $date->format("d");

  $news_id = add_news($conn, $news_year, $news_month, $news_day);

  if ($news_id) {
    if ($img_link && !$img_upload_error) {
      if ($alt === "") $alt = $title;
      $news_image_added  = add_news_image($conn, $news_id, $img_link, $alt, $main);
    }
    $news_link_added   = add_news_link($conn, $news_id, $news_link, LANG);
    $news_text_added   = add_news_text($conn, $news_id, $text, LANG);
    $news_title_added  = add_news_title($conn, $news_id, $title, LANG);
  }

  if (   $news_id
      && $news_link_added
      && $news_text_added
      && $news_title_added
  ) {
    $news_added = true;
    reload_page();
  }

}

// EDIT CURRENT NEWS ==========================================================

if (isset($_POST["action"]) && $_POST["action"] === "edit") {

  $news_id = $_POST["id"];
  $title = isset($_POST["title"]) ? $_POST["title"] : "";
  $link = isset($_POST["link"]) ? $_POST["link"] : "";
  $text = isset($_POST["text"]) ? $_POST["text"] : "";
  $alt = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";
  
  $post_date = isset($_POST["date"]) ? $_POST["date"] : "";
  $date_obj = DateTime::createFromFormat('Y-m-d', $post_date);
  $news_year = $date_obj->format('Y');
  $news_month = $date_obj->format('m');
  $news_day = $date_obj->format('d');

  $news_updated = false;
  $img_link = "";
  $img_upload_error = "";
  $news_image_updated = "";

  if (isset($_FILES["imageinput"]["tmp_name"]) && $_FILES["imageinput"]["tmp_name"] !== "") {

    require PARTS_DIR . "img.conv.php";
    
    $file_name = $_FILES["imageinput"]["name"];
    $file_tmp_loc = $_FILES["imageinput"]["tmp_name"];
    $file_type = $_FILES["imageinput"]["type"];
    $file_size = $_FILES["imageinput"]["size"];
    $file_error_msg = $_FILES["imageinput"]["error"];
    
    $old_image = isset($_POST["old_image"]) ? $_POST["old_image"] : "";

    $img_link = date_timestamp_get(date_create());
    $img_upload_error = upload_image($img_link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg, "news");

  }

  $raw_news_info_updated = update_news($conn, $news_id, $news_year, $news_month, $news_day);
  $raw_news_info_updated = update_news_link($conn, $news_id, $link, LANG);
  $raw_news_info_updated = update_news_text($conn, $news_id, $text, LANG);
  $raw_news_info_updated = update_news_title($conn, $news_id, $title, LANG);

  if ($raw_news_info_updated) {


    if ($img_link && !$img_upload_error) {
      if ($old_image) {
        $news_image_updated = update_news_image($conn, $news_id, $img_link, $alt, '1');
      } else {
        $news_image_updated = add_news_image($conn, $news_id, $img_link, $alt, '1');
      }
      $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . $old_image . ".jpg";
      $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . "thumbs" . DS . $old_image . ".jpg";
      if (file_exists($old_img_link)) unlink($old_img_link);
      if (file_exists($old_thmb_link)) unlink($old_thmb_link);
    }

    update_news_image_alt_text($conn, $news_id, $alt);

  }

  if ($raw_news_info_updated && $news_image_updated) {
    $news_updated = true;
    reload_page();
  }

}

// DELETE CURRENT NEWS =========================================================

if (isset($_POST["action"]) && $_POST["action"] === "delete") {

  $news_delete_id = isset($_POST["delete_id"]) ? $_POST["delete_id"] : "";

  $news_images = get_all_news_images($conn, $news_delete_id);

  foreach ($news_images as $image) {
    $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . $image["news_image_link"] . ".jpg";
    $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . "thumbs" . DS . $image["news_image_link"] . ".jpg";
    if (file_exists($old_img_link)) unlink($old_img_link);
    if (file_exists($old_thmb_link)) unlink($old_thmb_link);
  }

  delete_news_by_news_id($conn, $news_delete_id);
  reload_page();

}

// ADD PHOTOS TO THE GALLERY ==================================================

if (isset($_POST["action"]) && $_POST["action"] === "add_image") {

  $news_id = isset($_POST["id"]) ? $_POST["id"] : "";
  $img_link = "";
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
        $img_link = date_timestamp_get(date_create()) . $i;
        $img_upload_error = upload_image($img_link, $file_name, $file_tmp_loc, $file_type, $file_size, $file_error_msg, "news");
      
        if (!$img_upload_error && $news_id) {
          $news_image_added = add_news_image($conn, $news_id, $img_link, $alt, $main);
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
    delete_news_image($conn, $delete_link);
    $old_img_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . $delete_link . ".jpg";
    $old_thmb_link = ROOT_DIR . "public" . DS . "img" . DS . "news" . DS . "thumbs" . DS . $delete_link . ".jpg";
    if (file_exists($old_img_link)) unlink($old_img_link);
    if (file_exists($old_thmb_link)) unlink($old_thmb_link);
    reload_page();
  }

}
