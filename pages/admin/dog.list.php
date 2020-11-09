<?php

// ADD NEW DOG ================================================================

if (isset($_POST["dog"]) && $_POST["dog"] === "add") {

  $dog_name    = isset($_POST["dog_name"]) ? $_POST["dog_name"] : "";
  $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
  $puppy       = isset($_POST["puppy"]) && $_POST["puppy"] === "on" ? 1 : 0;
  $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
  $teeth       = isset($_POST["teeth"]) ? $_POST["teeth"] : "";
  $patella     = isset($_POST["patella"]) ? $_POST["patella"] : "";
  $owner       = isset($_POST["owner"]) ? $_POST["owner"] : "";
  $after       = isset($_POST["after"]) ? $_POST["after"] : "";
  $under       = isset($_POST["under"]) ? $_POST["under"] : "";
  $results     = isset($_POST["results"]) ? $_POST["results"] : "";

  $link = "image.jpg";
  $alt = "alt image text";
  $main = "1";

  $dog_id = add_dog($conn, $birth, $teeth, $patella, $owner, $after, $under, $gender_type, $puppy);
  $raw_dog_info_added = $dog_id ? true : false;
  if ($raw_dog_info_added) {
    $dog_name_added = add_dog_name($conn, $dog_id, $dog_name, LANG);
    $dog_image_added = add_dog_image($conn, $dog_id, $link, $alt, $main);
  }  
  $dog_results_added = true;
  foreach ($results as $result_text) {
    $added = add_dog_result($conn, $dog_id, $result_text, LANG);
    if (!$added) {
      $dog_results_added = false;
    }
  }

  if (   $raw_dog_info_added
      && $dog_name_added
      && $dog_image_added
      && $dog_results_added
  ) {
    $dog_added = true;
  } else {
    $dog_added = false;
  }
}

// EDIT CURRENT DOG ===========================================================

if (isset($_POST["dog"]) && $_POST["dog"] === "edit") {

  $dog_id      = $_POST["dog_id"];
  $dog_name    = isset($_POST["dog_name"]) ? $_POST["dog_name"] : "";
  $birth       = isset($_POST["birth"]) ? $_POST["birth"] : "";
  $puppy       = isset($_POST["puppy"]) && $_POST["puppy"] === "on" ? 1 : 0;
  $gender_type = isset($_POST["gender_type"]) ? $_POST["gender_type"] : "";
  $teeth       = isset($_POST["teeth"]) ? $_POST["teeth"] : "";
  $patella     = isset($_POST["patella"]) ? $_POST["patella"] : "";
  $owner       = isset($_POST["owner"]) ? $_POST["owner"] : "";
  $after       = isset($_POST["after"]) ? $_POST["after"] : "";
  $under       = isset($_POST["under"]) ? $_POST["under"] : "";
  $results     = isset($_POST["results"]) ? $_POST["results"] : "";
  var_dump($results);

  $link = "image.jpg";
  $alt = "alt image text";
  $main = "1";

  $dog_updated = update_dog($conn, $birth, $puppy, $teeth, $patella, $owner, $after, $under, $gender_type, $dog_id);
  $raw_dog_info_updated = $dog_updated ? true : false;
  if ($raw_dog_info_updated) {
    $dog_name_updated = update_dog_name($conn, $dog_id, $dog_name, LANG);
    $dog_image_updated = update_dog_image($conn, $dog_id, $link, $alt, $main);
  }  
  $dog_results_updated = true;
  foreach ($results as $result_text) {
    if ($result_text !== "") {
      $updated = update_dog_result($conn, $dog_id, $result_text, LANG);
      if (!$updated) {
        $dog_results_updated = false;
      }
    }
  }

  if (   $raw_dog_info_updated
      && $dog_name_updated
      && $dog_image_updated
      && $dog_results_updated
  ) {
    $dog_updated = true;
  } else {
    $dog_updated = false;
  }
}

// SHOW DOG LIST ==============================================================

$search_type = defined("SUBPAGE") ? SUBPAGE : "all";

$dogs = get_dogs($conn, $search_type, LANG);

foreach ($dogs as $k => $dog) {
  $dogs[$k]["results"] = get_dog_results($conn, $dog["id"], LANG);
}

?>

<section class="puppies">
  <div class="container-fluid">
    <div class="row">
      <div class="col">

<?php if (isset($dog_added) && $dog_added): ?>
        <div class="alert alert-success" role="alert">
          Собакен <b><?=$dog_name?></b> успешно добавлен!
        </div>
<?php endif; ?>

<?php if (isset($dog_updated) && $dog_updated): ?>
        <div class="alert alert-success" role="alert">
          Собакен <b><?=$dog_name?></b> успешно обновлен!
        </div>
<?php endif; ?>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Birth date</th>
              <th scope="col">Puppy</th>
              <th scope="col">Gender</th>
              <th scope="col">Teeth</th>
              <th scope="col">Patella / PL</th>
              <th scope="col">Breeder/Owner</th>
              <th scope="col">After</th>
              <th scope="col">Under</th>
              <th scope="col">Results</th>
              <th scope="col" colspan="2">Edit</th>
            </tr>
          </thead>
          <tbody>
<?php

foreach ($dogs as $dog) {
  $puppy_icon = $dog["puppy"] ? "yes!" : "";
  echo "<tr>";
  echo "<th scope=\"row\">" . $dog["id"] . "</th>";
  echo "<td><a href=\"" . $dog["link"] . "\" alt=\"" . $dog["alt"] . "\" /></td>";
  echo "<td>" . $dog["dog_name"] . "</td>";
  echo "<td>" . $dog["birth"] . "</td>";
  echo "<td>" . $puppy_icon . "</td>";
  echo "<td>" . $dog["gender"] . "</td>";
  echo "<td>" . $dog["teeth"] . "</td>";
  echo "<td>" . $dog["patella"] . "</td>";
  echo "<td>" . $dog["owner"] . "</td>";
  echo "<td>" . $dog["after"] . "</td>";
  echo "<td>" . $dog["under"] . "</td>";
  echo "<td>";
  foreach ($dog["results"] as $result) {
    echo $result . "</br>";
  }
  echo "</td>";
  echo "<td><a class=\"btn btn-outline-primary\" href=\"" . SITE . "admin/dog/edit/" . $dog["id"] . "\" role=\"button\"><i class=\"far fa-edit\"></i></a></td>";
  echo "<td><button type=\"button\" class=\"btn btn-outline-danger\"><i class=\"fas fa-times\"></i></button></td>";
  echo "</tr>";
}

?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
