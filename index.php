<?php

$site = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . "/";
define("SITE", $site);

define("LANG", 1);

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_DIR", dirname(__FILE__) . DS);

define("BLOCKS_DIR",  ROOT_DIR . "blocks" . DS);
define("ADMIN_DIR",   ROOT_DIR . "pages"  . DS . "admin"   . DS);
define("CONTENT_DIR", ROOT_DIR . "pages"  . DS . "content" . DS);
define("PARTS_DIR",   ROOT_DIR . "pages"  . DS . "parts"   . DS);
define("DB_DIR",      ROOT_DIR . "db"     . DS);

if (isset($_POST["img-upload"])) {
  require PARTS_DIR . "img.conv.php";
  exit();
}

require DB_DIR . "init_db.php";
require DB_DIR . "read.php";

require PARTS_DIR . "auth.php";
require PARTS_DIR . "init.php";

?><!DOCTYPE html>
<html lang="<?=LANG?>">
<head>
<?php require PARTS_DIR . "head.php"; ?>
</head>
<body>

<form action="<?=SITE?>" method="post" enctype=multipart/form-data>
  <label for="imageinput">Select a file:</label>
  <input type="file" name="imageinput" id="imageinput"><br><br>
  <input type="submit" value="Upload Image" name="img-upload">
</form>

<?php require PARTS_DIR . "content.php"; ?>

<?php require PARTS_DIR . "scripts.php"; ?>

</body>
</html>
