<?php include 'viwe_prof.php';
?>
<!DOCTYPE html>
<head>
	<title>User</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="read.css">
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
  
</nav></div></div>

<!-- div 1 -->
<div class="container" id="readprof">
  <div class="page-header">
<h3> Alumni Profile</h3>
</div>

<table class="table"><tr><td>
<b>Registration ID:</b></td><td>
<?php echo $id; ?></td>
</tr>


<tr><td>
<b>Name:</b></td><td>
<?php echo $name; ?></td>
</tr>

<tr><td>
<b>Date Of Birth:</b></td><td>
<?php echo $dob; ?></td>
</tr>

<tr><td>
<b>Email:</b></td><td>
<?php echo $email; ?></td>
</tr>

<tr><td>
<b>Contact Number:</b></td><td>
<?php echo $phn; ?></td>
</tr>

<tr><td>
<b>Address:</b></td><td>
<?php echo $address; ?></td>
</tr>

<tr>
  <th>
    <h3>Academic Details</h3>
  </th>
  <th></th>
</tr>

<tr><td>
<b>Dept:</b></td><td>
<?php echo $dept; ?></td>
</tr>

<tr><td>
<b>Year Of Joining:</b></td><td>
<?php echo $yoj; ?></td>
</tr>

<tr><td>
<b>Year Of Passing:</b></td><td>
<?php echo $yop; ?></td>
</tr>

<tr><td>
<b>Qualification:</b></td><td>
<?php echo $qual; ?></td>
</tr>

<tr><td>
<b>Secured Mark(in CGPA):</b></td><td>
<?php echo $cgpa; ?></td>
</tr>

<tr id="div_student">
  <th><h3>Higher Education Details</h3></th>
  <th></th>
</tr>

<tr id="div_student"><td>
<b>Course:</b></td><td>
<?php echo $course; ?></td>
</tr>

<tr id="div_student"><td>
<b>University:</b></td><td>
<?php echo $univ; ?></td>
</tr>

<tr id="div_job">
  <th>
    <h3>Job Details</h3>
  </th>
  <th></th>
</tr>

<tr id="div_job"><td>
<b>Designation:</b></td><td>
<?php echo $jobt; ?></td>
</tr>

<tr id="div_job"><td>
<b>Organization:</b></td><td>
<?php echo $org; ?></td>
</tr>

<tr id="div_job"><td>
<b>Organization Location:</b></td><td>
<?php echo $orgl; ?></td>
</tr>

</table>
</div>

<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>

</body>
</html>