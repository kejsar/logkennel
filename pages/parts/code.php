<?php

function get_site()
{
  return (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
}
define("SITE", get_site());

$raw_path = explode("/", $_SERVER["REQUEST_URI"]);
$path = array();
$i = 0;
foreach($raw_path as $v) {
  if ($v) $path[$i++] = $v;
}

if (count($path) > 1) {
  define("SECTION", $path[0]);
  define("PAGE", $path[1]);
} elseif (count($path) === 1) {
  define("PAGE", $path[0]);
} else {
  define("PAGE", "main");
}

unset($raw_path, $path, $i, $v);
