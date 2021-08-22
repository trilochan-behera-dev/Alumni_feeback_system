<?php 
// Include config file
require_once "config.php";
// Define variables and initialize with empty values
 
$regd=$u_pass=$u_re_pass=$u_id=$u_name=$u_dob=$u_dept=$u_pass=$u_re_pass="";
$err_id=$err_name=$err_dob=$err_dept=$err_pass=$err_re_pass="";

if(isset($_POST['search']))
{
	$input_id = $_POST['redg_id'];

if(!empty($input_id)) 
{
    if(preg_match('/^\d{10}$/',$input_id)) 
    {
      $regd = $input_id;

      
    }
    else 
    {
      $err_id = "*Please entr 10 digit valid Registration id.";
    }
}
else 
{
  $err_id = "*Please enter Registration id.";
}

	if(empty($err_id))
 	{
 		$sql = "SELECT * FROM student_details WHERE regdno=?";
 		if($stmt = $mysqli->prepare($sql))
 		{
 			$stmt->bind_param("i", $regd);
 			if($stmt->execute())
 			{
 				$stmt->bind_result($id,$name,$dob,$ujoin,$upass,$dept);
   	            $stmt->store_result();
   	            $result = $stmt->fetch();
   	            $u_id=$id;
   	            $u_name=$name;
   	            $u_dob=$dob;
   				$u_dept=$dept;
   	           	if($stmt->num_rows == 1)
   				{
      
            		echo '<style type="text/css">';
            
            		echo '#div_test{display:block;}';

            		echo '</style>';
       			}
       			else
       			{
           			/*echo '<script language="javascript">';
                echo 'alert("Invalid Registration id / please contact your department")';
                echo 'window.location.href = "index.php";';
                echo '</script>';*/

                echo '<script type="text/javascript">'; 
    echo 'alert("Invalid Registration id / please contact your department");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
      			}
  			}
 		}
 		else
 		{
 			echo '<script type="text/javascript">'; 
    echo 'alert("Already registered");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
 		}
 	}
 	/*$stmt->close();	*/
}


/*------------------*/

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



$u_name =$_POST["user_name"];

$u_dob = $_POST["user_dob"];

$u_dept= $_POST["user_dept"];



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
echo '<script type="text/javascript">'; 
    echo 'alert("Registration completed");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
  
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