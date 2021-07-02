<?php
include "header.php";

if(isset($_POST['add'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $passwd=md5($_POST['passwd']);
    $confpasswd=md5($_POST['confpasswd']);

    $target = "images/".basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));


    // check if admin exist
    
    $sql_result = mysqli_query($conn,"SELECT * FROM admins WHERE username='$username' or email='$email'");
    $admin_check= mysqli_num_rows($sql_result);
    if($admin_check==0){
        if($passwd==$confpasswd){
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                echo '<h5 class="alert alert-danger" role="alert">File must be jpeg or png or jpg</h5>';
            }
            else{
                if($image_size>4000000){
                    echo '<h5 class="alert alert-danger" role="alert">File must be 2MB and below!</h5>';
                }else{
                    
                    $query=mysqli_query($conn,"INSERT INTO admins VALUES(0,'$fullname','$email','$username','$image','$passwd','level1','admin')");
                    if($query){
                        move_uploaded_file($_FILES['image']['tmp_name'],$target);
                        header("location:manageadmins.php");
                    }
                    else{
                        echo '<h5 class="alert alert-danger" role="alert">Error Try again!</h5>';
                    }
                }
            }
           
            
            
            } //
        else{
            echo '<h5 class="alert alert-danger" role="alert">Passwords not matching</h5>';
        } 
    }
    else{
        echo '<h5 class="alert alert-danger" role="alert">Use diffrent email and usernames!</h5>';
    }
    
}
?>

<div class="border border-info p-5 m-2">
    <p class="text-center fs-2">Add Admin</p>

    <form class="row g-3" action="addadmin.php" method="post" enctype="multipart/form-data">
        <div class="col-8">
            <label for="inputEmail4" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="fullname">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">

            <label for="inputEmail4" class="form-label">UserName</label>
            <input type="text" class="form-control" id="inputEmail4" name="username">
        </div>


        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="passwd">

            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="confpasswd">

        </div>
        <div class="mb-3">
            <input type="file" class="form-control" aria-label="file example" name=image>
        </div>
        <div class="raw">
            <input type="submit" class="btn btn-success w-25 p-2" value="Add" name="add">
        </div>
    </form>
</div>

<?php
include "footer.php";
?>