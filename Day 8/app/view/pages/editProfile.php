<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/UserController.php')?>
<style>
    .navbar.navbar-transparent {
    background-color: #f96332 !important;
    box-shadow: none;
    color: #FFFFFF;
    padding-top: 20px !important;
}
</style>
    <div class="section section-signup" style="background-image: url('../../../assets/img/bg11.jpg'); background-size: cover; background-position: top center; height: 900px;">
        <div class="container">
          <div class="row">
            <div class="card card-signup" data-background-color="orange">
              <form class="form" method="post" action="" enctype="multipart/form-data"> 
                <div class="card-header text-center">
                    <h6 class="card-title title-up">Hi, <?= $_SESSION['nama']?></h6>
                    <h3 class="card-title title-up">Edit Profile</h3>
                </div>
                <div class="card-body">
                  <div class="input-group no-border">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                      </span>
                    </div>
                    <input type="text" required class="form-control" name="nama" placeholder="Nama" value="<?= $_SESSION['nama']?>">
                  </div>
                  <div class="input-group no-border">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons ui-1_email-85"></i>
                      </span>
                    </div>
                    <input type="email" required placeholder="Email" name="email" class="form-control" value="<?= $_SESSION['email']?>">
                  </div>
                  <div class="input-group no-border">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="now-ui-icons text_caps-small"></i>
                      </span>
                    </div>
                    <input type="number" required class="form-control" name="tlp" placeholder="Telepon" value="<?= $_SESSION['tlp']?>">
                  </div>
                  <div class="custom-file form-group">
                        <input required type="file" class="custom-file-input" id="customFile-foto" name="foto">
                        <label class="custom-file-label foto" for="customFile">Foto</label>
                    </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" name="editProfile" class="btn btn-neutral btn-round btn-lg">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
<?php require_once('../layouts/footer.php')?>