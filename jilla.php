<html>
<head>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $confirmpasswordErr = "";
$name = $email = $gender = $password = $confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") ;
{
  if (empty($_POST["name"])) {
     $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
     $emailErr = "email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      
      
    }
  }
    
  if (empty($_POST["password"])) {
     $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z-#' ]*$/",$password)) {
      $passwordErr = "only charcters,caps and small letter alloowed";
    
    }
  }

  if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "confirmpassword is required";
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    if($_POST['password'] != $_POST['confirmpassword']){
      $confirmpasswordErr="wrong password";
    }
    
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($nameErr || $emailErr || $passwordErr  || $confirmpasswordErr) {
  $str= $nameErr.'&emailer='.$emailErr.'&passworder='.$passwordErr.'&confirmpassworder='.$confirmpasswordErr
  .'&name='.$name.'&email='.$email.'&password='.$password.'&confirmpassword='.$confirmpassword;
  $enCode=base64_encode($str);
  // if($_POST['password'] != $_POST['confirmpassword'])
  // $confirmpasswordErr = "wrong password";

  header('location: velu.php?error='.$enCode);
  // header('location: velu.php?confirmpassword='.$confirmpasswordErr.'&name='.$name.'&email='.$email.'&error='.$encode);
  // header('location: velu.php?name='.$name.'&email='.$email);
  // header('Location: velu.php?error='.$nameErr.'&emailer='.$emailErr.'&passworder='.$passwordErr.
  // '&confirmpassworder='.$confirmpasswordErr .'&name='.$name.'&email='.$email);
  // header('Location: velu.php?error='.urlencode($nameErr).'&emailer='.urlencode($emailErr).'&passworder='.urlencode($passwordErr).
  // '&confirmpassworder='.urlencode($confirmpasswordErr) .'&name='.$name.'&email='.$email);
  } 
  
  // else {
    
  //   header('Location: velu.php?confirmpassword='.$confirmpasswordErr.'&name='.$name.'&email='.$email);
    
  // }
  else{
    echo "<br> Hello {$_POST['name']}";
    echo "<br> {$_POST['email']}";
    // echo  "<br> {$_POST['password']}";
    // echo "<br> {$_POST['confirmpassword']}";

  }
 
?>

 <script>
$(document).ready(function() {
  alert("<?php echo $name.'\n'.$email.'\n'?>");
});
</script>

</body>
</html>