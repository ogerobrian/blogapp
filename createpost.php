<?php
include "header.php";
if(isset($_POST['send'])){
    $title =$_POST['title'];
    $content=$_POST['content'];
    $admin_name=$_SESSION['FULLNAME'];
    $photo=$_SESSION['IMAGENAME'];
    $dt=date("d-m-Y H:ia");

    $update_query1 = mysqli_query($conn,"UPDATE posts SET timing='older' WHERE timing='old'");
    $update_query = mysqli_query($conn,"UPDATE posts SET timing='old' WHERE timing='new'");
    $insert_query=mysqli_query($conn,"INSERT INTO posts VALUES(0,'$title','$content','new','$admin_name','$photo','$dt')");
    header("location:managepost.php");
}
?>
<form class="row g-3 fs-3" action="createpost.php" method="post">
    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
        <label class="form-label">Content</label>

        <!-- Include javascript file for CKEDITOR -->
        <script src="ckeditor/ckeditor.js"></script>

        <textarea id='long_desc' name='content'></textarea>

        <script type="text/javascript">
        // Initialize CKEditor
        CKEDITOR.replace('long_desc', {

            width: "450px",
            height: "200px"

        });
        </script>
    </div>
    <div class="raw">
        <input type="submit" class="btn btn-success w-25 p-2" value="Post" name="send">
    </div>
</form>

<?php
include "footer.php";
?>