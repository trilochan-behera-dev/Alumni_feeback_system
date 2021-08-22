<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
 
$u_id=$u_name=$u_dob=$u_dept=$u_pass=$u_re_pass="";
$err_id=$err_name=$err_dob=$err_dept=$err_pass=$err_re_pass="";
// Processing form data when form is submitted
if(isset($_POST['submitmydata'])){


$input_id = trim($_POST["redg_id"]);
if(empty($input_id))
{
$err_id = "*Please enter Registration id.";     
}

else
{
$u_id = $input_id;
}


$input_name = trim($_POST["user_name"]);
if(empty($input_name))
{
$err_name = "*Please enter your name.";
} 
elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
{
$err_name = "*Please enter a valid name.";
} 
else
{
$u_name = $input_name;
}

$input_dob = trim($_POST["user_dob"]);
if(empty($input_dob))
{
$err_dob = "*Please enter your DOB.";     
} 
else
{
$u_dob = $input_dob;
}


$input_dept = trim($_POST["user_dept"]);
if(empty($input_dept))
{
$err_dept = "*Please enter your dept.";     
}

else
{
$u_dept= $input_dept;
}


$input_pass = trim($_POST["user_pass"]);
if(empty($input_pass))
{
$err_pass = "*Please enter a password";     
}

else
{
$u_pass= $input_pass;
}

$input_repass = trim($_POST["user_re_pass"]);
if(empty($input_repass))
{
$err_re_pass = "*Please re-enter a password";     
}
else if ($u_pass!=$input_repass)
 {
	$err_re_pass = "*password is not matched";
}

else
{
$u_re_pass= $input_repass;
}

// Check input errors before inserting in database
if(empty($err_id) && empty($err_name) && empty($err_dob)&&  empty($err_dept) && empty($err_pass) && empty($err_re_pass)&&($u_pass==$input_repass))
{
// Prepare an insert statement
$sql = "INSERT INTO register (s_id,s_name, 
s_dob,s_dept,s_pass) VALUES (?, ?, ?, ?, ?)";

if($stmt = $mysqli->prepare($sql))
{

// Bind variables to the prepared statement as parameters
$stmt->bind_param("sssss", $param_id, $param_name, $param_dob,  $param_dept, $param_pass);

// Set parameters
$param_id=$u_id;
$param_name=$u_name;
$param_dob=$u_dob;
$param_dept=$u_dept;
$param_pass=$u_pass;


// Attempt to execute the prepared statement
if($stmt->execute())
{
// Records created successfully. Redirect to landing page
header("location: index.php");
exit();
  
}
else
{
echo "Something went wrong. Please try again later.";
}

}
// Close statement
$stmt->close();
}
// Close connection
$mysqli->close();
}
?>