<?php include 'index_reg.php';
      ?>

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
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="reg.css">
  <!-- <script  src="index.js">
  </script> -->
  
</head>
<body>
<!-- header -->
  <div  id="hd">
    <header><img  class="logo" src="logoabit.png"><b>ABIT GROUP OF INSTITUTIONS</b></header>
  </div><br>

<div class="container-fluid">
<!-- ------------------------------------------------------------------------- -->
<form id="formreg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

   <div class="fheader">
          <h2 class="title"><u>Registration</u></h2>

    </div><br>
    <p>Please give your registration number and press search icon </p>
<div class="form-group <?php echo (!empty($err_id)) ? 'has-error' : ''; ?>">
<label>Registration ID</label>
<div class="input-group">
    <input type="text" class="form-control" name="redg_id" value="<?php echo $u_id; ?>" placeholder="Please put regd no.">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit" name="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>



<span class="help-block"><?php echo $err_id;?></span>
</div>

<div class="form-group <?php echo (!empty($err_name)) ? 'has-error' : ''; ?>" id="div_test">
<label>Your Name</label>
<input type="text" name="user_name" class="form-control" value="<?php echo $u_name; ?>" readonly >
<span class="help-block"><?php echo $err_name;?></span>
</div>

<div class="form-group <?php echo (!empty($err_dob)) ? 'has-error' : ''; ?>" id="div_test">
<label>your dob</label>
<input type="text" name="user_dob" class="form-control" value="<?php echo $u_dob; ?>" readonly>
<span class="help-block"><?php echo $err_dob;?></span>
</div>

<div class="form-group <?php echo (!empty($err_dept)) ? 'has-error' : ''; ?>" id="div_test">
<label>User department</label>
<input type="text" name="user_dept" class="form-control" value="<?php echo $u_dept; ?>" readonly>
<span class="help-block"><?php echo $err_dept;?></span>
</div>

<div class="form-group <?php echo (!empty($err_pass)) ? 'has-error' : ''; ?>" id="div_test">
<label>Enter Password</label>
<input type="Password" name="user_pass" class="form-control" id="input" value="<?php echo $u_pass; ?>">
<span class="help-block"><?php echo $err_pass;?></span>
</div>

<div class="form-group <?php echo (!empty($err_re_pass)) ? 'has-error' : ''; ?>" id="div_test">
<label>Re-enter Password</label>
<input type="Password" name="user_re_pass" class="form-control" id="input" value="<?php echo $u_re_pass; ?>">
<span class="help-block"><?php echo $err_re_pass;?></span>
</div>




<input type="submit" class="btn btn-primary" id="bt" name="submitmydata" value="Submit">

<a href="index.php" class="btn btn-danger" id="bt">Cancel</a><br><br>


    </div> 
    </form>
    <!-- -------------------------------------------------------------------------------------------- -->
</div>

</body>
</html>
