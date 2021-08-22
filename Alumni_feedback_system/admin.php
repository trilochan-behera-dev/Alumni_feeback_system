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
      <a id="ni"class="nav-link" href="Admin.php">HOME</a>
    </li>
    <li class="nav-item">
      <a id="ni"class="nav-link" href="studentdatabase.php">STUDENT DATABASE</a>
    </li>
    <li class="nav-item">
      <a id="ni"class="nav-link" href="#">EVENT MANAGEMENT</a>
    </li>

    <!-- <li class="nav-item dropdown">
      <a id="ni" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        EVENTS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" id="dm" href="read.php"></a>
        <a class="dropdown-item" id="dm" href="cv.php">COMPLETE PROFILE</a>
      </div>
    </li>
 -->
    <!-- <li class="nav-item">
      <a class="nav-link" id="ni" href="feedback.php">FEEDBACK-FORM</a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" id="ni" href="contactus.php">CONTACT US</a>
    </li> -->
    <li id="sp"></li>
    </ul>
  
    
      <div id="userpname">
      <b><?php echo htmlspecialchars($_SESSION["username1"]); ?></b>
      </div>
      <div id="logoutbtn">
    	<button type="button" class="btn btn-info" id="btnlogout" onclick="window.location.href='logout.php'">Logout</button></div>
  
</nav>
</div>



</div>
</body>
</html>