<?php

$page = defined("SECTION") ? SECTION : PAGE;

$path = $page === "admin" ? ADMIN_DIR . "index" : CONTENT_DIR . $page;

require BLOCKS_DIR . "header.php";
require BLOCKS_DIR . "menu.php";

require $path . ".php";

require BLOCKS_DIR . "footer.php";
