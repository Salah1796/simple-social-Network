<?php

if(isset($_COOKIE['name'])&&isset($_COOKIE['pass']))
{
    
    header('location:Social/Home.php');
}
?>

<html>
   <!DOCTYPE html>
   <html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css2/style.css">
  <style>
      a{
          
          text-decoration: none;
          color: white;
      }
      
      
  </style>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body style="align: center">
<h1 class="register-title">Welcome</h1>
  <form class="" action="">
    <div class="register-switch register-title" style="">
      <input type="radio" name="reg" value="login" id="login" class="register-switch-input" >
      <label for="login" class="register-switch-label"><a href="login.html">login</a></label>
      <input type="radio" name="reg" value="signup" id="signup" class="register-switch-input">
      <label for="signup" class="register-switch-label"><a href="signUp.html">signUp</a></label>
    </div>
        </form>
</body>
    
</html>

