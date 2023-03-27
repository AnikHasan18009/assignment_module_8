<?php

if($_SERVER['REQUEST_METHOD']==="POST")
{
 
if(empty($_POST['email'])|| empty($_POST['password']))
{
  $error="Incorrect email or password!";
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
  $error="Incorrect email!";
}
else{
  $email=$_POST['email'];$pass=$_POST['password'];
$file=fopen("users.csv","r");
$flag=false;

while(!feof($file))
{
  $user=fgetcsv($file);
  if(!empty($user[0]) && $user[2]===$email && $user[3]===$pass)
   {
    $flag=true;
    $fname=$user[0];
    break;
   }
}
if($flag===true)
{
  session_start();
  $_SESSION['fname']=$fname;
  header("Location: welcome.php");
  exit();
}
else
{
  $error="Incorrect email or password!";
}
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
  
  <title>Login Form</title>
</head>
<body>
  <form action="login.php" method="POST">
    <table>
     
      <?PHP
           if(!empty($error))
           echo "<tr><td style='color:red;'>$error</td></tr>";

           $error=null;
        ?>
        <tr>
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
        <td style="Padding:20px;">
        <input type="reset" value="Reset">
         <input type="submit" value="Submit">
        </td>
      </tr>
      <tr>
        <td>
          <a href="register.php" target="_blank">Not Registered</a>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>