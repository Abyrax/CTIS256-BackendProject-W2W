
<?php
    require_once ("./main.php");

    $control = $db->prepare('SELECT * FROM firmuser WHERE Uid = ?');
    $control->execute([$_GET['id']]);
    $control_result = $control->fetchAll()[0];
if(isset($_POST['update'])){
    
    

    if(isset($_POST['Password']) && $_POST['Password'] != ''){
        $password = md5($_POST['Password']);
    }else {
        $password = $control_result['Password'];
    }

    $Name = $_POST['Name'];
    $City = $_POST['City'];
    $Address = $_POST['Address'];
    $District = $_POST['District'];
    $Email=$_POST["Email"];
    $password=$_POST["Password"];

    
    $insert = $db->prepare('UPDATE firmuser SET Name = ?,Email=?, Password = ?, City = ?, Address = ?, District = ? WHERE Uid = ?');
    $insert->execute([$Name, $Email, $password,$City, $Address, $District ,$control_result['Uid']]);
    if($insert){
        $control = $db->prepare('SELECT * FROM firmUser WHERE Uid = ?');
        $control->execute([$control_result['Uid']]);
        $control_result = $control->fetchAll();
        $control_result = $control_result[0];
        $messages = '<div class="alert alert-success" role="alert">Profile update successful !</div>';
    }else{
        $messages = '<div class="alert alert-danger" role="alert">
        Error occurred while updating profile !</div>';
    }

}
?>

 <div class="container mt-5">
        <div class="row">
            <?php
                if(isset($messages)){
                    echo $messages;
                }
            ?>
            <form method="POST" action="">
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text input-span" id="basic-addon1">Full Name</span>
                        <input required name="Name" type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon1" value="<?=$control_result['Name']?>">
                        
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text input-span" id="basic-addon1">Email</span>
                        <input required readonly name="Email" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?=$control_result['Email']?>">
                        
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text input-span" id="basic-addon1">Password</span>
                        <input name="Password" type='password'  autocomplete="off" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text input-span" id="basic-addon1">City</span>
                        <input required name="City" type="text" class="form-control" placeholder="City" aria-label="City" aria-describedby="basic-addon1" value="<?=$control_result['City']?>">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text input-span" id="basic-addon1">District</span>
                        <input required name="District" type="text" class="form-control" placeholder="District" aria-label="District" aria-describedby="basic-addon1" value="<?=$control_result['District']?>">
                        
                    </div>
                    <div class="form-floating">
                        <textarea required name="Address" class="form-control" placeholder="Address" id="floatingTextarea2" style="height: 100px"><?=$control_result['Address']?></textarea>
                        <label for="floatingTextarea2">Address</label>
                    </div>
                    <div class="mt-5 text-end">
                        <button type="submit" name='update' class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>