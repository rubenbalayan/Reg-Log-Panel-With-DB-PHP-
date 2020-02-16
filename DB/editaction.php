<?php
    session_start();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost","root","","dbtest");

    if(mysqli_connect_errno()){
        echo "Failed to connect to database" . mysqli_connect_error();
    }

    $query = "UPDATE form SET  name =  '$name',
surname =  '$surname',
email =  '$email',
login =  '$login',
password =  '$password' WHERE  id = '$id'";

    mysqli_query($connection,$query);

    header("Location: http://localhost/my_php/DB/check.php");
    die();

?>