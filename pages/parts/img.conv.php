<?php

// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$file_name = $_FILES["imageinput"]["name"]; // The file name
$file_tmp_loc = $_FILES["imageinput"]["tmp_name"]; // File in the PHP tmp folder
$file_type = $_FILES["imageinput"]["type"]; // The type of file it is
$file_size = $_FILES["imageinput"]["size"]; // File size in bytes
$file_error_msg = $_FILES["imageinput"]["error"]; // 0 for false... and 1 for true
$file_name = preg_replace("#[^a-z.0-9]#i", "", $file_name); // filter the $file_name
$kaboom = explode(".", $file_name); // Split file name into an array using the dot
$file_ext = end($kaboom); // Now target the last array element to get the file extension
if ($file_ext === "jpeg") $file_ext = "jpg";
$err_message = "";

$new_img_name = date_timestamp_get(date_create());
$tmp_dir = ROOT_DIR . "public" . DS . "img" . DS . "tmp" . DS . $new_img_name  . "." . $file_ext;
$img_dir = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . $new_img_name  . ".jpg";
$thumb_dir = ROOT_DIR . "public" . DS . "img" . DS . "dogs" . DS . "thumbs" . DS . $new_img_name  . ".jpg";

// START PHP Image Upload Error Handling --------------------------------
if (!$file_tmp_loc) { // if file not chosen
  $err_message = "ERROR: Please browse for a file before clicking the upload button.";
} else if($file_size > 5242880) { // if file size is larger than 5 Megabytes
  $err_message = "ERROR: Your file was larger than 5 Megabytes in size.";
  unlink($file_tmp_loc); // Remove the uploaded file from the PHP temp folder
} else if (!preg_match("/.(gif|jpg|jpeg|png)$/i", $file_name) ) {
  // This condition is only if you wish to allow uploading of specific file types
  $err_message = "ERROR: Your image was not .gif, .jpg, or .png.";
  unlink($file_tmp_loc); // Remove the uploaded file from the PHP temp folder
} else if ($file_error_msg == 1) { // if file upload error key is equal to 1
  $err_message = "ERROR: An error occured while processing the file. Try again.";
}
// END PHP Image Upload Error Handling ----------------------------------

// Place it into your "uploads" folder now using the move_uploaded_file() function
$moveResult = move_uploaded_file($file_tmp_loc, $tmp_dir);
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
  $err_message = "ERROR: File not uploaded. Try again.";
}

if (strtolower($file_ext) == "jpg" || strtolower($file_ext) == "jpeg") {
// ---------- Start Universal Image Resizing Function --------
  $target_file = $tmp_dir;

  $resized_file = $img_dir;
  $w_max = 1000;
  $h_max = 1000;
  ak_img_resize($target_file, $resized_file, $w_max, $h_max, "jpg");

  $thumb_file = $thumb_dir;
  $w_max = 300;
  $h_max = 300;
  ak_img_resize($resized_file, $thumb_file, $w_max, $h_max, "jpg");
// ----------- End Universal Image Resizing Function ----------
  unlink($target_file);
} else {
  $target_file = $tmp_dir;

  $new_jpg = $img_dir;
  ak_img_convert_to_jpg($target_file, $new_jpg, $file_ext);

  $resized_file = $img_dir;
  $w_max = 1000;
  $h_max = 1000;
  ak_img_resize($target_file, $resized_file, $w_max, $h_max, $file_ext);

  $thumb_file = $thumb_dir;
  $w_max = 300;
  $h_max = 300;
  ak_img_resize($resized_file, $thumb_file, $w_max, $h_max, $file_ext);

  unlink($target_file);
}

// ----------- End Convert to JPG Function -----------
// Display things to the page so you can see what is happening for testing purposes
// echo "The file named <strong>$file_name</strong> uploaded successfuly.<br /><br />";
// echo "It is <strong>$file_size</strong> bytes in size.<br /><br />";
// echo "It is an <strong>$file_type</strong> type of file.<br /><br />";
// echo "The file extension is <strong>$file_ext</strong><br /><br />";
// echo "The Error Message output for this upload is: $file_error_msg";

// ----------------------- RESIZE FUNCTION -----------------------
// Function for resizing any jpg, gif, or png image files
function ak_img_resize($target, $new_copy, $w, $h, $ext) {
  list($w_orig, $h_orig) = getimagesize($target);
  $scale_ratio = $w_orig / $h_orig;
  if (($w / $h) > $scale_ratio) {
    $w = $h * $scale_ratio;
  } else {
    $h = $w / $scale_ratio;
  }
  $img = "";
  $ext = strtolower($ext);
  if ($ext == "gif") {
    $img = imagecreatefromgif($target);
  } else if($ext =="png") {
    $img = imagecreatefrompng($target);
  } else {
    $img = imagecreatefromjpeg($target);
  }
  $tci = imagecreatetruecolor($w, $h);
  // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
  imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
  // if ($ext == "gif") {
  //   imagegif($tci, $new_copy);
  // } else if($ext =="png") {
  //   imagepng($tci, $new_copy);
  // } else {
  //   imagejpeg($tci, $new_copy, 84);
  // }
  imagejpeg($tci, $new_copy, 84);
}

// ---------------- THUMBNAIL (CROP) FUNCTION ------------------
// Function for creating a true thumbnail cropping from any jpg, gif, or png image files
function ak_img_thumb($target, $new_copy, $w, $h, $ext) {
  list($w_orig, $h_orig) = getimagesize($target);
  $src_x = ($w_orig / 2) - ($w / 2);
  $src_y = ($h_orig / 2) - ($h / 2);
  $ext = strtolower($ext);
  $img = "";
  if ($ext == "gif") {
    $img = imagecreatefromgif($target);
  } else if($ext =="png") {
    $img = imagecreatefrompng($target);
  } else {
    $img = imagecreatefromjpeg($target);
  }
  $tci = imagecreatetruecolor($w, $h);
  imagecopyresampled($tci, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);
  // if ($ext == "gif") {
  //   imagegif($tci, $new_copy);
  // } else if($ext =="png") {
  //   imagepng($tci, $new_copy);
  // } else {
  //   imagejpeg($tci, $new_copy, 84);
  // }
  imagejpeg($tci, $new_copy, 84);
}

// ------------------ IMAGE CONVERT FUNCTION -------------------
// Function for converting GIFs and PNGs to JPG upon upload
function ak_img_convert_to_jpg($target, $new_copy, $ext) {
  list($w_orig, $h_orig) = getimagesize($target);
  $ext = strtolower($ext);
  $img = "";
  if ($ext == "gif") {
    $img = imagecreatefromgif($target);
  } else if($ext =="png") {
    $img = imagecreatefrompng($target);
  }
  $tci = imagecreatetruecolor($w_orig, $h_orig);
  imagecopyresampled($tci, $img, 0, 0, 0, 0, $w_orig, $h_orig, $w_orig, $h_orig);
  imagejpeg($tci, $new_copy, 84);
}
