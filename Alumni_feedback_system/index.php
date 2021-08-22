<?php include 'login.php'; ?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index_1.css">
 <script  src="index.js">
  	
  </script>
</head>
<body id="backdrop">
  <div>
<!-- ---------------------header----------------------------------- -->
	<div  id="hd">
    <header><img  class="logo" src="logoabit.png"><b>ABIT GROUP OF INSTITUTIONS</b></header>
  </div>

<!-----------------------navbar------------------------------- -->
<div id="nb">
      <nav class="navbar navbar-expand-sm">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a id="ni"class="nav-link" href="#">ABOUT US</a>
    </li>
    <li class="nav-item dropdown">
      <a id="ni" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        EVENTS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" id="dm"href="#">UPCOMING</a>
        <a class="dropdown-item" id="dm"href="#">PREVIOUS</a>
        <a class="dropdown-item" id="dm"href="#">GALLERY</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ni" href="#">FEEDBACK</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="ni" href="contactus.php">CONTACT US</a>
    </li>
    <li id="sp"></li>
    <li>
  
    	<button type="button" class="btn btn-info" onclick="openForm()">Login</button></li>
  </ul>
</nav>





</div>
	
<!-- ---------------------body--------------------------------------------------- -->	
<div class="view">
	<div class="container-fluid" id="form_popup">
    <form name="loginform" id="loginForm" class="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
     onsubmit="return  validateForm()" method="post" >
    	<!--------------header of the login form------------->
    <div class="fheader">
          <h4 class="title"><u>Login </u><a  id="cancel" onclick="closeForm()">×</a></h4>
          
    </div><br>

    <!-- body of the login form  ----------------------  -->

    <div class="fbody">
      <div class="form-group">
      <label for="id">USERID:</label>
      <input type="text" class="form-control" id="uid" placeholder="Enter regdno. as userid" name="userid">
      <div id="message1" class="error"></div>
    </div>

     <div class="form-group">
      <label for="pwd">PASSWORD:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        <div id="message2" class="error"></div>
    </div> 
     <button type="submit" class="btn btn-primary" name="login" >Login</button>
   <br> 
  </div>
   </form>


      <!-- <div class="form-group">
      <label for="id">USERID:</label> -->
      <!-- <input type="text" name="userid"  id="uid"  class="form-control"  placeholder="Enter regdno. as userid" value="<?php echo $u_id; ?>">
      <span class="help-block"><?php echo $err_id;?></span> -->
      <!-- <input type="text" class="form-control" id="uid" placeholder="Enter regdno. as userid" name="userid"  oninvalid="this.setCustomValidity('Please Enter a username')" oninput="setCustomValidity('')" required>
      </div> -->

   <!--    <div class="form-group">
      <label>PASSWORD</label>
      <input type="Password" name="pswd" placeholder="Enter password" class="form-control" id="pwd" oninvalid="this.setCustomValidity('Please Enter password')" oninput="setCustomValidity('')" required> -->
      <!-- <span class="help-block"><?php echo $err_pass;?></span> -->
     <!--  </div> -->   
  <!----footer---------------------------------------------------------- --> 
    <div class="ffooter">
          <span class="foot">Don't have an account?
                <a href="registration.php" id="alink" >Register Now?</a>
                <!--  <a href="javascript:SwapDivsWithClick('form_popup','reg_popup')"  id="alink" >Register Now</a>?-->
            </span>
    </div>
    <br>
    </div>
    </div>
    </body>
    </html> 