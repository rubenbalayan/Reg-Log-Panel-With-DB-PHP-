<?php
	session_start();

	function dump($x){

		echo "<pre>";
		print_r($x);
		echo "</pre>";
	}

	$connection = mysqli_connect("localhost","root","","dbtest");

	if(mysqli_connect_errno()){
		echo "Failed to connect to database" . mysqli_connect_error();
	}

	if(isset($_POST{"login"}) && isset($_POST["password"])){
		$login = $_POST["login"];
		$password = $_POST["password"];
		$_SESSION["login"] = $login;
		$_SESSION["password"] = $password;
	}
	else{
        $login = $_SESSION["login"];
        $password = $_SESSION["password"];
	}

	$id = mysqli_query($connection, "SELECT id FROM form WHERE login = '$login'");
	$id = mysqli_fetch_assoc($id);

	$password2 = mysqli_query($connection, "SELECT password FROM form WHERE id = '$id[id]'");
	$password2 = mysqli_fetch_assoc($password2);

	if($password == $password2['password']){
		
		$base = array();

		$result = mysqli_query($connection, "SELECT * FROM form");

		$i = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$base[$i]['id'] = $row['id'];
			$base[$i]['name'] = $row['name'];
			$base[$i]['surname'] = $row['surname'];
			$base[$i]['email'] = $row['email'];
			$base[$i]['login'] = $row['login'];
			$base[$i]['password'] = $row['password'];
			$i++;
		}

		$arr = array("id","name","surname","email","login","password");

		echo "<table>";
		for($i=0;$i<count($base);$i++){
			$editid = 'editid'.$base[$i][$arr[0]];
			$delid = 'delid'.$base[$i][$arr[0]];
			echo("<tr>");
			for($j=0;$j<count($base[$i]);$j++){
				echo "<td style = 'border: 1px solid black'>";
				echo $base[$i][$arr[$j]];

				echo "</td>";
			}
			echo "<td class = 'edit' id = $editid style = 'color : gold'>";
			echo "EDIT";
			echo "</td>";
			echo "<td class = 'delete' id = $delid style = 'color: red'>";
			echo "DELETE";
			echo "</td>";
			echo"</tr>";
		}
		echo "</table>";


	}
	else{
		echo "Error";
		die();
	}

 ?>

<script src="jquery.js"></script>
<script>
	$(document).ready(function () {

	    $(".edit").click(function () {
            var id = $(this).attr("id");
            id = id.split("editid");
            id = id[1];
            window.location.replace("http://localhost/my_php/DB/edit.php?id=" + id);
        });

	    $(".delete").click(function () {
			var id = $(this).attr("id");
			id = id.split("delid");
			id = id[1];
			window.location.replace("http://localhost/my_php/DB/delete.php?id=" + id);
        });



    });
</script>
