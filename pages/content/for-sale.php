<?php

$type = "for-sale";
$dogs = get_dogs($conn, $type, LANG);
foreach ($dogs as $key => $dog) {
  $dogs[$key]["images"] = get_dog_main_image($conn, $dog["id"]);
}

require PARTS_DIR . "dogs.list.php";
