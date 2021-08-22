<?php 

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
                            header("Location: user.php");
                        }
                    }
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Invalid userId")';
                    echo '</script>';
                }

            }
        }
        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    /*}
    else
    {
        echo "All fields are required!";
    }*/
}

 ?>