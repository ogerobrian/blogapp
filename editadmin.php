
<?php
include "header.php";
$id=0;
$fullname="";
$email="";
$username="";
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $result_query=mysqli_query($conn,"SELECT * FROM admins WHERE id=$id");
    if(count((array)$result_query)){
        $row=$result_query->fetch_array();
        $fullname=$row['fullname'];
        $email=$row['email'];
        $username=$row['username'];
        
    }
}
if(isset($_POST['editadmin'])){
    $id=$_POST['id'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $username=$_POST['username'];

    $update_query=mysqli_query($conn,"UPDATE admins SET fullname='$fullname',email='$email',username='$username' WHERE id='$id'");
    if($update_query){
        echo '<h5 class="alert alert-success" role="alert">Admin Edited</h5>';
        header('location:manageadmins.php');
    }
}
?>


<div class="border border-info p-5 m-2">
    <p class="text-center fs-2">Edit Admin</p>

    <form class="row g-3" action="editadmin.php" method="post">
        <div class="col-8">
        <input type="hidden" name="id" value="<?php echo $id;?>">
            <label for="inputEmail4" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="fullname" value="<?php echo $fullname;?>">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $email;?>">

            <label for="inputEmail4" class="form-label">UserName</label>
            <input type="text" class="form-control" id="inputEmail4" name="username" value="<?php echo $username;?>">
        </div>


        
        <div class="raw">
            <input type="submit" class="btn btn-success w-25 p-2" value="Edit" name="editadmin">
        </div>
    </form>
</div>

<?php
      
include "footer.php";
?>