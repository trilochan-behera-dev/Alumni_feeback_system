<?php
require_once "config.php";

session_start();


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
header("location: index.php");
exit;
}

$u_id="";

$u_id=$_SESSION["userid"];


    $sql = "SELECT regdno FROM feedback1 WHERE regdno =?";
    if($stmt = $mysqli->prepare($sql))
    {
    	$stmt->bind_param("i", $u_id);
    	{
    		if($stmt->execute())
    		{
    			$stmt->bind_result($test);
				$stmt->store_result();
				$result = $stmt->fetch();
    		}
    	}
    }
    $sqlu = "SELECT regdno FROM usr_prof WHERE regdno =?";
    if($stmtu = $mysqli->prepare($sqlu))
    {
    	$stmtu->bind_param("i", $u_id);
    	{
    		if($stmtu->execute())
    		{
    			$stmtu->bind_result($test);
				$stmtu->store_result();
				$resultu = $stmtu->fetch();
    		}
    	}
    }

    if($stmt->num_rows == 1)
    {
    	echo '<script type="text/javascript">'; 
		echo 'alert("Feedback completed");'; 
		echo 'window.location.href = "user.php";';
		echo '</script>';
    }
    else
    {
    	if($stmtu->num_rows == 1)
    	{
    		header("location: feedback.php");
    	}
    	else
    	{
    		echo '<script type="text/javascript">';
    		echo 'alert("please complete your profile before feedback-form");'; 
            echo 'window.location.href = "userprofile.php";';
            echo '</script>'; 

    	}
    }

		
	

?>
