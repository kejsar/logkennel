
<section class="<?=$type?>">
  <div class="container">

    <div class="row">
      <div class="col">
        <h1 class="display-4">Мальчики</h1>
      </div>
    </div>

<?php foreach ($dogs as $dog) :
$img_url = SITE . "public/img/dogs/thumbs/" . $dog["images"]["dog_image_link"] . ".jpg";
$edit_url = SITE . "males/" . $dog["id"];
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
</section>
