<?php

    require_once "main.php";


    if($userData["Type"]==0){
        $MovieList=$db->prepare("SELECT * FROM movies");
        $MovieList->execute();
        $Movies=$MovieList->fetchAll();

    }else{
        $MovieList=$db->prepare("SELECT * FROM movies WHERE Owner LIKE ?");
       
        
        $MovieList->execute(['%'.$userData["Name"].'%']);
        $Movies=$MovieList->fetchAll();

    }

    if(isset($_GET["id"])){



        $rs=$db->prepare("UPDATE movies SET status=1 WHERE MovieId=?");
        $rs->execute([$_GET["id"]]);
        
    }
   







?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
<script>

</script>
</head>
<body>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i><a href="movieAdd.php">Add New</a> </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MovieName</th>
                        <th>Director</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($Movies as $movie): ?>
                    <tr>
                        <td><?=  $movie["MovieName"]?></td>
                        <td><?=  $movie["Director"]?></td>
                        <td><?=  $movie["Rate"]?>/10</td>
                        <td><?=  $movie["Year"]?></td>
                        <?php if($movie["Status"]==0){
                            echo "<td>Waiting</td>";
                        }else{
                            echo "<td>Accepted</td>"; 
                        } ?>
                        <td>
                            <a class="add" title="Add"  ><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit"  href="MovieEdit.php?id=<?=$movie["MovieId"] ?>"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete"  href="MovieDelete.php?id=<?= $movie["MovieId"]?>"><i class="material-icons">&#xE872;</i></a>
                            <?php if($userData["Type"]==0&&$movie["Status"]==0){

                             ?>
                            <a title="Accept"  href="MovieList.php?id=<?=$movie["MovieId"] ?>"><i class="material-icons">&#10003;</i></a>
                            <?php } ?>
                        </td>

                    </tr>
                    <?php endforeach ?>      
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>