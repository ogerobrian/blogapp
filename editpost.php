<?php
include "header.php";
$id=0;
$title="";
$content="";
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $result_query=mysqli_query($conn,"SELECT * FROM posts WHERE post_id=$id");
    if(count((array)$result_query)){
        $row=mysqli_fetch_array($result_query);
        $title=$row['title'];
        $content=$row['content'];
    }
}

if(isset($_POST['editpost'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];

    $update_query=mysqli_query($conn,"UPDATE posts SET title='$title',content='$content' WHERE post_id='$id'");
    if($update_query){
        header('location:managepost.php');
    }
}
?>
<form class="row g-3 fs-3" action="editpost.php" method="post">
    <div class="col-md-6">
    <input type="hidden" name="id" value="<?php echo $id;?>">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
        <label class="form-label">Content</label>

        <!-- Include javascript file for CKEDITOR -->
        <script src="ckeditor/ckeditor.js"></script>
        <textarea name="content" id="long_desc" value="<?php echo $content;?>"></textarea>
        <script type="text/javascript">
        // Initialize CKEditor
        CKEDITOR.replace('long_desc', {

            width: "450px",
            height: "200px"

        });
        </script>
    </div>
    <div class="raw">
        <input type="submit" class="btn btn-success w-25 p-2" value="Edit Post" name="editpost">
    </div>
</form>

<?php
include "footer.php";
?>