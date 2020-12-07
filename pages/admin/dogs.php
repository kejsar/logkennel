<?php

require BLOCKS_DIR . "menu.dogs.php";

$search_type = defined("SUBPAGE") ? SUBPAGE : "all";
if ($search_type === "sale") $search_type = "for_sale";

$dogs = get_dogs($conn, $search_type, LANG);
foreach ($dogs as $key => $dog) {
  $dogs[$key]["images"] = get_dog_main_image($conn, $dog["id"]);
}

?>

<section class="dogs">
  <div class="container">
    <div class="row">
      <div class="col">

<?php if (isset($dog_added)): ?>
  <?php if ($dog_added): ?>
        <div class="alert alert-success" role="alert">
          Собакен <b><?=$dog_name?></b> успешно добавлен!
        </div>
  <?php else: ?>
        <div class="alert alert-danger" role="alert">
          Собакен <b><?=$dog_name?></b> не добавлен!
          <?php if (isset($img_upload_error) && $img_upload_error !== "") echo $img_upload_error; ?>
        </div>
  <?php endif; ?>
<?php endif; ?>

<?php if (isset($dog_updated) && $dog_updated): ?>
        <div class="alert alert-success" role="alert">
          Собакен <b><?=$dog_name?></b> успешно обновлен!
        </div>
<?php endif; ?>

        <table class="table">
          <tbody>
<?php

foreach ($dogs as $dog) {

  $for_sale_icon = $dog["for_sale"] ? "$$$" : "";
  $edit_url = SITE . "admin/dogs/edit/" . $dog["id"];
  $img_url = SITE . "public/img/dogs/thumbs/" . $dog["images"]["dog_image_link"] . ".jpg";

  echo "<tr>";
  echo "  <td rowspan=\"3\"><a href=\"" . $edit_url . "\"><div style=\"background-image: url(" . $img_url . ")\" class=\"img-thumbnail\"></div></a></td>";
  echo "  <td><h5>" . $dog["dog_name"] . "</h5></td>";
  echo "  <td>" . $dog["dog_birth"] . "</td>";
  echo "  <td>" . $dog["gender_name"] . "</td>";
  echo "  <td>" . $for_sale_icon . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"4\">" . $dog["dog_info"] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"4\"><a class=\"btn btn-outline-primary\" href=\"" . $edit_url . "\" role=\"button\"><i class=\"fas fa-edit\"></i> изменить</a></td>";
  echo "</tr>";

}

?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
