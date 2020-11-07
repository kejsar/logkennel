<?php

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_DIR", dirname(__FILE__) . DS);

define("BLOCKS_DIR",  ROOT_DIR . "blocks" . DS);
define("ADMIN_DIR",   ROOT_DIR . "pages"  . DS . "admin"   . DS);
define("CONTENT_DIR", ROOT_DIR . "pages"  . DS . "content" . DS);
define("PARTS_DIR",   ROOT_DIR . "pages"  . DS . "parts"   . DS);
define("DB_DIR",      ROOT_DIR . "db"     . DS);

require DB_DIR . "init_db.php";
require DB_DIR . "read.php";

require PARTS_DIR . "init.php";

?><!DOCTYPE html>
<html lang="ru">
<head>
<?php require PARTS_DIR . "head.php"; ?>
</head>
<body>

<?php require PARTS_DIR . "content.php"; ?>

<?php require PARTS_DIR . "scripts.php"; ?>

</body>
</html>
