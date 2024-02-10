<?php
$servername = "localhost";
$username = "wolglobal_Abhineet";
$password = "&t,&qyXW&}41";
$dbname = "wolglobal_Abhineet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/soc-admin/admin/');
// define('SITE_PATH','http://accorppartners.com/soc-admin/admin/');
// define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'admin/images/');
// define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'admin/images/');
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}
?>


