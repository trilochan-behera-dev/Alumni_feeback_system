<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}

require_once "config.php";

$regdno=$name=$dob=$join=$pass=$dept="";
$err_name=$err_dob=$err_join=$err_pass=$err_dept="";

if(isset($_POST['updatedata']))
{	

    $i_regdno = $_POST["regd"];

    if( empty($i_regdno))
    {
    // URL doesn't contain valid id. Redirect to error page
    header("location: error.php");
    exit();	
    }  
    $regdno= $i_regdno ;
    // Validate  name
    $input_name= trim($_POST["name"]);
    if(empty($input_name))
    {
    $err_name = "Please enter name.";
    } 
    elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
    $err_name = "Please enter a valid  name.";
    } 
    else
    {
    $name = trim($_POST["name"]);
    }


    // Validate dob
    
    if(empty($_POST["dob"]))
    {
    $err_dob = "Please enter dob";     
    } 
    else
    {
    $dob= trim($_POST["dob"]);
    }



    if(empty($_POST["join"]))
    {
    $err_join= "Please enter join year.";     
    }
    else
    {
    $join= trim($_POST["join"]);
    }


    if(empty($_POST["pass"]))
    {
    $err_pass= "Please enter passing year.";     
    }
    else
    {
    $pass=  trim($_POST["pass"]);
    }

    if(empty($_POST["dept"]))
    {
    $err_dept = "*Please enter your dept.";     
    }
    else
    {
    $dept= trim($_POST["dept"]);
    }


    if(empty($err_name) && empty($err_dob)  && empty($err_join) &&  empty($err_pass) &&  empty($err_dept))
    {
    // Prepare an update statement
    $sql = "UPDATE student_details SET  name=UPPER(?),dob=?,join_year=?,pass_year=?,dept_id=? WHERE regdno=?";

    if($stmt = $mysqli->prepare($sql))
    {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssiisi",$param_name, $param_dob,$param_join, $param_pass, $param_dept, $param_regdno);

    // Set parameters
    $param_name=$name;
    $param_dob=$dob;
    $param_join=$join;
    $param_pass=$pass;
    $param_dept=$dept;
    $param_regdno = $regdno;

    // Attempt to execute the prepared statement
    if($stmt->execute())
    {
    // Records updated successfully. Redirect to landing page
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

// Check existence of id parameter before processing further
if(isset($_GET["regd"]))
{
// Get URL parameter
$regdno=  trim($_GET["regd"]);

// Prepare a select statement
$sql = "SELECT name,dob,join_year,pass_year,dept_id FROM student_details WHERE regdno= ?";
if($stmt = $mysqli->prepare($sql)){
// Bind variables to the prepared statement as parameters
$stmt->bind_param("i", $param_regdno);

 // Set parameters
$param_regdno = $regdno;

// Attempt to execute the prepared statement
if($stmt->execute()){
        
$stmt -> store_result();

$totalrows=$stmt->num_rows;

$stmt -> bind_result($name,$dob,$join,$pass,$dept);

        
$stmt->fetch();

if($totalrows == 1){
    /* Fetch result row as an associative array. Since the result set
    contains only one row, we don't need to use while loop */
    //$row = $result->fetch_array(MYSQLI_ASSOC);

    // Retrieve individual field value

} else
{
// URL doesn't contain valid id. Redirect to error page
header("location: error.php");
exit();
}

}
else
{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
$stmt->close();

// Close connection
$mysqli->close();
}  
else
{
// URL doesn't contain id parameter. Redirect to error page
header("location: error.php");
exit();
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
<h2>Update Record</h2>
</div>

<p>Please edit the input values and submit to update the record.</p>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

<!-- <div class="form-group <?php echo (!empty($err_regd)) ? 'has-error' : ''; ?>">
<label>Registration no</label>
<input type="text" name="regd" class="form-control" value="<?php echo $regdno; ?>">
<span class="help-block"><?php echo $err_regd;?></span>
</div> -->


<div class="form-group <?php echo (!empty($err_name)) ? 'has-error' : ''; ?>">
<label>Student Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
<span class="help-block"><?php echo $err_name;?></span>
</div>

<div class="form-group <?php echo (!empty($err_dob)) ? 'has-error' : ''; ?>">
<label>DOB</label>
<input type="text" name="dob" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo $dob; ?>">
<span class="help-block"><?php echo $err_dob;?></span>
</div>

<div class="form-group <?php echo (!empty($err_join)) ? 'has-error' : ''; ?>">
<label>Join Year</label>
<input type="text" name="join" class="form-control" value="<?php echo $join; ?>">
<span class="help-block"><?php echo $err_join;?></span>
</div>

<div class="form-group <?php echo (!empty($err_pass)) ? 'has-error' : ''; ?>">
<label>Passing Year</label>
<input type="text" name="pass" class="form-control" value="<?php echo $pass; ?>">
<span class="help-block"><?php echo $err_pass;?></span>
</div>

<div class="form-group <?php echo (!empty($err_dept)) ? 'has-error' : ''; ?>">
<label>Department</label>
<input type="text" name="dept" class="form-control" value="<?php echo $_SESSION["deptid"]; ?>" readonly>
<span class="help-block"><?php echo $err_dept;?></span>
</div>

<input type="hidden" name="regd" value="<?php echo $regdno; ?>"/>
<input type="submit" class="btn btn-primary" name="updatedata" value="Submit">

<a href="studentdatabase.php" class="btn btn-danger">Cancel</a>
</form>
</div>
</div>        
</div>
</div>
</body>
</html>