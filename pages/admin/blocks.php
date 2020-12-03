<?php // var_dump($_POST); ?>
<section class="puppies">
  <div class="container">

    <div class="row">
      <div class="col">

        <div class="row">
          <div class="col">
            <h1>Приветствие</h1>
          </div>
        </div>

        <div class="row">
      
          <div class="col">
            <form method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="title">
              </div>
              <div class="form-group">
                <textarea name="mytext">
                  Welcome to TinyMCE!
                </textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <div class="col">
            img
          </div>

        </div>
      
      </div>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col">

        <h1>О сайте</h1>
        
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <textarea name="mytext">
              Welcome to TinyMCE!
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
      </div>
    </div>

    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col">

        <h1>Контакты</h1>
        
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <textarea name="mytext">
              Welcome to TinyMCE!
            </textarea>
          </div>

          <div class="form-group row">
            <label for="contact-text" class="col-sm-2 col-form-label">Contact text</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="contact-text">
            </div>
          </div>

          <div class="form-group row">
            <label for="contact-text-footer" class="col-sm-2 col-form-label">Contact text in the footer</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="contact-text-footer">
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
</section>
