<?php
if($_SERVER['REQUEST_METHOD']==='POST')
{
  if ( empty( $_POST['fname'] )||empty( $_POST['lname'] ) || empty( $_POST['email'] ) || empty( $_POST['password'] ) || empty( $_POST['cpassword'] ) )  {
    $error="Error!Data missing.";
}
elseif(!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) 
  {$error='Error! Invalid email format.';}
elseif( $_POST['password'] !== $_POST['cpassword']){
  $error='Error! Failed to confirm password.';
}
else{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 $file=fopen("users.csv","a");
 $user=array($fname,$lname,$email,$password);
 fputcsv($file,$user);
 $confirm="Successfully Registered.";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
  
  <title>Registration Form</title>
</head>
<body>
  <form action="register.php" method="POST">
    <table>
     
      <?PHP
        if(!empty($error))
        echo "<tr><td style='color:red;'>$error</td></tr>";
        if(!empty($confirm))
        echo "<tr><td style='color:green;'>$confirm</td></tr>";

        $error=null;
        ?>
        <tr>
        <td><label for="fname">First Name</label></td>
      </tr>
        <tr>
        <td><input class="box" type="text" name="fname" id="fname" required></td>
      </tr>
        <tr>
        <tr>
        <td><label for="lname">Last Name</label></td>
      </tr>
        <tr>
        <td><input class="box" type="text" name="lname" id="lname" required></td>
      </tr>
        <td><label for="email">Email</label></td>
      </tr>
      <tr>
        <td><input class="box" type="email" name="email" id="email" required></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
      </tr>
      <tr>
        <td><input class="box" type="password" name="password" id="password" required></td>
      </tr>
      <tr>
        <td><label for="cpassword">Confirm Password</label></td>
      </tr>
      <tr>
        <td><input class="box" type="password" name="cpassword" id="cpassword" required></td>
      </tr>
      <tr>
        <td style="Padding:20px;">
        <input type="reset" value="Reset">
         <input type="submit" value="Submit">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>