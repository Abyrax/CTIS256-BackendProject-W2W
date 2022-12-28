<?php
   require_once("./main.php");
   
    

   $control = $db->prepare('SELECT * FROM movies WHERE MovieId = ?');
    $control->execute([$_GET['id']]);
    $result = $control->fetchAll()[0];

    var_dump($_GET['id']);

    if(isset($_POST["save"])){

        $MovieName=$_POST["MovieName"];
        $Director=$_POST["Director"];
        $Date=$_POST["Date"];
        $Description=$_POST["Description"];
        $Rate=$_POST["Rate"];


        if($_FILES['image']['error'] == 0){
            $image = time().'_'.$_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_move = move_uploaded_file($image_tmp, './assets/img/'.$image);


            $update=$db->prepare("UPDATE movies SET MovieName=?,Director=?,Year=?,Description=?,Rate=?,Image=? WHERE MovieId=?");
            $update->execute([$MovieName,$Director,$Date,$Description,$Rate,$image,$_GET["id"]]);

            if($update){
                $control = $db->prepare('SELECT * FROM movies WHERE MovieId = ?');
                $control->execute([$_GET["id"]]);
                $result = $control->fetchAll()[0];
                $messages = '<div class="alert alert-success" role="alert">Update product completed successfully</div>';
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

<form method="POST" action="" enctype="multipart/form-data">
<div class="container   mt-4 mb-5">
<?php
            if(isset($messages)){
                echo $messages;
            }
        ?>
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
                    
                    <div class="col-md-6"><label class="labels">Movie Name</label><input type="text" class="form-control" value="<?= $result["MovieName"]?>" name="MovieName"></div>
                    <div class="col-md-6"><label class="labels">Director</label><input type="text" class="form-control"  value="<?= $result["Director"]?>" name="Director"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Year</label><input type="Date" class="form-control"  value="<?= $result["Year"]?>" name="Date"></div>
                    <div class="col-md-12"><label class="labels">Description</label><textarea name="Description" id="" cols="60" rows="10"><?= $result["Description"]?></textarea></div>
                    <div class="col-md-12"><label class="labels">Rate (?/10)</label><input type="number" class="form-control"  value="<?= $result["Rate"]?>" name="Rate"></div>
                    <?php if($userData["Type"]==0){
                        echo "<select class='form-select form-select-lg mb-3' aria-label='.form-select-lg example' name='UserType'>
                        <option selected>Select The User Type</option>
                        <option value='0'>Admin</option>
                        <option value='1'>Firm User</option>
                        <option value='2'>Movie Editor</option>
                        <option value='3'>Movie Lover</option>
                        </select>
                        ";
                    } ?>
                    
                </div>
                
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="save"> Add Movie </button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</form>
