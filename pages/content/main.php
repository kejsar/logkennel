<?php

$greetings = get_block($conn, "greetings", LANG);

?>
<section class="main">
  <div class="container">
    <div class="row">
      <div class="col-md col-lg-7 mt-md-5 mb-4 p-lg-5">
        <h1 class="display-4 mb-5"><?=$greetings["title"]?></h1>
        <div class="lk-block-text"><?=$greetings["text"]?></div>
      </div>
      <div class="col-md col-lg-5 mt-md-5 mb-4 p-lg-5">
        <img src="<?php echo SITE . "public/img/blocks/" . $greetings["image"]["block_image_link"]; ?>.jpg" alt="<?=$greetings["image"]["block_image_alt_text"]?>" class="img-fluid">
      </div>
    </div>
  </div>
</section>
