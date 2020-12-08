<?php

$news_list = get_news_list($conn, LANG);

?>

<section class="news">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Редактирование новостей</h1>
      </div>
      <div class="col">
      <a class="btn btn-outline-success" href="<?php echo SITE; ?>admin/news/add" role="button">Добавить</a>
      </div>
    </div>
    <div class="row">
      <div class="col">

        <table class="table">
          <tbody>
<?php

foreach ($news_list as $news_item) {

  $edit_url = SITE . "admin/news/edit/" . $news_item["id"];
  $img_url = SITE . "public/img/news/thumbs/" . $news_item["image"]["news_image_link"] . ".jpg";
  
  $date_obj = DateTime::createFromFormat('Y-m-d', $news_item["news_year"] . "-" . $news_item["news_month"] . "-" . $news_item["news_day"]);
  $date = $date_obj->format('Y-m-d');

  echo "<tr>";
  echo "  <td rowspan=\"4\"><a href=\"" . $edit_url . "\"><div style=\"background-image: url(" . $img_url . ")\" class=\"img-thumbnail\"></div></a></td>";
  echo "  <td><h5>" . $news_item["title"] . "</h5></td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td>" . $news_item["link"] . "</td>";
  echo "  <td>" . $date . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"2\">" . $news_item["text"] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"2\"><a class=\"btn btn-outline-primary\" href=\"" . $edit_url . "\" role=\"button\"><i class=\"fas fa-edit\"></i> изменить</a></td>";
  echo "</tr>";

}

?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
