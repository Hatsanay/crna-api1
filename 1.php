<?php
$db = mysqli_connect('localhost','root','','userdata');
if(!$db)
{
	echo "Database connection failed";
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username FROM users WHERE username = '".$username."'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "INSERT INTO users(username,password) VALUES ('".$username."','".$password."')";
		$query = mysqli_query($db,$insert);
		if($query){
			echo json_encode("Success");
		}
}
?>

$cus_fullname = $_POST['cus_fullname'];
$cus_username = $_POST['cus_username'];
$cus_password = $_POST['cus_password'];
$cus_email = $_POST['cus_email'];
$cus_tel = $_POST['cus_tel'];
