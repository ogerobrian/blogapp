<?php
include "includes/config.php";
session_start();
date_default_timezone_set('Africa/Nairobi');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
    .sidebar-link {
        text-decoration: none;
        color:#800000;
    }

    ul {
        list-style-type: none;
    }
    </style>
</head>

<body>
<div class="container">
    <div class="row" style=" background: linear-gradient(to right,#0099cc,lightblue,#0099cc);">
        <div class="col">
            <?php
            if(!isset($_SESSION["ID"])){

            ?>
            <a href="login.php" class="sidebar-link fs-4 float-end p-2 text-light">Login</a>
            <?php
            }
            ?>
            <?php
             if(isset($_SESSION["ID"])){
            ?>
            <a href="logout.php" class="sidebar-link fs-4 float-end p-2 text-light">Logout</a>
            <?php
             }
            ?>
            <a href="home.php" class="sidebar-link fs-4 float-end p-2 text-light">Site</a>
            <h1>My Blog</h1>
        </div>
    </div>
    

<div class="row">
    <div class="col-lg-4" style="background-color:#e0ebeb;">
        <ul>
            
        <?php
            if(isset($_SESSION["ID"])){

            ?>
            <li><p class="lead"><?php  echo "As ". $_SESSION["FULLNAME"];?></p></li>
            <li><a href="addadmin.php" class="sidebar-link fs-4">Add Admin</a></li>
            <li><a href="manageadmins.php" class="sidebar-link fs-4">Manage Admins</a></li>
            <li><a href="createpost.php" class="sidebar-link fs-4">Create Post</a></li>
            <li><a href="managepost.php" class="sidebar-link fs-4">Manage Post</a></li>
            <li><a href="viewcomments.php" class="sidebar-link fs-4">View Comments</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="col-lg-8">