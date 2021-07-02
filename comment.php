<?php
include "includes/config.php";

$post_id=0;
if(isset($_POST['sendcomment'])){
    $post_id=$_POST['post_id'];
    $comment=$_POST['comment'];

    $insert_comment_query=mysqli_query($conn,"INSERT INTO comments VALUES(NULL,'$post_id','$comment')");

    if($insert_comment_query){header("location:oldpost.php");}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
<?php
if(isset($_GET['comment'])){
    $post_id=$_GET['comment'];
?>
    <div class="div_form">
        <a class="backlink" href="home.php">Back</a>
        <h3>Comment Or Ask Question Here</h3>

        <div class="container">
            <form action="comment.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                
                <label for="subject">Subject</label>
                <textarea id="subject" name="comment" placeholder="Write comment.." style="height:200px"
                    required></textarea>

                <input type="submit" name="sendcomment" value="Submit">
            </form>
        </div>
    </div>
<?php
}
?>
</body>


</html>