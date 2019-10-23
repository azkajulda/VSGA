<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/UserController.php')?>
<?php require_once('../../controller/ArticleController.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../../assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../../assets/demo/demo.css" rel="stylesheet" />
  <link href="../../../assets/css/azka.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="landing-page.php" rel="tooltip" title="Hi, Welcome" data-placement="bottom" target="_self">
          Azka's Article
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../../../assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="landing-page.php" onclick="scrollToDownload()">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                <i class="now-ui-icons education_paper"></i>
                <p>Article</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <form action="articles.php" method="get">
              <?php if($conn){
                    $selectKategori = "SELECT * FROM tb_kategori";
                    $dataKategori = mysqli_query($conn, $selectKategori);
                    foreach ($dataKategori as $data) {?>
                    <button type="submit" name="id_kategori" value="<?= $data['id_kategori']?>" class="dropdown-item">
                      <?= $data['name']?>
                    </button>
              <?php }}else{ echo "Database Error";}?>
              </form>
            </div>
          </li>
          <?php if (isset($_SESSION['nama'])){?>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                <i class="now-ui-icons business_chart-bar-32"></i>
                <p>Dashboard</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a href="dashboardKategori.php" class="dropdown-item">
                Kelola Kategori
              </a>
              <a href="dashboardPost.php" class="dropdown-item">
                Kelola Post
              </a>
              <a href="dashboardStatis.php" class="dropdown-item">
                Kelola Statis
              </a>
              <a href="dashboardKomentar.php" class="dropdown-item">
                Kelola Komentar
              </a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                <img width="25" height="25" src="<?= $_SESSION['foto']?>" alt="Thumbnail Image" class="rounded-circle img-raised">
                <p><?= $_SESSION['nama']?></p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="profile.php">
                <i class="now-ui-icons users_circle-08"></i> My Profile
              </a>
              <form action="" method="get">
              <button type="submit" name="logout" class="dropdown-item">
                <i class="now-ui-icons sport_user-run"></i> Logout
              </button>
              </form>
              <!-- <a class="dropdown-item" target="_blank" href="https://demos.creative-tim.com/now-ui-kit/docs/1.0/getting-started/introduction.html">
                <i class="now-ui-icons design_bullet-list-67"></i> Documentation
              </a> -->
            </div>
          </li>
          <?php }else{?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <i class="now-ui-icons objects_spaceship"></i>
              <p>Login</p>
            </a>
          </li>
          <?php }?>
          <!-- <li class="nav-item">
            <a class="nav-link btn btn-neutral" href="https://www.creative-tim.com/product/now-ui-kit-pro" target="_blank">
              <i class="now-ui-icons arrows-1_share-66"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_self">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_self">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_self">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">