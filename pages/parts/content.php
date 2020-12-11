<?php

$page = defined("SECTION") ? SECTION : PAGE;
$path = $page === "admin" ? ADMIN_DIR . "index" : CONTENT_DIR . $page;

$page_title = get_active_page_name($conn, $page, LANG);

require BLOCKS_DIR . "header.php";

require BLOCKS_DIR . "menu.main.php";

if ($page === "admin" && AUTH) {
  require BLOCKS_DIR . "menu.admin.php";
}

if (SECTION === "males" || SECTION === "females" || SECTION === "for-sale") {
  $path = CONTENT_DIR . "cart";
}

require $path . ".php";

require BLOCKS_DIR . "footer.php";
