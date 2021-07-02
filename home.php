<?php
include "includes/header_users.php";
?>
<div class="container">
    <h3>Latest Post</h3>
</div>
<?php
$sql_qry= mysqli_query($conn,"SELECT * FROM posts WHERE timing ='new'");
$post_check= mysqli_num_rows($sql_qry);
if($post_check==0){
    header("location:oldpost.php");
}
$counter=1;
while($row=mysqli_fetch_array($sql_qry)){
?>
<div class="row p-3 overflow-auto">
    <div class="col-lg-2">
        <img src="images/<?php echo $row['photo'];?>" alt="Photo" class="img-thumbnail rounded-circle">
    </div>
    <div class="col-lg-9  ">
        <p class="lead" style="color:#006666;">
            <b><?php echo $row['title'];?></b>
        </p>
        <p class="lead">
            <?php echo $row['content'];?>
        </p>
        <div class="float-end p-4">
            <i>By ~ <?php echo $row['admin_name'];?></i><br>
            <p style="color:#006666;"><?php echo $row['dt'];?></p>
        </div>
        <div class="float-end">
            <i class="fa fa-thumbs-up fa-3x p-2" style="color:#007acc;"></i>
            <i class="fa fa-thumbs-down fa-3x p-2" style="color:tomato;"></i>
            <a href="comment.php?comment=<?php echo $row['post_id'];?>">
            <i class="fa fa-comments fa-3x p-2" style="color:#00cc99;"></i>
            </a>
        </div>
    </div>
    <hr>

</div>
<?php 
$counter++;
}
?>
<?php
include "includes/footer_users.php";
?>