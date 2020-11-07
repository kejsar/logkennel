<?php

// SET LANG

define("LANG", 1);

// SET SITE

function set_site()
{
  $site = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
  define("SITE", $site);
}

// SET PATH

function get_path()
{
  $raw_path = explode("/", $_SERVER["REQUEST_URI"]);
  $path = array();
  $i = 0;
  foreach($raw_path as $v) {
    if ($v) $path[$i++] = $v;
  }
  return $path;
}

function page_exists($conn, $page)
{
  $menu_links = get_menu_links($conn);
  return in_array($page, $menu_links);
}

function return_404()
{
  http_response_code(404);
  // include("my_404.php");
  die();
}

function set_path($conn)
{
  $path = get_path();

  if (count($path) === 0) {
    define("PAGE", "main");
  } elseif (
       (count($path) === 1 || count($path) === 2) 
    && (page_exists($conn, $path[0]) || $path[0] === "admin")
  ) {
    if (count($path) === 1) {
      define("PAGE", $path[0]);
    } else {
      define("SECTION", $path[0]);
      define("PAGE", $path[1]);
    }
  } else {
    return_404();
  }
}

set_site();
set_path($conn);
