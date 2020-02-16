<?php
    session_start();
    $id = $_GET['id'];

    $connection = mysqli_connect("localhost","root","","dbtest");

    if(mysqli_connect_errno()){
        echo "Failed to connect to database" . mysqli_connect_error();
    }

    mysqli_query($connection,"DELETE FROM form WHERE id = '$id'");

    header("Location: http://localhost/my_php/DB/check.php");
    die();



?>

