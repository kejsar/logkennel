<nav>
<?php

$menu = get_menu($conn, LANG);

foreach($menu as $menu_item) {
  $active = $page === $menu_item["link"] ? " class=\"active\"" : "";
  echo "<a href=\"" . $menu_item["link"] . "\"" . $active . ">" . $menu_item["menu_title"] . "</a>";
}

?>
</nav>