<?php 
$title=" ";
include "head.php";
include "config.php";
   //echo "<script>alert()</script>";
$id=$_GET['id'];
   
 //conn.close();
 //echo "$id<br>";
 $readStrx="SELECT   * FROM `users` where (id='$id')";
   $resx=mysqli_query($con,$readStrx);
   $arr=mysqli_fetch_array($resx,MYSQLI_ASSOC);
   if($arr['name']==$_COOKIE['name'])
   header('location:myAcc.php');
     $name=$arr['name'];
     $jop=$arr['job'];
     $addres=$arr['addres'];
     $Date=$arr['DateOfBarth'];

  

if(isset($_POST['add']))
  {

   //echo "<br><br>/////////////////////<br><br>";
       

  //require 'config.php';
    $user_name=$_COOKIE['name'];
    $frname=$name;
    $Fr_Id=$id;
   $readStr="SELECT  `id` FROM `users` where (name='$user_name')";
    $res=mysqli_query($con,$readStr);
    $arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $user_id=$arr['id'];
  //echo "<script>alert($user_id)</script>";
    
    $sql="INSERT INTO friend_request (From_User,To_User) VALUES ('$user_id','$Fr_Id')";
  // $readStr="INSERT INTO `friend_request`(From_User,To_User) VALUES ('$user_id','$Fr_Id')";
  //i$res=mysqli_query($con,$readStr) 
 //;
   //*/
 if ($con->query($sql) === TRUE) {
  echo "<script>alert('friend requist is sent successfully')</script>";

   header('location:Home.php');

   // echo "Record updated successfully";
} else {
    echo "Error adding : " . $con->error;
}

$con->close();


  }

 
echo '
    
   
<div class="w3-card w3-round w3-white" style="width:400px; margin:auto; margin-top:100px; margin-bottom:100px;">
	
        <form  method="POST" class="w3-container" style="text-align: center;">
            <h4 class="w3-center">'.$name.'</h4>
         <p class="w3-center"><img src="w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>'.$jop.'</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>'.$addres.'</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> '.$Date.'</p>
           <button style=" border-radius: 10px; width: 200px;  margin:auto" type="submit" class="w3-button w3-block w3-green w3-section" name="add"><i class="fa fa-check"></i>Add</button>
        </form>
      </div>    
    
 
    ';
    ?>
    <?php include '../footer.php';?>

