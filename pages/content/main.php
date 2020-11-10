<?php

$about_us = get_block($conn, "about_us", LANG);

?>
<section class="main">
  <div class="container">
    <div class="row">
      <div class="col-md col-lg-7 p-5">
        <h2><?=$about_us["block_title"]?></h2>
        <div class="lk-block-text"><?=$about_us["block_text"]?></div>
      </div>
      <div class="col-md col-lg-5 p-5">
        <img src="<?php echo SITE . "public/img/site/" . $about_us["block_image_link"]; ?>.jpg" alt="<?=$about_us["block_image_alt_text"]?>" class="img-fluid">
      </div>
    </div>
  </div>
</section>
