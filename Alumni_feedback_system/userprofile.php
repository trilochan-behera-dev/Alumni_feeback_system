<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}
include 'up_update.php';

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
  <link rel="stylesheet" href="stylee.css">
 <script  src="validate.js"></script>

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
        <a class="dropdown-item" id="dm"href="read.php">VIEW PROFILE</a>
        <a class="dropdown-item" id="dm"href="cv.php">COMPLETE PROFILE</a>
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


<div class="cont">
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="cont" method="post" onsubmit="return validate()">
        <h2>COMPLETE PROFILE</h2><br>
          <label>Full Name</label><br>
          <input type="text" placeholder="Enter Your Name" class="row" id="name" name="uname" value="<?php echo ($_SESSION["username"]); ?>" readonly><br>
          <div class="error" id="nameErr"></div>
      <label> Phone no</label><br>
            <select name="ccode" class="phn">
            <option value="+91">+91</option>
            <option value="+92">+92</option>
            <option value="+93">+93</option>
      <input type="number" placeholder="Enter your phone no"  class="num" id="number" name="pnum"><br>
      <div class="error" id="mobileErr"></div><br>
      <label> Email Id</label><br>
      <input type="text"  placeholder="Enter your Email Id " class="row" id="email" name="uemail"><br>
      <div class="error" id="emailErr"></div>
      <label> Address</label><br>
      <textarea  rows="5" cols="20" class="row" id="address" name="uaddress"></textarea><br>
      <div class="error" id="addressErr"></div>
      <label> Year of join</label><br>
      <input type="number"  class="row" placeholder="Enter your join year" id="yoj" name="yjoin"><br>
      <div class="error" id="yojErr"></div>
      <label> Year of passing</label><br>
      <input type="number"  class="row" placeholder="Enter your passout year" id="yop" name="ypass"><br>
      <div class="error" id="yopErr"></div>
      
      <label>Higher Qualification</label><br>
      <select id="qual" class="edu" name="uhq">
        <option>SELECT</option>
        <option value="M.TECH">M.TECH</option>
        <option value="MCA">MCA</option>
        <option value="MBA">MBA</option>
        <option value="B.TECH">B.TECH</option>               
      </select>
      <div class="error" id="qualErr"></div>
  
      <label> Total Mark In CGPA</label>
      <input type="text" class="row" placeholder="Enter your Mark in CGPA" id="cgpa" name="ucgpa">
      <div class="error" id="cgpaErr"></div>
    
      <label>Designation</label><br>
      <select class="edu" id="deg" onchange="validatequa()" name="udeg">
        <option value="SE">SELECT</option>
        <option value="J">JOB</option>
        <option value="S">STUDENT</option>
      </select>
      <div class="error" id="degErr"></div>
                        
      <div id="job" style="display:none";>
      <label>Job Title</label><br>
      <input type="text" class="row" placeholder="Enter your Job title" id="jobt" name="ujt">
      <div class="error" id="jobtErr"></div>
      <label>Organization Name</label><br>
      <input type="text" class="row" placeholder="Enter your Organization Name" id="comp" name="uorg">
      <div class="error" id="compErr"></div>
      <label>Organization Location</label><br>
      <input type="text" class="row" placeholder="Enter your Organization Location" id="compl" name="uorgl">
      <div class="error" id="complErr"></div><br><br>
    </div>
    <div id="stu" style="display:none";>
      <label >Course Name</label><br>
      <input type="text" class="row" placeholder="Enter your Course name" id="cou" name="ucn">
      <div class="error" id="couErr"></div>
      <label>University Name</label><br>
      <input type="text" name="University" class="row" placeholder="Enter your University name" id="uni">
      <div class="error" id="uniErr"></div>
    </div>

      <center><input type="submit" value="Submit" id="sub" name="submitmydata"></center>
    </form>
  </div>
</body>

</div>
</body>
</html>