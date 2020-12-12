<?php

$type = "for_sale";
$dogs = get_dogs($conn, $type, LANG);
foreach ($dogs as $key => $dog) {
  $dogs[$key]["images"] = get_dog_main_image($conn, $dog["id"]);
}

require BLOCKS_DIR . "dogs.list.php";
