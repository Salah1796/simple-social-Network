
<?php
if(isset($_POST["sign"]))
{
    $Name=$_POST['name'];
    $Pass=$_POST['pass'];
     include 'config.php';
    $addStr="INSERT INTO users (name,pass,id) VALUES ('$Name','$Pass','$Pass')";
   
if ($con->query($addStr) === TRUE) {
   echo "offfffff<br><br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
    setcookie('name',$Name );
    setcookie('pass',$Pass );
  //  setcookie(name,'',-3600);
     //setcookie(pass,"",-3600);

   // echo 'okkkkkkkk';
 header('location:index.php');

   
    
}
 else {
    die("");
}
?>
