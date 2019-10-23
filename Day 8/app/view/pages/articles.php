<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/ArticleController.php')?>
<style>
    .pading-100{
        padding:100px;
    }
    .jumbotron{
        padding: 0rem 2rem;
    }
    .mb-10{
        margin-bottom:10px;
    }
</style>
<div class="page-header page-header-small">
    <div class="page-header-image" data-parallax="true" style="background-image: url('../../../assets/img/bg6.jpg');">
        <div class="content-center">
            <div class="container">
                <h1 class="title">Articles.</h1>
            </div>
        </div>
    </div>
</div>

<div class="section section-tabs pading-100">
    <div class="row">
    <div class="col-md-10 ml-auto col-xl-9 mr-auto">
        <p class="category">Semua Artikel</p>
        <!-- Nav tabs -->
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <?php if($conn){
                        $selectArticle = "SELECT * FROM tb_post";
                        $dataArticle = mysqli_query($conn, $selectArticle);
                        foreach ($dataArticle as $data) {?>
                            <div class="jumbotron">
                                <img src="../../../assets/<?= $data['gambar']?>" alt="article" srcset="" class="mb-10">
                                <h3><?= $data['title']?></h3>
                                <p class="lead"><?php echo substr($data['content'], 0, 100) . '...';?></p>
                                <hr class="my-4">
                                <p>
                                    <span>
                                        <?php echo "Created at : ".date('d F Y', strtotime($data['date']));?>
                                    </span>
                                    <span style="color:red; margin-left:20px;">
                                        <?php echo "Tag : ".$data['tag'];?>
                                    </span>
                                </p>
                            </div>
                    <?php }}else{}?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 ml-auto col-xl-3 mr-auto">
        <p class="category">Artikel Terbaru</p>
        <!-- Tabs with Background on Card -->
        <div class="card">
        <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content text-center">
            <div class="tab-pane active" id="home1" role="tabpanel">
                <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
            </div>
            <div class="tab-pane" id="profile1" role="tabpanel">
                <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
            </div>
            <div class="tab-pane" id="messages1" role="tabpanel">
                <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
            </div>
            <div class="tab-pane" id="settings1" role="tabpanel">
                <p>
                "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                </p>
            </div>
            </div>
        </div>
        </div>
        <!-- End Tabs on plain Card -->

        <p class="category">Komentar Terbaru</p>
        <!-- Tabs with Background on Card -->
        <div class="card">
        <div class="card-body">
            <!-- Tab panes -->
            <div class="tab-content text-center">
            <div class="tab-pane active" id="home1" role="tabpanel">
                <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
            </div>
            <div class="tab-pane" id="profile1" role="tabpanel">
                <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
            </div>
            <div class="tab-pane" id="messages1" role="tabpanel">
                <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
            </div>
            <div class="tab-pane" id="settings1" role="tabpanel">
                <p>
                "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<?php require_once('../layouts/footer.php')?>