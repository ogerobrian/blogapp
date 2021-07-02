<?php
include "header.php";
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $delete_query=mysqli_query($conn,"DELETE FROM comments WHERE comment_id=$id");
  }
?>
<body>
<style>
    .backlink {
        text-decoration: none;
        color: tomato;
        font-size: 25px;
        font-weight: bold;
    }
    </style>

    <div class="container">
        <a class="backlink" href="index.php">Back</a>
        <h3 class="p-3">View Comments</h3>
        <!-- start main div -->
        <?php
        $query=mysqli_query($conn,"SELECT* FROM posts ORDER BY post_id DESC");
        $i=1;
        while($row=mysqli_fetch_array($query)){
            $id=$row['post_id'];
        
        ?>
        <div style="padding:5px;margin:15px;">
            <div class="row p-4" style="background-color:whitesmoke;">
                <h4><?php echo $row['title'];?></h4>
                <p class=lead>
                    content goes here
                </p>
            </div>

            <div class="row p-5 overflow-scroll" style="background-color: #ddd; height:300px;">

                <?php

$select_qry=mysqli_query($conn,"SELECT *FROM comments WHERE post_id='$id' ORDER BY comment_id DESC");
$counter=1;
while($row=mysqli_fetch_array($select_qry)){
?>
                <div id="mycomment_div" class="row m-2 mx-auto"
                    style="background-color:#f1f1f1;border-radius:5px; width:80; padding: 10px;">
                    <p><?php echo $row['comment'];?><br>
                    <a href="testcom.php?del=<?php echo $row['comment_id']; ?>" class="btn btn-dark float-end" style="margin:2px;">Remove</a>
                    </p>
                    
                </div>

                <?php
$counter++;
    
}
?>
            </div>
        </div>
        <?php
        $i++;
}
?>
        <!-- end main div -->
    </div>

    <?php
include "footer.php";
?>