<?php

if (defined("SUBPAGE") && SUBPAGE === "add") {
  require ADMIN_DIR . PAGE . ".add.php";
} elseif (defined("SUBPAGE") && SUBPAGE === "edit") {
  require ADMIN_DIR . PAGE . ".edit.php";
} else {
  require BLOCKS_DIR . "dogs_menu.php";
  require ADMIN_DIR . PAGE . ".list.php";
}
