<?php

$blocks = get_blocks($conn, LANG);
$img_url = SITE . "public/img/blocks/thumbs/" . $blocks["greetings"]["image"]["block_image_link"] . ".jpg";
// var_dump($blocks);
// exit;
?>

<section class="blocks">
  <div class="container">

    <div class="row">
      <div class="col">

        <div class="accordion" id="accordionKennel">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Приветствие
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionKennel">
              <div class="card-body">

                <form method="post">
                  <div class="row">

                      <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

                        <input type="hidden" name="old_image" value="<?=$blocks["greetings"]["image"]["block_image_link"]?>">

                        <div class="form-group">
                          <div class="card">
                            <img src="<?=$img_url?>" alt="<?=$blocks["greetings"]["image"]["block_image_alt_text"]?>" class="card-img-top" id="card-img-top">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col">
                            <input type="text" class="form-control" name="img_alt" value="<?=$blocks["greetings"]["image"]["block_image_alt_text"]?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="imageinput" id="imageinput">
                              <label for="imageinput" class="custom-file-label">
                                Choose file
                              </label>
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                        <div class="form-group">
                          <input type="text" class="form-control" name="greetings_title" value="<?=$blocks["greetings"]["title"]?>">
                        </div>
                        <div class="form-group">
                          <textarea name="greetings_text"><?=$blocks["greetings"]["text"]?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                  </div>
                </form>
              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  О сайте в футере
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionKennel">
              <div class="card-body">

                <form method="post">
                  
                  <div class="form-group">
                    <textarea name="footer_text"><?=$blocks["footer_text"]["text"]?></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

                </form>
              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Контакты
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionKennel">
              <div class="card-body">

                <form method="post">

                  <div class="form-group">
                    <textarea name="contacts_text"><?=$blocks["contacts_text"]["text"]?></textarea>
                  </div>

                  <div class="form-group row">
                    <label for="contact-phone" class="col-sm-2 col-form-label">phone</label>
                    <div class="col-sm-10">
                      <input type="phone" class="form-control" id="contact-phone" name="contact_phone" value="<?=$settings["phone"]["text"]?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-email" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="contact-email" name="contact_email" value="<?=$settings["email"]["text"]?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-facebook" class="col-sm-2 col-form-label">facebook</label>
                    <div class="col-sm-10">
                      <input type="facebook" class="form-control" id="contact-facebook" name="contact_facebook" value="<?=$settings["facebook"]["text"]?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-instagram" class="col-sm-2 col-form-label">instagram</label>
                    <div class="col-sm-10">
                      <input type="instagram" class="form-control" id="contact-instagram" name="contact_instagram" value="<?=$settings["instagram"]["text"]?>">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>

                </form>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
