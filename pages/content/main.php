<?php

$greetings = get_block($conn, "greetings", LANG);

?>
<section class="main">
  <div class="container">
    <div class="row">
      <div class="col-md col-lg-7 p-5">
        <h2><?=$greetings["title"]?></h2>
        <div class="lk-block-text"><?=$greetings["text"]?></div>
      </div>
      <div class="col-md col-lg-5 p-5">
        <img src="<?php echo SITE . "public/img/blocks/" . $greetings["image"]["block_image_link"]; ?>.jpg" alt="<?=$greetings["image"]["block_image_alt_text"]?>" class="img-fluid">
      </div>
    </div>
  </div>
</section>
