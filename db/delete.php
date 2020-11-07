<?php

function delete_block($conn, $block_id) {
  $sql = "DELETE FROM `block` 
            WHERE `id` = :block_id";
  $sth = $conn->prepare($sql);
  return $sth->execute(array(
    ":block_id" => $block_id
  ));
}
