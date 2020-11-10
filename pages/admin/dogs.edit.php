<?php

$dog = get_dog($conn, SUBSUBPAGE, LANG);

?>

<section class="puppies">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Редактировать собачку: <?=$dog["dog_name"]?></h1>

        <div class="row justify-content-center">
          <form class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6" action="<?php echo SITE; ?>admin/dog" method="post">

            <input type="hidden" name="dog" value="edit">
            
            <input type="hidden" name="dog_id" value="<?=$dog["id"]?>">

            <div class="form-group row">
              <label for="dog-name" class="col-sm-4 col-form-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="dog-name" name="dog_name" value="<?=$dog["dog_name"]?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="birth" class="col-sm-4 col-form-label">Birth date</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="birth" name="birth" value="<?=$dog["birth"]?>">
              </div>
              <div class="form-check col-sm-4">
                <input class="form-check-input" type="checkbox" id="puppy" name="puppy"<?php if ($dog["puppy"]) echo " checked"; ?>>
                <label class="form-check-label" for="puppy">
                  Щенок
                </label>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Gender</label>
              <div class="col-sm-8">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender_type" id="male" value="1"<?php if ($dog["gender_type"]) echo " checked"; ?>>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender_type" id="female" value="0"<?php if (!$dog["gender_type"]) echo " checked"; ?>>
                  <label class="form-check-label" for="female">Female</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="teeth" class="col-sm-4 col-form-label">Teeth</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="teeth" name="teeth" value="<?=$dog["teeth"]?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="patella" class="col-sm-4 col-form-label">Patella / PL</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="patella" name="patella" value="<?=$dog["patella"]?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="owner" class="col-sm-4 col-form-label">Breeder/Owner</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="owner" name="owner" value="<?=$dog["owner"]?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="after" class="col-sm-4 col-form-label">After</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="after" name="after" value="<?=$dog["after"]?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="under" class="col-sm-4 col-form-label">Under</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="under" name="under" value="<?=$dog["under"]?>">
              </div>
            </div>

<?php

$results = get_dog_results($conn, SUBSUBPAGE, LANG);

foreach ($results as $r) {
  echo "<div class=\"form-group row\">";
  echo "  <label class=\"col-sm-4 col-form-label\">results</label>";
  echo "  <div class=\"col-sm-8\">";
  echo "    <input type=\"text\" class=\"form-control\" name=\"results[]\" value=\"" . $r . "\">";
  echo "  </div>";
  echo "</div>";
}

?>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
        </div>

      </div>
    </div>
  </div>
</section>