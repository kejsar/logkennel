<?php

function reload_page($url="")
{
  $url = $url ? $url : $_SERVER['REQUEST_URI'];
  header ('Location: ' . $url);
  exit();
}
