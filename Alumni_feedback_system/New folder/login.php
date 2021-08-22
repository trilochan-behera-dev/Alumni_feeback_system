<?php 

require_once "config.php";

$u_id=$u_pass="";
$err_id=$err_pass=$err_msg="";

if(isset($_POST["login"]))
{
    $input_id = trim($_POST["userid"]);
    if(empty($input_id))
    {
        $err_id = "*Please enter Registration id.";
    }
    else
    {
        $u_id = $input_id;
    }
    $input_pass = trim($_POST["pswd"]);
    if(empty($input_pass))
    {
        $err_pass = "*Please enter password";
    }
    else
    {
        $u_pass= $input_pass;
    }


    if(!empty($_POST["userid"]) && !empty($_POST["pswd"]))
    {
        $sql="SELECT * FROM login WHERE username='$u_id' AND password='$u_pass' ";
        if($stmt = $mysqli->prepare($sql))
        {
            /*$stmt->bind_param("ss", $u_id,$u_pass );*/
            if($stmt->execute())
            {
                $stmt->bind_result($dbusername ,$dbpassword);
                $stmt->store_result();
                $result = $stmt->fetch();
                if($u_id == $dbusername && $u_pass == $dbpassword)
                {
                     header("Location: registration.php");
                }
                else
                {
                      echo "Invalid username or password!";
                }
            }
        }
        // Close statement
        $stmt->close();

        // Close connection
        //$mysqli->close();
    }
    else
    {
        echo "All fields are required!";
    }
    $mysqli->close();
}

 ?>