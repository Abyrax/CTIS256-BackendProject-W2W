<?php


    require_once('./main.php');

    if(isset($_GET['search'])){
        $rs=$db->prepare("SELECT * FROM movies WHERE MovieName LIKE ?");
        $rs->execute(['%'.$_GET['search'].'%']);
        $movies=$rs->fetchAll();
    }else{
        $rs=$db->prepare("SELECT * FROM movies");
        $rs->execute();
        $movies=$rs->fetchAll();
    }


   
    var_dump($movies[0]["Image"]);
    
    





?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./assets/img/<?=$movies[0]["Image"] ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/<?=$movies[1]["Image"] ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./assets/img/<?=$movies[2]["Image"] ?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container mt-5">
    
    <div class="row">
    <?php foreach($movies as $movie): ?>
        <div class="card col-lg-3 col-md-4 col-sm-6 col-xs-12 p-2 mb-2">
                
                                <div class="card">
                                    <img class="card-img-top" src="./assets/img/<?= $movie["Image"]?>" alt="Card image cap" height="400px" width="200px">
                                    <div class="card-body">
                                    <h5 class="card-title"><?= $movie["MovieName"] ?></h5>
                                    <p class="card-text">Director: <?= $movie["Director"] ?></p>
                                    <p class="card-text">Description: <?= $movie["Description"] ?></p>
                                    <p class="card-text">Rate: <?= $movie["Rate"]?>/10</p>
                                    <p class="card-text"><small class="text-muted"><span> Date:</span> <?= $movie["Year"]?> </small></p>
                                    </div>
                                </div>
                       
                </div>
                <?php endforeach ?>
                
        </div>
    
</div>

