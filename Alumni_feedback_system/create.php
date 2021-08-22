<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}
?>

<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
 
$s_regno=$s_nm=$s_dob=$s_jy=$s_py=$dept_id="";
$err_regno=$err_nm=$err_dob=$err_jy=$err_py=$err_deptid="";
// Processing form data when form is submitted
if(isset($_POST['submitmydata'])){

// Validate regno
$input_id = trim($_POST["regno"]);
if(empty($input_id))
{
$err_regno= "Please enter student registration no.";     
}
//elseif(!ctype_digit($input_rollno))
//{
//$srollno_err = "Please enter a positive integer value.";
//}
else
{
$s_regno = $input_id;
}

// Validate student name
 $input_name = trim($_POST["s_nm"]);
if(empty($input_name))
{
$err_nm = "Please enter a student name.";
} 
elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
{
$err_nm = "Please enter a valid student name.";
} 
else
{
$s_nm = trim($_POST["s_nm"]);
}

// Validate student dob
// $input_dob = trim($_POST["s_dob"]);
if(empty($_POST["s_dob"]))
{
$err_dob = "Please enter a student dob.";
} 
else
{
$s_dob= trim($_POST["s_dob"]);
}

// Validate student join year
// $input_joyr = trim($_POST["join_year"]);
if(empty($_POST["s_jy"]))
{
$err_jy = "Please enter student join year.";     
} 
else
{
$s_jy =  trim($_POST["s_jy"]);
}
// Validate student pass year
// $input_py = trim($_POST["pass_year"]);
if(empty($_POST["s_py"]))
{
$err_py = "Please enter student pass year.";     
} 
else
{
$s_py = trim($_POST["s_py"]);
}

// Validate dept id
//$input_id = trim($_POST["dept_id"]);
if(empty($_POST["dept_id"]))
{
$err_deptid= "Please enter department id.";     
}
//elseif(!ctype_digit($input_rollno))
//{
//$srollno_err = "Please enter a positive integer value.";
//}
else
{
$dept_id= trim($_POST["dept_id"]);
}


// Check input errors before inserting in database
if(empty($err_regno) && empty($err_nm) && empty($err_dob)&&  empty($err_jy)&&  empty($err_py)&&  empty($err_deptid))
{
// Prepare an insert statement
$sql = "INSERT INTO student_details (regdno,name, 
dob, join_year,pass_year,dept_id) VALUES (?,UPPER(?),?,?,?,?)";

if($stmt = $mysqli->prepare($sql))
{

// Bind variables to the prepared statement as parameters
$stmt->bind_param("issiis", $param_id, $param_name, $param_dob,  $param_jy,$param_py,$param_id1);

// Set parameters
$param_id=$s_regno;
$param_name=$s_nm;
$param_dob=$s_dob;
$param_jy=$s_jy;
$param_py=$s_py;
$param_id1=$dept_id;


// Attempt to execute the prepared statement
if($stmt->execute())
{
// Records created successfully. Redirect to landing page
header("location: studentdatabase.php");
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
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="index_1.css">
 <script  src="index.js"></script>
<style type="text/css">
.wrapper{
width: 500px;
margin: 10px auto;
/*border: 2px solid;
border-radius: 5px*/;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>

</head>

<body id="userpbody">
 <div>
<!-- ---------------------header----------------------------------- -->
	<div  id="hd">
    <header><img  class="logo" src="logoabit.png"><b>ABIT GROUP OF INSTITUTIONS</b></header>
  </div>



  <div id="nb">
      <nav class="navbar navbar-expand-sm">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a id="ni"class="nav-link" href="Admin.php">HOME</a>
    </li>
    <li class="nav-item">
      <a id="ni"class="nav-link" href="studentdatabase.php">STUDENT DATABASE</a>
    </li>
    <li class="nav-item">
      <a id="ni"class="nav-link" href="#">EVENT MANAGEMENT</a>
    </li>

   
    <li id="sp"></li>
    </ul>
  
    
      <div id="userpname">
      <b><?php echo htmlspecialchars($_SESSION["username1"]); ?></b>
      </div>
      <div id="logoutbtn">
    	<button type="button" class="btn btn-info" id="btnlogout" onclick="window.location.href='logout.php'">Logout</button></div>
  
</nav>
</div>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header">
<h2>Create Record</h2>
</div>

<p>Please fill this form and submit to add Student Record to the database.</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($err_regno)) ? 'has-error' : ''; ?>">
<label>Registration Id</label>
<input type="text" name="regno" class="form-control" value="<?php echo $s_regno; ?>">
<span class="help-block"><?php echo $err_regno;?></span>
</div>

<div class="form-group <?php echo (!empty($err_nm)) ? 'has-error' : ''; ?>">
<label>Student Name</label>
<input type="text" name="s_nm" class="form-control" value="<?php echo $s_nm; ?>">
<span class="help-block"><?php echo $err_nm;?></span>
</div>

<div class="form-group <?php echo (!empty($err_dob)) ? 'has-error' : ''; ?>">
<label>Student dob</label>
<input type="text" name="s_dob" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo $s_dob; ?>">
<span class="help-block"><?php echo $err_dob;?></span>
</div>

<div class="form-group <?php echo (!empty($err_jy)) ? 'has-error' : ''; ?>">
<label>Student Join Year</label>
<input type="text" name="s_jy" class="form-control" value="<?php echo $s_jy; ?>">
<span class="help-block"><?php echo $err_jy;?></span>
</div>

<div class="form-group <?php echo (!empty($err_py)) ? 'has-error' : ''; ?>">
<label>Student Pass Year</label>
<input type="text" name="s_py" class="form-control" value="<?php echo $s_py; ?>">
<span class="help-block"><?php echo $err_jy;?></span>
</div>

<div class="form-group <?php echo (!empty($err_deptid)) ? 'has-error' : ''; ?>">
<label>Department Id</label>
<input type="text" name="dept_id" class="form-control" value="<?php echo $_SESSION["deptid"]; ?>" readonly>
<span class="help-block"><?php echo $err_deptid;?></span>
</div>

<input type="submit" class="btn btn-primary" name="submitmydata" value="Submit">
<a href="studentdatabase.php" class="btn btn-danger">Cancel</a><br><br>

</form>

</div>
</div>        
</div>
</div>
</body>
</html>