
<section class="dog-add">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Добавить новую собачку</h1>

        <form action="<?=SITE?>admin/dogs" method="post" enctype="multipart/form-data">

          <input type="hidden" name="page" value="dogs">
          <input type="hidden" name="action" value="add">

          <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

              <div class="form-group">
                <div class="card">
                  <img src="<?=SITE?>public/img/site/dog.jpg" class="card-img-top" id="card-img-top">
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="img_alt" placeholder="Сео-текст для изображения" required>
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
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="name" placeholder="Имя" required>
                </div>
              </div>

              <div class="form-group row">

                <div class="col-5 col-xl-4">
                  <input type="date" class="form-control" name="birth">
                </div>

                <div class="col-3 col-xl-2 form-check">
                  <input class="form-check-input" type="checkbox" id="for-sale" name="for_sale">
                  <label class="form-check-label" for="for-sale">
                    For Sale
                  </label>
                </div>

                <div class="col-4 col-xl-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender_type" value="1" required>
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender_type" value="0" required>
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                </div>

              </div>

              <div class="form-group row">
                <div class="col">
                  <textarea name="info" placeholder="Описание"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</section>
