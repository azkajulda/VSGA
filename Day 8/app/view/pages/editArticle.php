<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/ArticleController.php')?>
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('../../../assets/img/bg6.jpg');">
        </div>
        <div class="content-center">
            <div class="container">
                <h1 class="title">Edit Article</h1>
            </div>
        </div>
    </div>
    <div class="section section-basic" style="padding-top:50px;" id="basic-elements">
        <div class="container">
            <form action="" method="post">
            <div class="form-group">
                <label for="judul">Article Title</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $article['judul']?>">
            </div>
            <div class="form-group">
                <label for="isi">Article Content</label>
                <textarea class="form-control" id="isi" name="isi" rows="3"><?= $article['isi']?></textarea>
            </div>
            <button class="btn btn-success" name="edit" type="submit" value="<?= $article['id']?>"><i class="now-ui-icons design-2_ruler-pencil"></i> Update</button>
            </form>
        </div>
    </div>
<?php require_once('../layouts/footer.php')?>