<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/ArticleController.php')?>
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('../../../assets/img/bg6.jpg');">
            <div class="content-center">
                <div class="container">
                    <h1 class="title">Articles.</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-basic" id="basic-elements">
        <div class="container">
            <form action="" method="post">
            <div class="form-group">
                <label for="judul">Article Title</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="isi">Article Content</label>
                <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
            </div>
            </form>
        </div>
    </div>
<?php require_once('../layouts/footer.php')?>