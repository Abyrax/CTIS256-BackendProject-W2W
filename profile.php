<?php
require_once "main.php";




if(!isset($_SESSION['user'])){
    header("Location ./login.php");
    exit;
}


if(isset($_POST["update"])){

    


    $Selected=$db->prepare("SELECT * FROM firmuser WHERE Uid= ?");
    $Selected->execute([$_SESSION['user']['Uid']]);
    $SelectedResult=$Selected->fetchAll();

    if(isset($_POST["Password"])){
        $password=$_POST["Password"];
    }else{
        $password=$SelectedResult[0]["Password"];
    }

    $Name=$_POST["Name"];
    $City=$_POST["City"];
    $Address=$_POST["Address"];
    $District=$_POST["District"];

    $updated=$db->prepare("UPDATE firmuser SET Name= ?,Password = ?, City= ?, Address= ?, District = ? WHERE Uid = ? ");
    $updated->execute([$Name,$password,$City,$Address,$District,$_SESSION['user']['Uid']]);

    if($updated){
        $control=$db->prepare("SELECT * FROM firmuser WHERE Uid = ?");
        $control->execute([$_SESSION['user']['Uid']]);
        $result = $control->fetchAll();
        $_SESSION['user']=$result[0];
        $messages = '<div class="alert alert-success" role="alert">Profile update successful !</div>';
    }else{
        $messages = '<div class="alert alert-danger" role="alert">
        Error occurred while updating profile !</div>';
    }
}











?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="./assets/img/avatar.ico" class="avatar img-circle" alt="avatar">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert"></a> 
          <i class="fa fa-coffee"></i>
         
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method="post" >
          <div class="form-group">
            <label class="col-lg-3 control-label">Name: </label>
            <div class="col-lg-8">
              <input class="form-control" type="text"  name="Name" value="<?=$_SESSION['user']["Name"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password"  name="Password" value="<?=$_SESSION['user']["Password"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">City:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="City" value="<?=$_SESSION['user']["City"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Address" value="<?=$_SESSION['user']["Address"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">District:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="District" value="<?=$_SESSION['user']["District"] ?>">
            </div>
          </div>
              <input type="submit" class="btn btn-primary" value="Save Changes" name="update">
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>

