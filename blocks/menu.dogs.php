
<section id="dogs-menu">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6">
      
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #fff;">

          <a class="navbar-brand d-block d-md-none" href="#">Собачки</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dogs-navbar-content" aria-controls="dogs-navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="dogs-navbar-content">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link<?php if (defined("SUBPAGE") && SUBPAGE === "all") echo " active"; ?>" href="<?php echo SITE; ?>admin/dogs/all">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if (defined("SUBPAGE") && SUBPAGE === "males") echo " active"; ?>" href="<?php echo SITE; ?>admin/dogs/males">Males</a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if (defined("SUBPAGE") && SUBPAGE === "females") echo " active"; ?>" href="<?php echo SITE; ?>admin/dogs/females">Females</a>
              </li>
              <li class="nav-item">
                <a class="nav-link<?php if (defined("SUBPAGE") && SUBPAGE === "for-sale") echo " active"; ?>" href="<?php echo SITE; ?>admin/dogs/for-sale">For Sale</a>
              </li>
            </ul>
            <div class="my-2 my-lg-0">
              <a class="btn btn-outline-success" href="<?php echo SITE; ?>admin/dogs/add" role="button">Добавить</a>
            </div>
          </div>

        </nav>

      </div>
    </div>
  </div>
</section>
