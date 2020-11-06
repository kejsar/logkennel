<?php

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__FILE__) . DS);

require ROOT . "pages" . DS . "parts" . DS . "code.php";

// require ROOT . "db" . DS . "create.php";
require ROOT . "db" . DS . "update.php";

?><!DOCTYPE html>
<html lang="en">
<head>

<?php require ROOT . "pages" . DS . "parts" . DS . "head.php"; ?>

</head>
<body>

<?php require ROOT . "pages" . DS . PAGE . ".php"; ?>

<?php require ROOT . "pages" . DS . "parts" . DS . "scripts.php"; ?>

</body>
</html>
