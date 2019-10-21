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
        <?php if($conn){
            $selectArticle = "SELECT * FROM articles";
            $dataArticle = mysqli_query($conn, $selectArticle);
            foreach ($dataArticle as $data) {?>
        <div class="jumbotron">
            <h1 class="display-4"><?= $data['judul']?></h1>
            <p class="lead"><?= $data['isi']?></p>
            <hr class="my-4">
            <p>Action for edit and delete a exist article</p>
            
            <form action="" method="get">
                <button type="submit" class="btn btn-primary" name="edit" value="<?=$data['id']?>"><i class="now-ui-icons design-2_ruler-pencil"></i> Edit</button>
                <button type="submit" class="btn btn-danger" name="delete" value="<?=$data['id']?>"><i class="now-ui-icons ui-1_simple-delete"></i> Delete</button>
            </form>
        </div>
        <?php }}else{}?>
    </div>
</div>
<?php require_once('../layouts/footer.php')?>