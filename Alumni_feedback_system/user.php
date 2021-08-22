<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}

/*-----------------------*/

/* --------------------------------------------------------------- */
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
  <link rel="stylesheet" href="index_1.css">
 <script  src="index.js"></script>

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
      <a id="ni"class="nav-link" href="user.php">HOME</a>
    </li>
    <li class="nav-item dropdown">
      <a id="ni" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        MY PROFILE
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" id="dm" href="read.php">VIEW PROFILE</a>
        <a class="dropdown-item" id="dm" href="cv.php">COMPLETE PROFILE</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ni" href="fv.php">FEEDBACK-FORM</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" id="ni" href="contactus.php">CONTACT US</a>
    </li> -->
    <li id="sp"></li>
    </ul>
  
    
      <div id="userpname">
      <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
      </div>
      <div id="logoutbtn">
    	<button type="button" class="btn btn-info" id="btnlogout" onclick="window.location.href='logout.php'">Logout</button></div>
  
</nav>
</div>


<div id="objective"> <p>"The success of any collage can be measured by the contribution the alumni make to our national life." </p></div>

<div id="event-table">
  <!-- -------------------------------- -->
  
  <div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="page-header clearfix">
<h2 class="pull-left">EVENTS</h2>
</div>

<?php
// Include config file
require_once "config.php";

// Attempt select query execution
$sql = "SELECT id,event_date,event_desc,src FROM events";
if($stmt = $mysqli -> prepare($sql)){
$stmt -> execute();
$stmt -> store_result();
$totalrows=$stmt->num_rows;

$stmt -> bind_result($id,$edate,$edesc,$esrc);

if($totalrows > 0)
{

echo "<table class='table table-bordered table-striped table-resposive'>";
echo "<thead>";
echo "<tr>";
echo "<th>SL No</th>";
echo "<th>Event Date</th>";
echo "<th>Event Description</th>";
echo "<th>Event Src</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$counter=1;
while ($row = $stmt -> fetch()) 
{
echo "<tr>";
echo "<td>" . $counter."</td>";
echo "<td>" . $edate."</td>";
echo "<td>" . $edesc. "</td>";
echo "<td>" .'<a href="' . $esrc . '">' . "view" . '</a>' ."</td>";


echo "</tr>";
$counter++;
}
echo "</tbody>";                            
echo "</table>";
} 
else
{
echo "<p class='lead'><em>No records were found.</em></p>";
}

// Free result set
$stmt->close();

} 
else
{
echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
</div>
</div>        
</div>
</div>

</div>





</div>
</body>
</html>