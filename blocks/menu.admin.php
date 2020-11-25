
<section id="admin-menu">
  <div class="container">
    <div class="row">
      <div class="col">
      
        <nav class="navbar navbar-expand-md navbar-light bg-light">

          <a class="navbar-brand" href="#">Личный кабинет:</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#admin-navbar-content" aria-controls="admin-navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="admin-navbar-content">

            <ul class="navbar-nav mr-auto">
<?php

$admin_menu = get_admin_menu($conn, LANG);

foreach($admin_menu as $admin_menu_item) {

  if ($admin_menu_item["admin_menu_link"] === "main") {
    $admin_menu_item["admin_menu_link"] = "";
  }

  $active = "";

  if ((PAGE === $admin_menu_item["admin_menu_link"]) || (PAGE === "admin" && $admin_menu_item["admin_menu_link"] === "")) {
    $active = " active";
  }

  echo "<li class=\"nav-item\">";
  echo "  <a class=\"btn btn-outline-success mx-2" . $active . "\" href=\"" . SITE . "admin/" . $admin_menu_item["admin_menu_link"] . "\">" . $admin_menu_item["admin_menu_title"] . "</a>";
  echo "</li>";
  
}

?>
            </ul>

            <form class="form-inline my-2 my-lg-0" method="post">
              <input type="hidden" name="logout" value="true">
              <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Выйти</button>
            </form>

          </div>

        </nav>

      </div>
    </div>
  </div>
</section>
