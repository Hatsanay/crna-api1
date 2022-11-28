<?php
$db = mysqli_connect('localhost','root','','db_crna');
if(!$db)
{
	echo "Database connection failed";
}
$username = $_POST['username'];
$password = $_POST['password'];

$date = date('Y-m-d H:i:s');
$level = "1";

$sql = "SELECT memusername FROM members WHERE memusername = '".$username."'";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "INSERT INTO members(memusername,mempassword,memlavel,memdate) VALUES ('".$username."','".$password."','".$level."','".$date."')";
		$query = mysqli_query($db,$insert);
		if($query){
			echo json_encode("Success");
		}
}
?>
