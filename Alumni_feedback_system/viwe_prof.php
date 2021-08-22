<?php
require_once "config.php";

session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}

$u_id="";

$u_id=$_SESSION["userid"];

$sql = "SELECT s_id,s_name,s_dob,s_dept,phno,email,address,yoj,yop,qual,cgpa,degn,course,univ,jobt,org,orgl FROM register RIGHT JOIN usr_prof ON register.s_id = usr_prof.regdno WHERE s_id=?";

if($stmt = $mysqli->prepare($sql))
	{
	$stmt->bind_param("i", $u_id);

   if($stmt->execute()){
//with out using get_result()
    $stmt->bind_result($id,$name,$dob,$dept,$phn,$email,$address,$yoj,$yop,$qual,$cgpa,$desn,$course,$univ,$jobt,$org,$orgl);
   $stmt->store_result();
   $result = $stmt->fetch();
   if($stmt->num_rows == 1)
   {
       if ($desn=='J')
       {
            echo '<style type="text/css">';
            
            echo '#div_student{display:none;}';

            echo '</style>';
       }
       else
       {
            echo '<style type="text/css">';
            
            echo '#div_job{display:none;}';

            echo '</style>';
       }
   }
   else
{
// URL doesn't contain valid id parameter. Redirect to error page
/*header("location: error.php");
exit();*/
echo '<script type="text/javascript">'; 
echo 'alert("Please complete your profile");'; 
echo 'window.location.href = "userprofile.php";';
echo '</script>';
}

} else{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
$stmt->close();

// Close connection
$mysqli->close();


?>

