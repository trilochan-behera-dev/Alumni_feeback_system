<?php
// Include config file
require_once "config.php";

$regd="";
$u_id=$u_name=$u_dob=$u_dept="";


$u_id=$u_name=$u_dob=$u_dept=$u_pass=$u_re_pass="";
$err_id=$err_name=$err_dob=$err_dept=$err_pass=$err_re_pass="";


if(isset($_POST['search']))
{


$input_id = trim($_POST["redg_id"]);
if(empty($input_id))
{
$err_id = "*Please enter Registration id.";     
}

else
{
$regd = $input_id;
}



if(empty($err_id))
{

$sql = "SELECT * FROM student_details WHERE regdno=?";

if($stmt = $mysqli->prepare($sql))
	{
	$stmt->bind_param("i", $regd);

   if($stmt->execute())
   {
   	$stmt->bind_result($u_id,$u_name,$u_dob,$u_dept);
   	$stmt->store_result();
   	$result = $stmt->fetch();
   	header("location: registration.php");
	}
else
{
	echo "Oops! Something went wrong. Please try again later.";
}
}

/*$stmt->close();*/


// Close connection
$mysqli->close();
}
}

?>
