<!DOCTYPE HTML>  
<html>
<head>

<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// print_r($_GET['error']);

$name = $email = $gender = $password = $confirmpassword = "";
$nameErr = $emailErr = $passwordErr = $confirmpasswordErr = "";
// echo $_GET['error'];
 if(isset ($_GET[ 'error']))
{
  
$decrept=base64_decode($_GET['error']);
$test=explode("&",$decrept);
// echo $decrept;
// echo "<pre>";
// print_r ($test);
// exit;
$nameErr=$test[0];
$emailErr=str_replace("emailer=","",$test[1]);
$passwordErr=str_replace("passworder=","",$test[2]);
$confirmpasswordErr=str_replace("confirmpassworder=","",$test[3]);
$name=str_replace("name=","",$test[4]);
$email=str_replace("email=","",$test[5]);
$password=str_replace("password=","",$test[6]);
$confirmpassword=str_replace("confirmpassword=","",$test[7]);


//$nameErr=$_GET['error'];
// $emailErr=$_GET['emailer'];
// $passwordErr=$_GET['passworder'];
// $confirmpasswordErr=$_GET['confirmpassworder'];
// $name = $_GET['name'];
// $email =$_GET['email'];
//  $password=$_GET['password'];
//  $confirmpassword=$_GET['confirmpassword'];
}

 if(isset ($_GET['confirmpassword'])){
//   $confirmpasswordErr=$_GET['confirmpassword'];
//   $name=$_GET['name'];
// $email=$_GET['email'];
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="jilla.php">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  password: <input type="password" name="password" id="password" value="<?php echo $password;?>">
  <span class="error">*<?php echo $passwordErr;?></span>
  <br><br>

  confirmpassword: <input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
  <span class="error">*<?php echo $confirmpasswordErr;?></span>
  <br><br>

  <button onclick>submit</button>



</form>

</body>
</html> 
