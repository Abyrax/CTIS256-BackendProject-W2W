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


   

    
    





?>

<div class="row">

</div>
<div class="card-group">
            <?php foreach($movies as $movie): ?>
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
        <?php endforeach ?>
</div>