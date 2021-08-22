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

			if($stmt->execute())
			{
//with out using get_result()
				$stmt->bind_result($test);
				$stmt->store_result();
				$result = $stmt->fetch();
				if($stmt->num_rows == 1)
				{
					echo '<script type="text/javascript">'; 
					echo 'alert("Feedback completed");'; 
					echo 'window.location.href = "user.php";';
					echo '</script>';
				} 
				else
				{

					header("location: feedback.php");
					exit();
				}

			}
		}
	

?>
