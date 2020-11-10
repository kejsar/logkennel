
<section id="lk-main-menu">
  <div class="container">
    <div class="row">
      <div class="col">
      
        <nav class="navbar navbar-expand-md navbar-light bg-light">

          <a class="navbar-brand d-block d-md-none" href="#">Навигация по сайту</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto">
<?php

$menu = get_menu($conn, LANG);

foreach($menu as $menu_item) {
  $active = $page === $menu_item["menu_link"] ? " active" : "";
  echo "<li class=\"nav-item\">";
  echo "  <a class=\"nav-link" . $active . "\" href=\"" . SITE . $menu_item["menu_link"] . "\">" . $menu_item["menu_title"] . "</a>";
  echo "</li>";
}

?>
            </ul>
          </div>

        </nav>

      </div>
    </div>
  </div>
</section>