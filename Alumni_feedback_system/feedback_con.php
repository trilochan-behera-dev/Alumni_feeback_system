<?php
require_once "config.php";
$txt1=$txt2=$qs1=$qs2=$qs3=$qs4=$qs5=$qs6=$qs7=$qs8=$qs9=$qs10="";
$e_txt1=$e_txt2=$e_qs1=$e_qs2=$e_qs3=$e_qs4=$e_qs5=$e_qs6=$e_qs7=$e_qs8=$e_qs9=$e_qs10="";

if(isset($_POST['submit']))
{
    if(empty($_POST["qs1"]))
    {
        $e_qs1="select one";
    }
    else 
    {
        $qs1=trim($_POST["qs1"]);
    }

    if(empty($_POST["qs2"]))
    {
        $e_qs2="select one";
    }
    else 
    {
        $qs2=trim($_POST["qs2"]);
    }

    if(empty($_POST["qs3"]))
    {
        $e_qs3="select one";
    }
    else 
    {
        $qs3=trim($_POST["qs3"]);
    }

    if(empty($_POST["qs4"]))
    {
        $e_qs4="select one";
    }
    else 
    {
        $qs4=trim($_POST["qs4"]);
    }

    if(empty($_POST["qs5"]))
    {
        $e_qs5="select one";
    }
    else 
    {
        $qs5=trim($_POST["qs5"]);
    }

    if(empty($_POST["qs6"]))
    {
        $e_qs6="select one";
    }
    else 
    {
        $qs6=trim($_POST["qs6"]);
    }

    if(empty($_POST["qs7"]))
    {
        $e_qs7="select one";
    }
    else 
    {
        $qs7=trim($_POST["qs7"]);
    }

    if(empty($_POST["qs8"]))
    {
        $e_qs8="select one";
    }
    else 
    {
        $qs8=trim($_POST["qs8"]);
    }

    if(empty($_POST["qs9"]))
    {
        $e_qs9="select one";
    }
    else 
    {
        $qs9=trim($_POST["qs9"]);
    }

    if(empty($_POST["qs10"]))
    {
        $e_qs10="select one";
    }
    else 
    {
        $qs10=trim($_POST["qs10"]);
    }

        $i_txt1=trim($_POST["txt1"]);

        if (empty($_POST["txt1"]))
        {
            $e_txt1="You have not entered anything.Enter some data.";
            
        }
        else 
        {
            $txt1=$i_txt1;
        } 
//textarea2

        $i_txt2=trim($_POST["txt2"]);

        if (empty($_POST["txt2"]))
        {
            $e_txt2="You have not entered anything.Enter some data.";
            
        }
        else 
        {
            $txt2= $i_txt2;
        }

        $u_id=$_SESSION["userid"];

if(empty($e_txt1) && empty($e_txt2) && empty($e_qs1) && empty($e_qs2) && empty($e_qs3) && empty($e_qs4) && empty($e_qs5) && empty($e_qs6) && empty($e_qs7) && empty($e_qs8) && empty($e_qs9) && empty($e_qs10))
{
    $sql = "INSERT INTO feedback1 (regdno,qs1,qs2,qs3,qs4,qs5,qs6,qs7,qs8,qs9,qs10,txt1,txt2) VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?)";

if($stmt = $mysqli->prepare($sql))
{

// Bind variables to the prepared statement as parameters
$stmt->bind_param("issssssssssss",$u_id,$param_qs1, $param_qs2,$param_qs3,$param_qs4,$param_qs5,$param_qs6,$param_qs7,$param_qs8,$param_qs9,$param_qs10,$param_txt1,$param_txt2);

// Set parameters
$param_qs1=$qs1;
$param_qs2=$qs2;
$param_qs3=$qs3;
$param_qs4=$qs4;
$param_qs5=$qs5;
$param_qs6=$qs6;
$param_qs7=$qs7;
$param_qs8=$qs8;
$param_qs9=$qs9;
$param_qs10=$qs10;
$param_txt1=$txt1;
$param_txt2=$txt2;


// Attempt to execute the prepared statement
if($stmt->execute())
{
// Records created successfully. Redirect to landing page
header("location: user.php");
exit();
  
}
else
{
echo "Something went wrong. Please try again later.";
}

}
// Close statement
$stmt->close();
}
// Close connection
$mysqli->close();

}
        
?>