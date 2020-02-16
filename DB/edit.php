<?php
    session_start();
    $id = $_GET['id'];

    $connection = mysqli_connect("localhost","root","","dbtest");

    if(mysqli_connect_errno()){
        echo "Failed to connect to database" . mysqli_connect_error();
    }

    $res = mysqli_query($connection,"SELECT * FROM form WHERE id = '$id'");


    $res = mysqli_fetch_assoc($res);

?>

<form action="editaction.php" method="POST">
    <label for="id">ID:
        <input readonly = "true" type="text" name="id" value="<?php echo $res['id']; ?>">
    </label>
    <br>
    <br>
    <label for="name">Name:
        <input type="text" name="name" value="<?php echo $res['name']; ?>">
    </label>
    <br>
    <br>
    <label for="surname">Surname:
        <input type="text" name="surname" value="<?php echo $res['surname']; ?>">
    </label>
    <br>
    <br>
    <label for="email">Email:
        <input type="text" name="email" value="<?php echo $res['email']; ?>">
    </label>
    <br>
    <br>
    <label for="login">Login:
        <input type="text" name="login" value="<?php echo $res['login']; ?>">
    </label>
    <br>
    <br>
    <label for="password">Password:
        <input type="text" name="password" value="<?php echo $res['password']; ?>">
    </label>
    <br>
    <br>
    <input type="Submit" value="Update">
</form>
