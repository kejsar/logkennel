<?php

if (AUTH) {
  
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
