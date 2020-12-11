<?php

$dog = get_dog($conn, PAGE, LANG);
$dog_main_image = get_dog_main_image($conn, $dog["id"]);
$dog_images = get_dog_images($conn, $dog["id"]);
$img_url = SITE . "public/img/dogs/" . $dog_main_image["dog_image_link"] . ".jpg";
$thmb_url = SITE . "public/img/dogs/thumbs/" . $dog_main_image["dog_image_link"] . ".jpg";

?>

<section class="cart">
  <div class="container">
    <div class="row">
      <div class="col">


        <div class="row">
          <div class="col">
            <hr>
          </div>
        </div>

        <div class="row">

          <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
            <div class="card">
              <a href="<?=$img_url?>" 
                data-toggle="lightbox" 
                data-title="<?=$dog["dog_name"]?>" 
                data-footer="<?=$dog["dog_birth"]?>"
                class="img-square-main"
                style="background-image: url(<?=$thmb_url?>)">
              </a>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">

            <div class="row">
              <div class="col">
                <h1><?=$dog["dog_name"]?></h1>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col-5 col-xl-4"><?=$dog["dog_birth"]?></div>
            </div>
                
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>

            <div class="row">
              <div class="col"><?=$dog["dog_info"]?></div>
            </div>

            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>

<?php if ($dog_images !== "") : ?>
            <div class="row justify-content-start">
              <div class="col">
                <div class="row">
<?php foreach ($dog_images as $image) : ?>
                  <a href="<?=SITE?>public/img/dogs/<?=$image["dog_image_link"]?>.jpg" 
                    data-toggle="lightbox" 
                    data-gallery="example-gallery" 
                    class="col-sm-2 img-square"
                    style="background-image: url(<?=SITE?>public/img/dogs/thumbs/<?=$image["dog_image_link"]?>.jpg)">
                  </a>
<?php endforeach; ?>
                </div>
              </div>
            </div>
<?php endif; ?>

          </div>

        </div>

      </div>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

  </div>
</section>
