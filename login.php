<?php
include "header.php";
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $passwd=md5($_POST['passwd']);

    $query = mysqli_query($conn,"SELECT * FROM admins WHERE username='$username' and passwd='$passwd'");
    $result = mysqli_num_rows($query);
    if($result>0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION["ID"] = $row["id"];
        $_SESSION["FULLNAME"] = $row["fullname"];
        $_SESSION["EMAIL"] = $row["email"];
        $_SESSION["USERNAME"] = $row["username"];
        $_SESSION["CATEGORY"] = $row["category"];
        $_SESSION["STATUS"] = $row["status"];
        $_SESSION["IMAGENAME"] = $row["image"];
        header("location:index.php");
    }
    else{
        echo '<h5 class="alert alert-danger" role="alert">Error Try again!</h5>';
    }
}
?>
<div class="border border-info p-5 m-2">
    <p class="text-center fs-2">Login</p>

    <form class="row g-3" action="login.php" method="post">
        <div class="col-8">

            <label for="inputEmail4" class="form-label">UserName</label>
            <input type="text" class="form-control" id="inputEmail4" name="username">
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="passwd">
        </div>
        <div class="raw">
            <input type="submit" class="btn btn-success w-25 p-2" value="Login" name="login">
        </div>
    </form>
</div>
<?php
include "footer.php";
?>