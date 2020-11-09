<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
require("connectdb.php");
session_start();
?>
<body>
<div class="jumbotron text-center p-3 my-3 bg-dark text-white">
    <h1>User Index Page</h1>
    <p style="background: #d9edf7; color: #31708f; padding: 15px 15px;">Welcome ADMIN <?php echo $_SESSION['fullname'];  ?></p>
    <p style="background: #d9edf7; color: #31708f; padding: 15px 15px;">User Name: <?php echo $_SESSION['username'];  ?></p>
    <p>Please Choose your option!</p>
</div>
<?php
include "SearchAll.php";
?>
<center>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Create New CLass</h3>
                <a href="newClassAdmin.php">Click Here!</a>
            </div>
            <div class="col-sm-4">
                <h3>Mange CLass</h3>
                <a href="manageClassAdmin.php">Click Here!</a>
            </div>
            <div class="col-sm-4">
                <h3>Log Out</h3>
                <p>If you don't want stay here</p>
                <a href="logout.php">Click Here!</a>
            </div>

        </div>
    </div>
</center>
</body>
</html>
<?php
include "indexAdmin.php";
?>