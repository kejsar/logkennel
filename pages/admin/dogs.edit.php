<?php

$dog = get_dog($conn, SUBSUBPAGE, LANG);
$dog_main_image = get_dog_main_image($conn, $dog["id"]);
$dog_images = get_dog_images($conn, $dog["id"]);
$img_url = SITE . "public/img/dogs/" . $dog_main_image["dog_image_link"] . ".jpg";

?>

<section class="dog-edit">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Редактировать собачку: <?=$dog["dog_name"]?></h1>
        
        <form action="<?=SITE?>admin/dogs" method="post" enctype="multipart/form-data" id="delete-form">
          <input type="hidden" name="page" value="dogs">
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="delete_id" value="<?=$dog["id"]?>">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <button type="submit" class="btn btn-outline-danger btn-lg btn-block" id="delete-button"></button>
              </div>
            </div>
          </div>
        </form>

        <form action="<?=SITE?>admin/dogs" method="post" enctype="multipart/form-data">

          <input type="hidden" name="page" value="dogs">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" value="<?=$dog["id"]?>">

          <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

              <input type="hidden" name="old_image" value="<?=$dog_main_image["dog_image_link"]?>">

              <div class="form-group">
                <div class="card">
                  <img src="<?=$img_url?>" alt="<?=$dog_main_image["dog_image_alt_text"]?>" class="card-img-top" id="card-img-top">
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="img_alt" value="<?=$dog_main_image["dog_image_alt_text"]?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="imageinput" id="imageinput">
                    <label for="imageinput" class="custom-file-label">
                      Choose file
                    </label>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="name" value="<?=$dog["dog_name"]?>" required>
                </div>
              </div>

              <div class="form-group row">

                <div class="col-5 col-xl-4">
                  <input type="date" class="form-control" value="<?=$dog["dog_birth"]?>" name="birth">
                </div>

                <div class="col-3 col-xl-2 form-check">
                  <input class="form-check-input" type="checkbox" id="for-sale" name="for_sale"<?php if ($dog["for_sale"]) echo " checked"?>>
                  <label class="form-check-label" for="for-sale">
                    For Sale
                  </label>
                </div>

                <div class="col-4 col-xl-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender_type" value="1" required<?php if ($dog["gender_type"]) echo " checked"?>>
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender_type" value="0" required<?php if (!$dog["gender_type"]) echo " checked"?>>
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                </div>

              </div>

              <div class="form-group row">
                <div class="col">
                  <textarea name="info"><?=$dog["dog_info"]?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col">
                  <a role="button" class="btn btn-danger" id="delete-confirm" data-dog-name="<?=$dog["dog_name"]?>"><i class="fas fa-times"></i> Delete</a>
                </div>
              </div>

            </div>

          </div>
        </form>

      </div>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

    <form action="<?=SITE?>admin/dogs/edit/<?=$dog["id"]?>" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
          <h3>Галерея:</h3>
        </div>

        <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10">

          <input type="hidden" name="page" value="dogs">
          <input type="hidden" name="action" value="add_image">
          <input type="hidden" name="id" value="<?=$dog["id"]?>">

          <input type="file" name="imageinput[]" multiple>
          <button type="submit" class="btn btn-primary">Submit</button>

        </div>

      </div>
    </form>

<?php if ($dog_images !== "") : ?>
    <div class="row">
<?php foreach ($dog_images as $image) : ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <?php $img_url = SITE . "public/img/dogs/thumbs/" . $image["dog_image_link"] . ".jpg"; ?>
        <div style="background-image: url(<?=$img_url?>)" class="img-thumbnail galery-image-edit">
          <form action="<?=SITE?>admin/dogs/edit/<?=$dog["id"]?>" method="post">
            <input type="hidden" name="page" value="dogs">
            <input type="hidden" name="action" value="delete_image">
            <input type="hidden" name="delete_link" value="<?=$image["dog_image_link"]?>">
            <button type="submit" class="btn btn-danger delete-image-button"><i class="fas fa-times"></i> Delete</button>
          </form>
        </div>
      </div>
<?php endforeach; ?>
    </div>
<?php endif; ?>

  </div>
</section>
