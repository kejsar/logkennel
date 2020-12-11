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

require PARTS_DIR . "common.php";

require DB_DIR . "init.php";
require DB_DIR . "read.php";

require PARTS_DIR . "auth.php";
require PARTS_DIR . "init.php";

$settings = get_settings($conn, LANG);

if (IS_ADMIN) {
  require DB_DIR . "create.php";
  require DB_DIR . "update.php";
  require DB_DIR . "delete.php";
  if (isset($_POST["page"])) {
    if ($_POST["page"] === "dogs") require PARTS_DIR . "dogs.process.php";
    if ($_POST["page"] === "news") require PARTS_DIR . "news.process.php";
    if ($_POST["page"] === "blocks") require PARTS_DIR . "blocks.process.php";
  }
}

?><!DOCTYPE html>
<html lang="<?=LANG?>">
<head>
<?php require PARTS_DIR . "head.php"; ?>

<?php require PARTS_DIR . "css.main.php"; ?>
<?php if (IS_ADMIN) require PARTS_DIR . "css.admin.php"; ?>
<?php require PARTS_DIR . "css.custom.php"; ?>
</head>
<body>

<?php require PARTS_DIR . "content.php"; ?>

<?php require PARTS_DIR . "scripts.main.php"; ?>
<?php if (IS_ADMIN) require PARTS_DIR . "scripts.admin.php"; ?>
<?php require PARTS_DIR . "scripts.custom.php"; ?>

</body>
</html>
