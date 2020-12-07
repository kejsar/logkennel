<?php

var_dump($_POST);
var_dump($_FILES);
// exit;

require BLOCKS_DIR . "menu.dogs.php";

// ADD NEW DOG ================================================================

if (
       (isset($_POST["page"]) && $_POST["page"] === "dog")
    && (isset($_POST["action"]) && $_POST["action"] === "add")
) {

  $dog_added = false;
  $link = "";
  $img_upload_error = "";

  if (isset($_FILES["imageinput"])) {
    require PARTS_DIR . "img.conv.php";
    $link = $new_img_name;
    $img_upload_error = $err_message;
    $main = "1";
  }


  if ($link && !$img_upload_error) {
    $name        = isset($_POST["name"]) ? $_POST["name"] : "";
    $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
    $for_sale    = isset($_POST["for_sale"]) && $_POST["for_sale"] === "on" ? 1 : 0;
    $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
    $info        = isset($_POST["info"]) ? $_POST["info"] : "";
    $alt         = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";
  
    $dog_id = add_dog($conn, $birth, $gender_type, $for_sale, $info);

    if ($dog_id) {
      $dog_name_added = add_dog_name($conn, $dog_id, $name, LANG);
      $dog_image_added = add_dog_image($conn, $dog_id, $link, $alt, $main);
    }
  
    if (   $dog_id
        && $dog_name_added
        && $dog_image_added
    ) {
      $dog_added = true;
    }
  }
  
}

// EDIT CURRENT DOG ===========================================================

if (
       (isset($_POST["page"]) && $_POST["page"] === "dog")
    && (isset($_POST["action"]) && $_POST["action"] === "edit")
) {

  $dog_id      = $_POST["id"];
  $dog_name    = isset($_POST["name"]) ? $_POST["name"] : "";
  $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
  $for_sale    = isset($_POST["for_sale"]) && $_POST["for_sale"] === "on" ? 1 : 0;
  $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
  $info        = isset($_POST["info"]) ? $_POST["info"] : "";
  $alt         = isset($_POST["img_alt"]) ? $_POST["img_alt"] : "";

  $dog_updated = false;
  $link = "";
  $img_upload_error = "";
  $dog_image_updated = 1;

  if (isset($_FILES["imageinput"]["tmp_name"]) && $_FILES["imageinput"]["tmp_name"] !== "") {
    require PARTS_DIR . "img.conv.php";
    $link = $new_img_name;
    $img_upload_error = $err_message;
    $main = "1";
  }


  $dog_updated = update_dog($conn, $birth, $for_sale, $info, $gender_type, $dog_id);
  $raw_dog_info_updated = $dog_updated ? true : false;
  if ($raw_dog_info_updated) {
    $dog_name_updated = update_dog_name($conn, $dog_id, $dog_name, LANG);
    if ($link && !$img_upload_error) $dog_image_updated = update_dog_image($conn, $dog_id, $link, $alt, $main);
  }

  if (   $raw_dog_info_updated
      && $dog_name_updated
      && $dog_image_updated
  ) {
    $dog_updated = true;
  }
}

// SHOW DOG LIST ==============================================================

$search_type = defined("SUBPAGE") ? SUBPAGE : "all";
if ($search_type === "sale") $search_type = "for_sale";

$dogs = get_dogs($conn, $search_type, LANG);

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
  $img_url = SITE . "public/img/dogs/thumbs/" . $dog["dog_image_link"] . ".jpg";

  echo "<tr>";
  echo "  <td rowspan=\"3\"><div style=\"background-image: url(" . $img_url . ")\" class=\"img-thumbnail\"></div></td>";
  echo "  <td><h5>" . $dog["dog_name"] . "</h5></td>";
  echo "  <td>" . $dog["dog_birth"] . "</td>";
  echo "  <td>" . $dog["gender_name"] . "</td>";
  echo "  <td>" . $for_sale_icon . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"4\">" . $dog["dog_info"] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"3\"><a class=\"btn btn-outline-primary\" href=\"" . SITE . "admin/dogs/edit/" . $dog["id"] . "\" role=\"button\"><i class=\"fas fa-edit\"></i> изменить</a></td>";
  echo "  <td><a class=\"btn btn-outline-danger\" href=\"" . SITE . "admin/dogs/delete/" . $dog["id"] . "\" role=\"button\"><i class=\"fas fa-times\"></i> удалить</a></td>";
  echo "</tr>";

}

?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
