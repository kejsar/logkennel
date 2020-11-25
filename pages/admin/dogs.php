<?php

if (defined("SUBPAGE") && SUBPAGE === "add") {
  require ADMIN_DIR . "dogs.add.php";
} elseif (defined("SUBPAGE") && SUBPAGE === "edit") {
  require ADMIN_DIR . "dogs.edit.php";
} else {
  require BLOCKS_DIR . "menu.dogs.php";
  require ADMIN_DIR . "dogs.list.php";
}
