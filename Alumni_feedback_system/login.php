
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
header("location: logout.php");
exit;
}

require_once "config.php";

$u_id=$u_pass="";


if(isset($_POST["login"]))
{
    $u_id = trim($_POST["userid"]);

    $u_pass = trim($_POST["pswd"]);

    /*if(!empty($_POST["userid"]) && !empty($_POST["pswd"]))
    {*/
        $sql="SELECT * FROM register WHERE s_id='$u_id'";
        if($stmt = $mysqli->prepare($sql))
        {
            /*$stmt->bind_param("ss", $u_id,$u_pass );*/
            if($stmt->execute())
            {
                $stmt->bind_result($dbusername , $name,$dob,$dept,$dbpassword);
                $stmt->store_result();
                $result = $stmt->fetch();
            }
        }
        $sqla="SELECT userid,upassword,dept_id FROM dept WHERE userid='$u_id'";
        if($stmta = $mysqli->prepare($sqla))
        {
            /*$stmt->bind_param("ss", $u_id,$u_pass );*/
            if($stmta->execute())
            {
                $stmta->bind_result($adminname ,$adminpassword,$deptid);
                $stmta->store_result();
                $resulta = $stmta->fetch();
            }
        }

        if(!empty($dbusername))
                {
                    if($u_id == $dbusername||$u_pass == $dbpassword)
                    {
                        if($u_pass != $dbpassword)
                        {
                    
                            echo '<script language="javascript">';
                            echo 'alert("Invalid password")';
                            echo '</script>';
                        }
                    
                        else
                        {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $name;
                            $_session["logintime"]=time();
                            $_SESSION["userid"]=$dbusername;
                            header("Location: user.php");
                        }
                    }
                }
            elseif (!empty($adminname)) {

                if($u_id == $adminname||$u_pass == $adminpassword)
                    {
                        if($u_pass != $adminpassword)
                        {
                    
                            echo '<script language="javascript">';
                            echo 'alert("Invalid password")';
                            echo '</script>';
                        }
                    
                        else
                        {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username1"] = $adminname;
                            $_session["logintime"]=time();
                            $_SESSION["userid"]=$adminname;
                            $_SESSION["deptid"]=$deptid;
                            header("Location: admin.php");
                        }
                    }
                # code...
            }
            else
            {
                echo '<script language="javascript">';
                    echo 'alert("Invalid userId")';
                    echo '</script>';
            }








        
        // Close statement
        $stmt->close();
        $stmta->close();

        // Close connection
        $mysqli->close();
    /*}
    else
    {
        echo "All fields are required!";
    }*/
}

 ?>