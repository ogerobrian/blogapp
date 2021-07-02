<?php
include "header.php";

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query=mysqli_query($conn,"DELETE FROM posts WHERE post_id=$id");
    if($delete_query){
      echo '<h5 class="alert alert-danger" role="alert">Post Deteted</h5>';
    }
  }
  

?>
<div class="accordion" id="accordionExample p-5">

    <?php
$sql=mysqli_query($conn,"SELECT * FROM posts");
$counter=1;
while($row=mysqli_fetch_array($sql)){

?>
    <div class="accordion-item">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="<?php echo '#col'.$counter?>" aria-expanded="false"
            aria-controls="<?php echo 'col'.$counter?>">
            <?php echo $row['title'];?>
        </button>
        <div id="<?php echo 'col'.$counter?>" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <p><?php echo $row['content'];?></p>
                <a href="editpost.php?edit=<?php echo $row['post_id']; ?>"class="btn btn-info">Edit</a>
            <a href="managepost.php?delete=<?php echo $row['post_id']; ?>"class="btn btn-danger">Delete</a>
                <i class="float-end">By ~ <?php echo $row['admin_name'];?></i>
            </div>
        </div>
    </div>
    <?php $counter++;
} 
?>
</div><!-- end of accordion -->
<?php
include "footer.php"
?>