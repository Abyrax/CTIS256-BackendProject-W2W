<?php

    require_once("./main.php");

    if(isset($_POST["register"])){
        $Email=$_POST["Email"];
        $Name=$_POST["Name"];
        $Password=$_POST["Password"];
        $City=$_POST["City"];
        $Address=$_POST["Address"];
        $UserType=$_POST["UserType"];
        $District=$_POST["District"];
        $UserName=$_POST["UserName"];


        var_dump($Password);
        $Email=$_POST["Email"];
        $rs=$db->prepare("SELECT * FROM firmuser WHERE Email=?");
        $rs->execute([$Email]);
        $result=$rs->fetchAll();

        if(count($result)>0){
            $messages = '<div class="alert alert-danger" role="alert">Email already exist !</div>';
        }else if(count($result)<=0){

            

            $query=$db->prepare("INSERT INTO firmuser (Name,Email,Password,UserName,City,District,Address,Type) VALUES (?,?,?,?,?,?,?,?)");
            $query->execute([$Name,$Email,$Password,$UserName,$City,$District,$Address,$UserType]);
        }




    }





?>
<div class="container mt-5">
        <?php
            if(isset($messages)){
                echo $messages;
            }
        ?>
       <form method="POST" action="">
            <div class="row">
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">Name</span>
                    <input required name="Name" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1">
                    
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">UserName</span>
                    <input required name="UserName" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1">
                    
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">Email</span>
                    <input required name="Email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                    
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">Password</span>
                    <input required name="Password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">City</span>
                    <input required name="City" type="text" class="form-control" placeholder="City" aria-label="City" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text input-span" id="basic-addon1">District</span>
                    <input required name="District" type="text" class="form-control" placeholder="District" aria-label="District" aria-describedby="basic-addon1">
                    
                </div>

                <div class="input-group mb-3">
                
                 <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="UserType">
                <option selected>Select The User Type</option>
                <option value="0">Admin</option>
                <option value="1">Firm User</option>
                <option value="2">Movie Editor</option>
                <option value="3">Movie Lover</option>
                </select>
                

                </div>
                <div class="form-floating">
                    <textarea required name="Address" class="form-control" placeholder="Address" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Address</label>
                </div>
                
                <div class="mt-5 text-end">
                    <button type="submit" name='register' class="btn btn-success">Register</button>
                </div>
            </div>
       </form>
    </div>