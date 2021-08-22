
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}

include "feedback_con.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedbackform</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<title>feedback Form </title>
<link rel="stylesheet" type="text/css" href="design.css">
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
        <div class="container-fluid">  
        <form  name="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="feedform"  method="post"  > 

        <div class="fheader">
          <h2 class="title">FEEDBACK FORM</h2>
        </div><br>
        
        <div class="form-group">
        <label>(A)what about our clg campus?</label>
       <br>
      
       <label class="radio-inline"><input type="radio" name="qs1" <?php if (isset($qs1) && $qs1=="VERY GOOD") echo "checked";?> value="VERY GOOD"> VERY GOOD</label>
       <label class="radio-inline"><input type="radio" name="qs1" <?php if (isset($qs1) && $qs1=="GOOD") echo "checked";?>      value="GOOD" > GOOD</label>
       <label class="radio-inline"><input type="radio" name="qs1" <?php if (isset($qs1) && $qs1=="AVERAGE") echo "checked";?>   value="AVERAGE"> AVERAGE</label>
       <label class="radio-inline"><input type="radio" name="qs1" <?php if (isset($qs1) && $qs1=="BAD") echo "checked";?>       value=" BAD" > BAD</label></br>
       <span class="help-block"><?php echo $e_qs1;?></span></div>

       <div class="form-group">
        <label>(B)qs2</label>
        <br>
            <label class="radio-inline"><input type="radio" name="qs2" <?php if (isset($qs2) && $qs2=="VERY GOOD") echo "checked";?> value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs2" <?php if (isset($qs2) && $qs2=="GOOD") echo "checked";?>      value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs2" <?php if (isset($qs2) && $qs2=="AVERAGE") echo "checked";?>   value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs2" <?php if (isset($qs2) && $qs2=="BAD") echo "checked";?>       value=" BAD"> BAD</label></br>
            <span class="help-block"><?php echo $e_qs2;?></span></div>
       

       <div class="form-group">
        <label>(C)qs3</label>
      <br>
            <label class="radio-inline"><input type="radio" name="qs3" <?php if (isset($qs3) && $qs3=="VERY GOOD") echo "checked";?>value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs3" <?php if (isset($qs3) && $qs3=="GOOD") echo "checked";?>     value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs3" <?php if (isset($qs3) && $qs3=="AVERAGE") echo "checked";?>  value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs3" <?php if (isset($qs3) && $qs3=="BAD") echo "checked";?>      value=" BAD"> BAD</label></br>
            <span class="help-block"><?php echo $e_qs3;?></span></div>
        

        <div class="form-group">
        <label>(D)qs4</label>
        <br>
            <label class="radio-inline"><input type="radio" name="qs4"  <?php if (isset($qs4) && $qs4=="VERY GOOD") echo "checked";?>value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs4"  <?php if (isset($qs4) && $qs4=="GOOD") echo "checked";?>     value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs4"  <?php if (isset($qs4) && $qs4=="AVERAGE") echo "checked";?>  value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs4"  <?php if (isset($qs4) && $qs4=="BAD") echo "checked";?>      value=" BAD"> BAD</label></br>
            <span class="help-block"><?php echo $e_qs4;?></span></div>
      
    
      <div class="form-group">
        <label>(E)qs5</label>
       <br>
            <label class="radio-inline"><input type="radio" name="qs5"  <?php if (isset($qs5) && $qs5=="VERY GOOD") echo "checked";?> value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs5"  <?php if (isset($qs5) && $qs5=="GOOD") echo "checked";?>      value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs5"  <?php if (isset($qs5) && $qs5=="AVERAGE") echo "checked";?>   value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs5"  <?php if (isset($qs5) && $qs5=="BAD") echo "checked";?>       value=" BAD"> BAD</label></br>
            <span class="help-block"><?php echo $e_qs5;?></span></div>
       

       <div class="form-group">
        <label>(F)qs6</label>
      <br>
            <label class="radio-inline"><input type="radio" name="qs6" <?php if (isset($qs6) && $qs6=="VERY GOOD") echo "checked";?> value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs6" <?php if (isset($qs6) && $qs6=="GOOD") echo "checked";?>      value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs6" <?php if (isset($qs6) && $qs6=="AVERAGE") echo "checked";?>   value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs6" <?php if (isset($qs6) && $qs6=="BAD") echo "checked";?>       value=" BAD"> BAD</label></br>
             <span class="help-block"><?php echo $e_qs6;?></span></div>
        

        <div class="form-group">
        <label>(G)qs7</label>
   <br>
            <label class="radio-inline"><input type="radio" name="qs7"<?php if (isset($qs7) && $qs7=="VERY GOOD") echo "checked";?>value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs7"<?php if (isset($qs7) && $qs7=="GOOD") echo "checked";?>     value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs7"<?php if (isset($qs7) && $qs7=="AVERAGE") echo "checked";?>  value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs7"<?php if (isset($qs7) && $qs7=="BAD") echo "checked";?>      value=" BAD"> BAD</label></br>
             <span class="help-block"><?php echo $e_qs7;?></span></div>
        
   
        <div class="form-group">
        <label>(H)qs8</label>
     <br>
            <label class="radio-inline"><input type="radio" name="qs8"<?php if (isset($qs8) && $qs8=="VERY GOOD") echo "checked";?> value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs8"<?php if (isset($qs8) && $qs8=="GOOD") echo "checked";?>      value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs8"<?php if (isset($qs8) && $qs8=="AVERAGE") echo "checked";?>   value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs8"<?php if (isset($qs8) && $qs8=="BAD") echo "checked";?>       value=" BAD"> BAD</label></br>
            <span class="help-block"><?php echo $e_qs8;?></span></div>
        
  
        <div class="form-group">
        <label>(I)qs9</label>
     <br>
            <label class="radio-inline"><input type="radio" name="qs9"<?php if (isset($qs9) && $qs9=="VERY GOOD") echo "checked";?>value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs9"<?php if (isset($qs9) && $qs9=="GOOD") echo "checked";?>     value="GOOD"> GOOD</label>
            <label class="radio-inline"><input type="radio" name="qs9"<?php if (isset($qs9) && $qs9=="AVERAGE") echo "checked";?>  value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"><input type="radio" name="qs9"<?php if (isset($qs9) && $qs9=="BAD") echo "checked";?>      value=" BAD"> BAD</label></br>
             <span class="help-block"><?php echo $e_qs9;?></span></div>
        
   
        <div class="form-group">
        <label>(J)qs10</label>
      <br>
            <label class="radio-inline"> <input type="radio" name="qs10" <?php if (isset($qs10) && $qs10=="VERY GOOD") echo "checked";?>value="VERY GOOD"> VERY GOOD</label>
            <label class="radio-inline"> <input type="radio" name="qs10" <?php if (isset($qs10) && $qs10=="GOOD") echo "checked";?>     value="GOOD"> GOOD</label>
            <label class="radio-inline"> <input type="radio" name="qs10" <?php if (isset($qs10) && $qs10=="AVERAGE") echo "checked";?>  value="AVERAGE"> AVERAGE</label>
            <label class="radio-inline"> <input type="radio" name="qs10" <?php if (isset($qs10) && $qs10=="BAD") echo "checked";?>      value=" BAD"> BAD</label></br>
             <span class="help-block"><?php echo $e_qs10;?></span></div>
        

        <div  class="form-group">
        <label>Any Suggestion ...</label><br>
       <textarea name="txt1"><?php echo $txt1; ?></textarea></br>
        <span class="help-block"><?php echo $e_txt1;?></span>
       </div>


      <div  class="form-group">
        <label>Few lines about your experience in college ...</label><br>
       <textarea name="txt2"><?php echo $txt2; ?></textarea></br>
        <span class="help-block"><?php echo $e_txt2;?></span>
       </div>
       <br>
        
         
        <center><input type="submit" id="sub" name="submit" value="Submit"></center>
   </div>
    </form>
            
        </body>
        </html>