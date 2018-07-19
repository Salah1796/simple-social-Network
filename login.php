<?php
include 'config.php';
$Name=$_POST['name'];
$Pass=$_POST['pass'];
$readStr="SELECT * FROM `users` where (name='$Name' and pass='$Pass')";
$res=mysqli_query($con,$readStr);

$arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
$Name=$arr['name'];
$Pass=$arr['pass'];
if($Name=="")
{
    echo 'Not found';
    
}
 else {
    setcookie('name',$Name );
    setcookie('pass',$Pass );
   header('location:Social/Home.php');

  // header('location:Home.php');
}
