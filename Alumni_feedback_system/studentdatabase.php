<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
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
  <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>
  <link rel="stylesheet" href="index_1.css">
 <script  src="index.js"></script>
  <script type="text/javascript" src="searchfromstudb.js"></script>



<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>

<style> 
        table.scrolldown { 
            width: 100%; 
              
            /* border-collapse: collapse; */ 
            border-spacing: 0; 
            border: 2px solid black; 
        } 
          
        /* To display the block as level element */ 
        table.scrolldown tbody, table.scrolldown thead { 
            display: block; 
        }  
          
        thead tr th { 
            height: 20px;  
            line-height: 20px; 
            text-align: center;
        } 
          
        table.scrolldown tbody { 
              
            /* Set the height of table body */ 
            height: 350px;  
              
            /* Set vertical scroll */ 
            overflow-y: auto; 
              
            /* Hide the horizontal scroll */ 
            overflow-x: hidden;  
        } 
          
        tbody {  
            border-top: 2px solid black; 
            background-color: white;
        } 
          
        tbody td, thead th { 
            width : 200px; 
            border-right: 2px solid black; 
        } 
        td { 
            text-align:center; 
        } 
    </style> 



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

<div class="page-header clearfix">
<h2 class="pull-left">Alumni Details</h2>          

<a href="create.php" class="btn btn-success" id="addbtn">Add New Alumni</a>
</div>
<!-- search bar -->
 <input type="search" placeholder="Search..." class="form-control search-input" id="searchbar" data-table="students-list"/>

<!-- end  -->  

<?php 

// Include config file
require_once "config.php";
$deptid="";
$deptid=$_SESSION["deptid"];
$sp=" ";

// Attempt select query execution
$sql = "SELECT regdno,name,dob,join_year,pass_year,dept_id FROM student_details where dept_id='$deptid'";
if($stmt = $mysqli -> prepare($sql)){
$stmt -> execute();
$stmt -> store_result();
$totalrows=$stmt->num_rows;

$stmt -> bind_result($regdno,$name,$dob,$join_year,$pass_year,$dept_id);

if($totalrows > 0)
{

echo "<table class='sortable scrolldown table-bordered table-striped table-resposive students-list'>";
echo "<thead>";
echo "<tr>";
echo "<th>SL NO.</th>";
echo "<th>REGISTRATION_NO</th>";
echo "<th>STUDENT_NAME</th>";
echo "<th style>DATE_OF_BIRTH</th>";
echo "<th>JOIN_YEAR</th>";
echo "<th>PASS_YEAR</i></th>";
echo "<th>DEPT_ID </th>";
echo "<th>ACTION</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$counter=1;
while ($row = $stmt -> fetch()) 
{
echo "<tr>";
echo "<td>" . $counter."</td>";
echo "<td>" . $regdno."</td>";
echo "<td>" . $name. "</td>";
echo "<td>" . $dob. "</td>";
echo "<td>" . $join_year. "</td>";
echo "<td>" . $pass_year. "</td>";
echo "<td>" . $dept_id. "</td>";
echo "<td>";

echo "<a href='update.php?regd=".$regdno."' title='Update Record' data-toggle='tooltip'><span class='fas fa-pencil-alt'></span></a>";
print " ";


echo "<a href='delete.php?regd=". $regdno ."' title='Delete Record' data-toggle='tooltip'><span class=' far fa-trash-alt'></span></a>";
echo "</td>";

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
</body>
</html>