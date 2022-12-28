<?php

require_once "main.php";

if(isset($_POST["save"])){


    $MovieName=$_POST['MovieName'];
    $Director=$_POST['Director'];
    $Rate=$_POST['Rate'];
    $Date=$_POST['Date'];
    $Description=$_POST['Description'];
    $Created=date("Y-m-d");

    

    
    if($_FILES['image']['error'] == 0){
        $image = time().'_'.$_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_move = move_uploaded_file($image_tmp, './assets/img/'.$image);

        if($image_move){

            
            if($Rate>0 && $Rate<=10){
                $insert=$db->prepare("INSERT INTO movies (MovieName,Director,Year,Rate,Image,Description,Current,Owner,Status) values (?,?,?,?,?,?,?,?,?)");
               
                $insert->execute([$MovieName,$Director,$Date,$Rate,$image,$Description,$Created,$userData["Name"],0]);
                
            }else{
                
            }
        
            if($insert){
                echo "<div class='alert alert-success' role='alert'>Film Başarıyla eklendi</div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Film eklenemedi!!!
              </div>";
            }
        
        }

        
    }

   
    



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="styleBackground.css">

    <title>Document</title>
</head>
<body>

<form action="?" method="post" enctype="multipart/form-data">
<div class="container   mt-4 mb-5">
    <div class="row">
        <div class="col-md-3">
            
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" height="130px" width="140px" src="./assets/img/istockphoto-1202770121-612x612.jpg" height="130px"></div>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><input type="file" name="image"></div>
        </div>
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Adding Movie</h4>
                </div>
                <div class="row mt-2">
                    
                    <div class="col-md-6"><label class="labels">Movie Name</label><input type="text" class="form-control" value="" name="MovieName"></div>
                    <div class="col-md-6"><label class="labels">Director</label><input type="text" class="form-control"  value="" name="Director"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Year</label><input type="Date" class="form-control"  value="" name="Date"></div>
                    <div class="col-md-12"><label class="labels">Description</label><textarea name="Description" id="" cols="60" rows="10"></textarea></div>
                    <div class="col-md-12"><label class="labels">Rate (?/10)</label><input type="number" class="form-control"  value="" name="Rate"></div>
                    
                </div>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="save">Add Movie</button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</form>
