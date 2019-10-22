<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/UserController.php')?>
<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="post" action="">
              <div class="card-header text-center">
                <h1>Login</h1>
                <?php if(isset($_POST['login'])){?>
                <div class="alert alert-warning" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        </div>
                        <strong>Error!</strong> <?= $error?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </span>
                        </button>
                    </div>
                </div>
                <?php }?>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" name="login" class="btn btn-primary btn-round btn-lg btn-block">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require_once('../layouts/footer.php')?>