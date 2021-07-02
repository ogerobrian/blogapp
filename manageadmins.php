<?php
include "header.php";

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query=mysqli_query($conn,"DELETE FROM admins WHERE id=$id");
    if($delete_query){
      echo '<h5 class="alert alert-danger" role="alert">Admin Deteted</h5>';
    }
  }
  

?>
<h3>Admins</h3>
<table class="table table-success table-striped">
    <th>NO</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
    <?php
  $sql=$conn->query("SELECT * FROM admins WHERE category ='level1'");
  $admins_check= mysqli_num_rows($sql);
  if($admins_check==0){
    echo '<h5 class="alert alert-primary" role="alert">No Admins</h5>';
  }
  $counter=1;
  while($row = mysqli_fetch_array($sql)){
  ?>
    <tr>
        <td><?php echo $counter;?></td>
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['email'];?></td>
        <td >
            <a href="editadmin.php?edit=<?php echo $row['id']; ?>"class="btn btn-info" style="margin:2px;">Edit</a>
            <a href="manageadmins.php?delete=<?php echo $row['id']; ?>"class="btn btn-danger" style="margin:2px;">Delete</a>

        </td>
    </tr>
    <?php
    $counter++;
  }
    ?>
</table>
<?php
include "footer.php";
?>