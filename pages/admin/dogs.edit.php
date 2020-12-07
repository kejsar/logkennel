<?php

$dog = get_dog($conn, SUBSUBPAGE, LANG);
var_dump($dog);
$img_url = SITE . "public/img/dogs/" . $dog["dog_image_link"] . ".jpg";

?>

<section class="dog-edit">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Редактировать собачку: <?=$dog["dog_name"]?></h1>

        <form action="<?=SITE?>admin/dogs" method="post" enctype="multipart/form-data">

          <input type="hidden" name="page" value="dog">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" value="<?=$dog["id"]?>">

          <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

              <div class="form-group">
                <div class="card">
                  <img src="<?=$img_url?>" alt="<?=$dog["dog_image_alt_text"]?>" class="card-img-top" id="card-img-top">
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="img_alt" value="<?=$dog["dog_image_alt_text"]?>" required>
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
              </div>

            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</section>
