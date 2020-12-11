
<section class="<?=$type?>">
  <div class="container">

    <div class="row">
      <div class="col">
        <h1 class="display-4"><?=$page_title?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

    <div class="row">
<?php foreach ($dogs as $dog) :
$img_url = SITE . "public/img/dogs/thumbs/" . $dog["images"]["dog_image_link"] . ".jpg";
$edit_url = SITE . $page . "/" . $dog["id"];
?>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">

      <div class="row">
        <div class="col"><a href="<?=$edit_url?>"><div style="background-image: url(<?=$img_url?>)" class="img-thumbnail"></div></a></div>
      </div>

      <div class="row">
        <div class="col"><h5><?=$dog["dog_name"]?></h5></div>
      </div>

      <div class="row">
        <div class="col"><?=$dog["dog_birth"]?></div>
      </div>
      
      <div class="row">
        <div class="col">
          <hr>
        </div>
      </div>

    </div>

<?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

  </div>
</section>
