<?php

$page = defined("SECTION") ? SECTION : PAGE;
$path = $page === "admin" ? ADMIN_DIR . "index" : CONTENT_DIR . $page;

require BLOCKS_DIR . "header.php";

require BLOCKS_DIR . "menu.php";

if ($page === "admin" && AUTH) {
  require BLOCKS_DIR . "admin_menu.php";
}

require $path . ".php";

require BLOCKS_DIR . "footer.php";
