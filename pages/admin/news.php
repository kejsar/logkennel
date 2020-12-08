<?php

$news = get_news_items($conn, LANG);
foreach ($news as $key => $news_item) {
  $news[$key]["images"] = get_news_main_image($conn, $news_item["id"]);
}

?>

<section class="news">
  <div class="container">
    <div class="row">
      <div class="col">

        <table class="table">
          <tbody>
<?php

foreach ($news as $news_item) {

  $edit_url = SITE . "admin/news/edit/" . $news_item["id"];
  $img_url = SITE . "public/img/news/thumbs/" . $news_item["images"]["news_image_link"] . ".jpg";

  echo "<tr>";
  echo "  <td rowspan=\"4\"><a href=\"" . $edit_url . "\"><div style=\"background-image: url(" . $img_url . ")\" class=\"img-thumbnail\"></div></a></td>";
  echo "  <td><h5>" . $news_item["news_title"] . "</h5></td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"2\">" . $news_item["news_link"] . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "  <td colspan=\"2\">" . $news_item["news_text"] . "</td>";
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
