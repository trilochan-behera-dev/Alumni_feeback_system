<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
 $u_phone=$u_id=$u_name=$cc=$u_pn=$u_add=$u_email=$u_yoj=$u_yop=$u_qul=$u_cgpa=$u_deg=$u_jt=$u_org=$u_oloc=$u_cou=$u_uni="";

// Processing form data when form is submitted
if(isset($_POST['submitmydata'])){

$u_name=trim($_POST["uname"]);

$cc=trim($_POST["ccode"]);
$u_pn=trim($_POST["pnum"]);

$u_phone=$cc.$u_pn;
$u_add=trim($_POST["uaddress"]);
$u_email=trim($_POST["uemail"]);
$u_yoj= trim($_POST["yjoin"]);
$u_yop= trim($_POST["ypass"]);
$u_qul= trim($_POST["uhq"]);
$u_cgpa= trim($_POST["ucgpa"]);
$u_deg=trim($_POST["udeg"]);
$u_jt=trim($_POST["ujt"]);
$u_org= trim($_POST["uorg"]);
$u_oloc= trim($_POST["uorgl"]);
$u_cou= trim($_POST["ucn"]);
$u_uni= trim($_POST["University"]);

/*----------------------*/
$u_id=$_SESSION["userid"];
/*---------------------*/

// Prepare an insert statement
/*$sql = "INSERT INTO register (s_id,s_name, 
s_dob,s_dept,s_pass) VALUES (?, ?, ?, ?, ?)";*/


$sql ="INSERT INTO usr_prof(regdno,name,phno,email,address,yoj,yop,qual,cgpa,degn,course,univ,jobt,org,orgl) values (?,UPPER(?),?,?,UPPER(?),?,?,UPPER(?),?,?,UPPER(?),UPPER(?),UPPER(?),UPPER(?),UPPER(?))";

if($stmt = $mysqli->prepare($sql))
{

// Bind variables to the prepared statement as parameters
$stmt->bind_param("sssssssssssssss", $param_id, $param_name, $param_ph, $param_email, $param_address, $param_yoj, $param_yop,  $param_qual,$param_cgpa,$param_deg,$param_course,$param_university,$param_jobt,$param_joborg,$param_jobloc);

// Set parameters
 $param_id=$u_id; 
 $param_name=$u_name;
 $param_ph=$u_phone;
 $param_email=$u_email;
 $param_address=$u_add;
 $param_yoj=$u_yoj;
 $param_yop=$u_yop;
 $param_qual=$u_qul;
 $param_cgpa=$u_cgpa;
 $param_deg=$u_deg;
 $param_course=$u_cou;
 $param_university=$u_uni;
 $param_jobt=$u_jt;
 $param_joborg=$u_org;
 $param_jobloc=$u_oloc;
 

// Attempt to execute the prepared statement
if($stmt->execute())
{
// Records created successfully. Redirect to landing page
header("location: user.php");
exit();
  
}
else
{
echo "Something went wrong. Please try again later.";
}


// Close statement
$stmt->close();
}
// Close connection
$mysqli->close();
}
?>