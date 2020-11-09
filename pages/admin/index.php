<?php

if (AUTH) {

  require DB_DIR . "create.php";
  require DB_DIR . "update.php";
  require DB_DIR . "delete.php";
  
  if (defined("SECTION")) {
    require ADMIN_DIR . PAGE . ".php";
  }
  
} else {
  require BLOCKS_DIR . "login.php";
}
