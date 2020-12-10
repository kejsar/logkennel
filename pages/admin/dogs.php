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
  <div class="container-lg">
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

<?php foreach ($dogs as $dog) :

  $for_sale_icon = $dog["for_sale"] ? "$$$" : "";
  $edit_url = SITE . "admin/dogs/edit/" . $dog["id"];
  $img_url = SITE . "public/img/dogs/thumbs/" . $dog["images"]["dog_image_link"] . ".jpg";

?>

        <div class="row">
          <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <a href="<?=$edit_url?>"><div style="background-image: url(<?=$img_url?>)" class="img-thumbnail"></div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10">
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <h5><?=$dog["dog_name"]?></h5>
              </div>
              <div class="col">
                <a class="btn btn-outline-primary float-right" href="<?=$edit_url?>" role="button"><i class="fas fa-edit"></i> изменить</a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <?=$dog["dog_birth"]?>
              </div>
              <div class="col">
                <?=$dog["gender_name"]?>
              </div>
              <div class="col">
                <?=$for_sale_icon?>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <?=$dog["dog_info"]?>
              </div>
            </div>
          </div>
        </div>
    
        <div class="row">
          <div class="col">
            <hr>
          </div>
        </div>

<?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
