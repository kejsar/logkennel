<?php

// ADD NEW DOG ================================================================

if (   isset($_POST["dog_name"])
    && isset($_POST["birth"])
    && isset($_POST["gender_type"])
    && isset($_POST["teeth"])
    && isset($_POST["patella"])
    && isset($_POST["owner"])
    && isset($_POST["after"])
    && isset($_POST["under"])
    && isset($_POST["results"])
) {

  $dog_name    = $_POST["dog_name"];
  $birth       = $_POST["birth"];
  $puppy       = isset($_POST["puppy"]) && $_POST["puppy"] === "on" ? 1 : 0;
  $gender_type = $_POST["gender_type"];
  $teeth       = $_POST["teeth"];
  $patella     = $_POST["patella"];
  $owner       = $_POST["owner"];
  $after       = $_POST["after"];
  $under       = $_POST["under"];
  $results     = $_POST["results"];

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

// SHOW DOG LIST ==============================================================

$search_type = defined("SUBPAGE") ? SUBPAGE : "all";

$dogs = get_dogs($conn, $search_type, LANG);

foreach ($dogs as $k => $dog) {
  $dogs[$k]["results"] = get_dog_results($conn, $dog["id"], LANG);
}

?>

<section class="puppies">
  <div class="container">
    <div class="row">
      <div class="col">

<?php if ($dog_added): ?>
        <div class="alert alert-success" role="alert">
          Собакен <b><?=$dog_name?></b> успешно добавлен!
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
  echo "</tr>";
}

?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>
