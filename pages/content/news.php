<?php

$news_list = get_news_list($conn, LANG);
// var_dump($news_list);

?>
<section class="news">
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

<?php foreach ($news_list as $news_item) : 
$images = get_news_image_list($conn, $news_item["id"]);
$img_url = SITE . "public/img/news/thumbs/" . $news_item["image"]["news_image_link"] . ".jpg";
?>
    <div class="row">

      <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div style="background-image: url(<?=$img_url?>)" class="img-thumbnail"></div>
      </div>

      <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">

        <div class="row">
          <div class="col">
            <h2><?=$news_item["title"]?></h2>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?=$news_item["news_day"]?>-<?=$news_item["news_month"]?>-<?=$news_item["news_year"]?>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <hr>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <?=$news_item["text"]?>
          </div>
        </div>

        <div class="row justify-content-start">
          <div class="col">
            <div class="row">
<?php foreach ($images as $image) : ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <a href="<?=SITE?>public/img/news/<?=$image["news_image_link"]?>.jpg" 
                  data-toggle="lightbox" 
                  data-gallery="example-gallery" 
                  class="img-square"
                  style="background-image: url(<?=SITE?>public/img/news/thumbs/<?=$image["news_image_link"]?>.jpg)">
                </a>
              </div>
<?php endforeach; ?>
            </div>
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
