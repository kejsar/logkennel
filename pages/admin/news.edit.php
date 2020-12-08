<?php

$news_item = get_news_item_by_id($conn, SUBSUBPAGE, LANG);
$image_list = get_news_image_list($conn, $news_item["id"]);
$img_url = SITE . "public/img/news/" . $news_item["image"]["news_image_link"] . ".jpg";
$date_obj = DateTime::createFromFormat('Y-m-d', $news_item["news_year"] . "-" . $news_item["news_month"] . "-" . $news_item["news_day"]);
$date = $date_obj->format('Y-m-d');
?>

<section class="news-edit">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Редактировать новость: <?=$news_item["title"]?></h1>
        
        <form action="<?=SITE?>admin/news" method="post" enctype="multipart/form-data" id="delete-form">
          <input type="hidden" name="page" value="news">
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="delete_id" value="<?=$news_item["id"]?>">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <button type="submit" class="btn btn-outline-danger btn-lg btn-block" id="delete-button"></button>
              </div>
            </div>
          </div>
        </form>

        <form action="<?=SITE?>admin/news" method="post" enctype="multipart/form-data">

          <input type="hidden" name="page" value="news">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" value="<?=$news_item["id"]?>">

          <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

              <input type="hidden" name="old_image" value="<?=$news_item["image"]["news_image_link"]?>">

              <div class="form-group">
                <div class="card">
                  <img src="<?=$img_url?>" alt="<?=$news_item["image"]["news_image_alt_text"]?>" class="card-img-top" id="card-img-top">
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="img_alt" value="<?=$news_item["image"]["news_image_alt_text"]?>" required>
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
                  <input type="text" class="form-control" name="title" value="<?=$news_item["title"]?>" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-7 col-xl-8">
                  <input type="text" class="form-control" name="link" value="<?=$news_item["link"]?>">
                </div>
                <div class="col-5 col-xl-4">
                  <input type="date" class="form-control" name="date" value="<?=$date?>">
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <textarea name="text"><?=$news_item["text"]?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col">
                  <a role="button" class="btn btn-danger" id="delete-confirm" data-dog-name="<?=$news_item["title"]?>"><i class="fas fa-times"></i> Delete</a>
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

    <form action="<?=SITE?>admin/news/edit/<?=$news_item["id"]?>" method="post" enctype="multipart/form-data">
      <div class="row">

        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
          <h3>Галерея:</h3>
        </div>

        <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10">

          <input type="hidden" name="page" value="news">
          <input type="hidden" name="action" value="add_image">
          <input type="hidden" name="id" value="<?=$news_item["id"]?>">

          <input type="file" name="imageinput[]" multiple>
          <button type="submit" class="btn btn-primary">Submit</button>

        </div>

      </div>
    </form>

<?php if ($image_list !== "") : ?>
    <div class="row">
<?php foreach ($image_list as $image) : ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <?php $img_url = SITE . "public/img/news/thumbs/" . $image["news_image_link"] . ".jpg"; ?>
        <div style="background-image: url(<?=$img_url?>)" class="img-thumbnail galery-image-edit">
          <form action="<?=SITE?>admin/news/edit/<?=$news_item["id"]?>" method="post">
            <input type="hidden" name="page" value="news">
            <input type="hidden" name="action" value="delete_image">
            <input type="hidden" name="delete_link" value="<?=$image["news_image_link"]?>">
            <button type="submit" class="btn btn-danger delete-image-button"><i class="fas fa-times"></i> Delete</button>
          </form>
        </div>
      </div>
<?php endforeach; ?>
    </div>
<?php endif; ?>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

  </div>
</section>
