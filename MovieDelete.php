<?php

    require "db.php";


    $id=$_GET["id"];

    $rs=$db->prepare("DELETE FROM movies where MovieId = ? ");
    $rs->execute([$id]);



    header("Location: MovieList.php");

?>