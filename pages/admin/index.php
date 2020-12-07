<?php

if (AUTH) {

  require DB_DIR . "create.php";
  require DB_DIR . "update.php";
  require DB_DIR . "delete.php";
  
  if (defined("SECTION")) {
    if (defined("SUBPAGE") && (SUBPAGE === "add" || SUBPAGE === "edit" || SUBPAGE === "delete")) {
      require ADMIN_DIR . PAGE . "." . SUBPAGE . ".php";
    } else {
      require ADMIN_DIR . PAGE . ".php";
    }
  }
  
} else {
  require BLOCKS_DIR . "login.php";
}
