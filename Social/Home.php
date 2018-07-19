
<?php
if(!isset($_COOKIE['name'])&&!isset($_COOKIE['pass']))
{
    header('location:../index.php');
    
    
}
############save post to dataBase###############
  if(isset($_POST['fol']))
  {

    require 'config.php';
    $user_name=$_COOKIE['name'];
    $frname=$_POST['frname'];
    $readStr="SELECT  `id` FROM `users` where (name='$frname')";
    $res=mysqli_query($con,$readStr);
    $arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $Fr_Id=$arr['id'];
    $readStr="SELECT  `id` FROM `users` where (name='$user_name')";
    $res=mysqli_query($con,$readStr);
    $arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $user_id=$arr['id'];

   $readStr="INSERT INTO `freinds`(user_id,fr_id) VALUES ('$user_id','$Fr_Id')";
  
 $res=mysqli_query($con,$readStr);

   

  }
   if(isset($_POST['add']))
  {
       

    require 'config.php';
    $user_name=$_COOKIE['name'];
    $frname=$_POST['frname'];
    $readStr="SELECT  `id` FROM `users` where (name='$frname')";
    $res=mysqli_query($con,$readStr);
    $arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $Fr_Id=$arr['id'];
    $readStr="SELECT  `id` FROM `users` where (name='$user_name')";
    $res=mysqli_query($con,$readStr);
    $arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $user_id=$arr['id'];
///$readStr="INSERT INTO friend_request (From_User,To_User) VALUES ('$user_id','$Fr_Id')";
   $readStr="INSERT INTO `friend_request`(From_User,To_User) VALUES ('$user_id','$Fr_Id')";
  
 $res=mysqli_query($con,$readStr) ;
   
 
   

  }
  ############## #end Saving Post ###############

  ######## Start Saving Comment In DB ##################
  if (isset($_POST['com'])) {
        $content=$_POST['comment'];
        $user_id=$_GET['user_id'];
        $post_id=$_GET['post_id'];
        if($content!="")
        {
      require 'config.php';
$addStr="INSERT INTO `comment` (`Content`,`User_id`,`Post_id`)VALUES('$content',$user_id,$post_id)";
    mysqli_query($con,$addStr) or die('error');
  
  }

else
{
 echo '<script>alert("Plz add Text to Comment")</script>';  

}
}

  ######## end Saving Comment In DB ##################


  ######## Start Saving Lik $ dislike In DB ##################
if (isset($_POST['lk'])) {
       
       
        $post_id=$_GET['post_id'];
         
      require 'config.php';

$addStr="UPDATE `post` SET `lk`=`lk`+1 where `id`='$post_id'";
    mysqli_query($con,$addStr) or die('error');

}
if (isset($_POST['Dislk'])) {
       
       
        $post_id=$_GET['post_id'];
         
      require 'config.php';

$addStr="UPDATE `post` SET `Dislk`=`Dislk`+1 where `id`='$post_id'";
    mysqli_query($con,$addStr) or die('error');

}
?>


<?php


require 'config.php';
 // start get account data
$name=$_COOKIE['name'];
   $pass=$_COOKIE['pass'];
    
   $readStr="SELECT  * FROM `users` where (name='$name') ";
   $res=mysqli_query($con,$readStr);
   $arr=mysqli_fetch_array($res);
   $jop=$arr['job'];
   $addres=$arr['addres'];
    $DateOfBarth=$arr['DateOfBarth'];
    //end
 
if(isset($_POST['sub'])&&($_POST['content']!=""))
{
   // unset($_POST['update']);

 $name=$_COOKIE['name'];

$readStr="SELECT  `id` FROM `users` where (name='$name')";
   $res=mysqli_query($con,$readStr);
   $arr=mysqli_fetch_array($res);
   $id=$arr[0]; 
 // $date= date("Y-m-d");
  $content=$_POST['content'];
$addStr="INSERT INTO `post` (`content`,`UserID`)VALUES('$content','$id')";
mysqli_query($con,$addStr) or die('error');
 //header('location:Home.php');
}

?>
<?php
$title="Home";
include "head.php";


 ?>




<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
            <h4 class="w3-center"><?php echo $_COOKIE['name'];?></h4>
         <p class="w3-center"><img src="w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $jop; ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $addres; ?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $DateOfBarth; ?></p>
           <a href="../Update.php" style="text-decoration: none"> <button style=" border-radius: 10px; width: 200px;  margin-left: 40px;" type="submit" class="w3-button w3-block w3-green w3-section" title="Update Info" ><i class="fa fa-check"></i>Update Info</button></a>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      
      
      <!-- Interests --> 
    
      <br>
      
      <!-- Alert Box -->
      
   
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
              <form class="w3-container w3-padding" method="post" >
              <h6 class="w3-opacity">Social Media</h6>
              
              <input  name="content" class="w3-border w3-padding" >
             <input type="submit" name="sub" value="&nbsp;Post"class="w3-button w3-theme">
            </form>
            
              
          </div>
        </div>
      </div>
      <?php
       require 'config.php';
  // require 'head.php';
   $name=$_COOKIE['name'];
 
    
   $readStr="SELECT  `id` FROM `users` where (name='$name') ";
   $res=mysqli_query($con,$readStr);
   $arr=mysqli_fetch_array($res);
   $user_id=$arr[0];
  $readStr="SELECT  `fr_id` FROM `freinds` where (user_id='$user_id') ";
   $res=mysqli_query($con,$readStr);
  while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
  $id=$row["fr_id"];
  $readStrx="SELECT  `name` FROM `users` where (id='$id')";
   $resx=mysqli_query($con,$readStrx);
   $arrx=mysqli_fetch_array($resx);
   $frname=$arrx[0];
   
   $readStry="SELECT * FROM `post`  where UserID='$id'";
   $resy=mysqli_query($con,$readStry);
  while  ($arry=mysqli_fetch_array($resy,MYSQLI_ASSOC))
{         
        $content=$arry['content'];
        $date=$arry['reated_date'];
        $Post_id= $arry['id'];
        $liks=$arry['lk'];
        $Disliks=$arry['Dislk'];

        
        //$arr['id']=4;
       // $id=5;
        //$id2=8;
        echo '
        <form action="?post_id='.$Post_id.'&user_id='.$user_id.'&content='.$content.'" method="post" class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <a href="user.php?id='.$id.'"><img src="w3images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"></a>
        <span class="w3-right w3-opacity">'. $date.'</span>
       
        <a href="user.php?id='.$id.'">'.$frname.'<br><br></a><br>
        
        
       
           <p name="content" style="
          
           
           padding:4px;
           border-width:1px; 
           max-width:100%;
           margin-left:10px
           margin-right:10px;
           "
           >';
     echo $arry['content'];
    // $_GET['Pos_id']=$d;
        echo '</p>';
         $readStr2="SELECT * FROM `comment` WHERE  (Post_id='$Post_id')";
        $res2=mysqli_query($con,$readStr2);
          while  ($arr2=mysqli_fetch_array($res2,MYSQLI_ASSOC))
{  
  $user=$arr2['User_id'];
  $readStr3="SELECT  `name` FROM `users` where (id='$user')";
   $res3=mysqli_query($con,$readStr3);
   $arr3=mysqli_fetch_array($res3);
   $frname=$arr3[0];

echo '
<div style="
width:90%;


          
          border-style:solid;
          border-color:black;
          border-width:1px;
          padding:10px;
          margin-bottom:10px;
          border-radius:3px;
           ">'.$arr2['Content']. 

             '<a href="user.php?id='.$user.'&name='.$frname.'" style="

             color:red;
             float:right;
             text-decoration:none;


             ">('.$frname. ')</a><br>';

if($user_id==$user)
 {
    
    echo '<button  class="w3-button w3-block w3-green w3-section" style=" display: inline; border-radius: 5px; width: 80px;  margin-left: 7px; margin-bottom:0px;" type="submit"
    name=" delcom"  title="Update Info">Delete</button>';


 }
 echo '<button class="w3-button w3-block w3-green w3-section" style=" margin-bottom:-3px ;display: inline; border-radius: 5px; width: auto;  margin-left: 7px;" type="submit"
    name="comTocom"  title="Update Info">Comment</button>';
     echo '<button class="w3-button w3-block w3-green w3-section" style="  margin-bottom:-3px ;display: inline; border-radius: 5px; width: auto;  margin-left: 7px;" type="submit"
    name="likTocom"  title="Update Info">Like</button>';

 echo "</div>";
 }

 echo '          
         
        <textarea id="com" name="comment" style="width:80%; height:44px; margin-top:10px; max-width:80%"></textarea><br>
        <button name="com"  onclick="asd()" type="submit" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment">&nbsp;Comment</i> </button>
        <button id="lk" onclick=" document.getElementById("lk").style.color="blue";" name="lk"  type="submit" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>'. $liks.' &nbsp;Like&nbsp;</button>
        <button id="Dislk" name="Dislk"  type="submit" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>'. $Disliks.'  &nbsp;Dislike&nbsp;</button>
    
      
          
</form> 
      ';
}
   }
      
     
        ?>
    <!-- End Middle Column -->
    </div>
<div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
          <div class="w3-container">
          
        </div>
      </div>
      <br>
      <h3  style="text-align: center;">website Users</h3>
      <br>
      <?php
      require 'config.php';
  // require 'head.php';
  $name=$_COOKIE['name'];
  
   $pass=$_COOKIE['pass'];
    
   $readStr="SELECT  `id` FROM `users` where (name='$name') ";
   $res=mysqli_query($con,$readStr);
   $arr=mysqli_fetch_array($res);
   $user_id=$arr[0];
 $readStr="SELECT  * FROM `freinds` where(`user_id`='$user_id')";
   $res=mysqli_query($con,$readStr);
    $user_freinds=array();
    $i=0;
 while ($arr=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
        
 $user_freinds[$i]=$arr['fr_id'];
 $i++;
 }
$readStr="SELECT  * FROM `users` where id <>'$user_id'";
  $res=mysqli_query($con,$readStr);
 while($arr=mysqli_fetch_array($res,MYSQLI_ASSOC))
{    
      if(!in_array($arr['id'],$user_freinds))
      {
         
         echo '  <form style="width:270px   " method="post" class="w3-card w3-round w3-white w3-center" >
      
        <div class="w3-container"   >
            <br><br>

        
           <img src="w3images/avatar3.png" alt="Avatar" style="width:50%"><br>
          <input name="frname" readonly value='.$arr["name"].' style="
              text-align:center;
              margin-left:-20px;
              font-size:23px;
              width:90px;
            border-style: none;"></input>
            <div class="w3-row w3-opacity">
         
          
             <button id="f" onclick="folewd()"  type="submit" name="fol"  type="submit"  class="w3-button w3-block w3-green w3-section" title="Folow"><i class="fa fa-check"></i>Folow</button>
         
              
          
             <button style=" ;" id="add" onclick=" this.innerHTML="ffffffff";"  type="submit" name="add"  type="submit"  class="w3-button w3-block w3-red w3-section" title="add"><i class="fa fa-check"></i>Add </button>

        
          </div>
        </div>
      </form> <br> ';
       
}
}

 
      ?>
      
      <br>
      
     

     
      
    <!-- End Right Column -->
    </div>
    
   
        
      
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->

<br>

<!-- Footer -->
<?php include '../footer.php';?>


 
<script>
   function cleare(e){
       
    document.getElementById('add').innerHTML="ffffffff";
       
       
   }


// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}




</script>
<style>
    .cl
    {
       background-color: black;
        
    }
    </style>

</body>
</html> 
