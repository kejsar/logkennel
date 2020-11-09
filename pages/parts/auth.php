<?php

if (isset($_POST["logout"]) && $_POST["logout"] === "true") {
  unset($_COOKIE['login']); 
  setcookie('login', null, -1, '/');
  define("AUTH", false);
} elseif (isset($_COOKIE["login"]) && $_COOKIE["login"] === "admin") {
  define("AUTH", true);
} elseif (   (isset($_POST["login"]) && isset($_POST["password"]))
          && ($_POST["login"] === "admin" && $_POST["password"] === "123456")
) {
  $cookie_name = "login";
  $cookie_value = "admin";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  define("AUTH", true);
} else {
  define("AUTH", false);
}
