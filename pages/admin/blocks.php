
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

                        <input type="hidden" name="old_image" value="<?=$dog_main_image["dog_image_link"]?>">

                        <div class="form-group">
                          <div class="card">
                            <img src="<?=$img_url?>" alt="<?=$dog_main_image["dog_image_alt_text"]?>" class="card-img-top" id="card-img-top">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col">
                            <input type="text" class="form-control" name="img_alt" value="<?=$dog_main_image["dog_image_alt_text"]?>" required>
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
                          <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                          <textarea name="mytext">
                            Welcome to TinyMCE!
                          </textarea>
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
                    <textarea name="mytext">
                      Welcome to TinyMCE!
                    </textarea>
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

                  <div class="form-group row">
                    <label for="contact-text" class="col-sm-2 col-form-label">Contact text</label>
                    <div class="col-sm-10">
                      <textarea name="contact-text" id="contact-text">
                        Welcome to TinyMCE!
                      </textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-text-footer" class="col-sm-2 col-form-label">Contact text in the footer</label>
                    <div class="col-sm-10">
                      <textarea name="contact-text-footer" id="contact-text-footer">
                        Welcome to TinyMCE!
                      </textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="contact-email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact-phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact-phone">
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
