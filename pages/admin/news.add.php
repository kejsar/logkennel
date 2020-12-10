
<section class="news-add">
  <div class="container">
    <div class="row">
      <div class="col">

        <h1>Добавить новость</h1>

        <form action="<?=SITE?>admin/news" method="post" enctype="multipart/form-data">

          <input type="hidden" name="page" value="news">
          <input type="hidden" name="action" value="add">

          <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">

              <div class="form-group">
                <div class="card">
                  <img src="<?=SITE?>public/img/site/news.jpg" class="card-img-top" id="card-img-top">
                </div>
              </div>
            
              <div class="form-group row">
                <div class="col">
                  <input type="text" class="form-control" name="news_img_alt" placeholder="Сео-текст для изображения">
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
                  <input type="text" class="form-control" name="news_title" placeholder="Заголовок">
                </div>
              </div>

              <div class="form-group row">
                <div class="col">
                  <textarea name="news_text" placeholder="Текст новости"></textarea>
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
