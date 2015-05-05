<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password){
	$connect = mysqli_connect("localhost","root","1234") or die("could'nt open DB");
	mysqli_select_db($connect, "cloth_shop") or die("couldn't find database!");

	$query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");

	$numrows = mysqli_num_rows($query);

	if($numrows!==0){

		while ($row = mysqli_fetch_assoc($query)) {
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		if($username == $dbusername && $password==$dbpassword){
			header('Location: /db/admin.php');
			@$_SESSION['username'] = $username;


		}
		else{
			header('Location:/db/index.php');
			//echo "Your password is incorrect!";
		}
	}
	else
		die("The user doesn't exists!");
}
else
	die("Please enter a username and password!");
?>
