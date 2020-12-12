<?php

$news_list = get_news_list($conn, LANG);

?>

<section class="news">
  <div class="container">
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <h1 class="display-4 mt-5 mb-4">Редактирование новостей</h1>
      </div>
      <div class="col-4">
      <a class="btn btn-outline-success float-right" href="<?php echo SITE; ?>admin/news/add" role="button">Добавить</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col">

<?php foreach ($news_list as $news_item) :

  $edit_url = SITE . "admin/news/edit/" . $news_item["id"];
  $img_url = SITE . "public/img/news/thumbs/" . $news_item["image"]["news_image_link"] . ".jpg";
  
  $date_obj = DateTime::createFromFormat('Y-m-d', $news_item["news_year"] . "-" . $news_item["news_month"] . "-" . $news_item["news_day"]);
  $date = $date_obj->format('Y-m-d');

?>

        <div class="row mt-5 mb-5">
          <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
            <div class="row">
              <div class="col">
                <a href="<?=$edit_url?>"><div style="background-image: url(<?=$img_url?>)" class="img-thumbnail"></div></a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10">
            <div class="row">
              <div class="col">
                <h5><?=$news_item["title"]?></h5>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10"><?=$news_item["link"]?></div>
              <div class="col-sm-12 d-sm-block d-md-none"><hr></div>
              <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2 text-sm-left text-md-right"><?=$date?></div>
            </div>
            <div class="row">
              <div class="col">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col"><?=$news_item["text"]?></div>
            </div>
            <div class="row">
              <div class="col text-right"><a class="btn btn-outline-primary" href="<?=$edit_url?>" role="button"><i class="fas fa-edit"></i> изменить</a></div>
            </div>
          </div>
        </div>

<?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
