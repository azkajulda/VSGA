<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/UserController.php')?>
    <div class="page-header clear-filter page-header-small" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('../../../assets/img/bg5.jpg');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img class="rounded-circle img-raised spin" width="200" height="200" src="<?= $_SESSION['foto']?>" alt="Foto">
        </div>
        <h3 class="title"><?= $_SESSION['nama']?></h3>
        <p class="category"><?= $_SESSION['email']?></p>
        <p class="category">Telepon : <?= $_SESSION['tlp']?></p>
        <a href="editProfile.php?email=<?= $_SESSION['email']?>"><button type="submit" class="btn btn-primary" name="editProfile"><i class="now-ui-icons design-2_ruler-pencil spin"></i> Edit</button></a>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">
          <a href="#button" class="btn btn-primary btn-round btn-lg">Follow</a>
          <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Instagram">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
        <?php if($conn){
            $selectKategori = "SELECT * FROM tb_statis";
            $dataKategori = mysqli_query($conn, $selectKategori);
            foreach ($dataKategori as $data) {?>
            <h3 class="title"><?= $data['title']?></h3>
            <h5 class="description"><?= $data['content']?></h5>
        <?php }}else{ echo "Database Error";}?>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <h4 class="title text-center">My Portfolio</h4>
            <div class="nav-align-center">
              <ul class="nav nav-pills nav-pills-primary nav-pills-just-icons" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                    <i class="now-ui-icons design_image"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                    <i class="now-ui-icons location_world"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                    <i class="now-ui-icons sport_user-run"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content gallery">
            <div class="tab-pane active" id="home" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg1.jpg" alt="" class="img-raised">
                    <img src="../../../assets/img/bg3.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg8.jpg" alt="" class="img-raised">
                    <img src="../../../assets/img/bg7.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg6.jpg" class="img-raised">
                    <img src="../../../assets/img/bg11.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../../../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg3.jpg" alt="" class="img-raised">
                    <img src="../../../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../../../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../../../assets/img/bg6.jpg" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../../assets/js/core/jquery.min.js" type="text/javascript"></script>
<?php require_once('../layouts/footer.php')?>