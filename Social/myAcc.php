<?php
if(!isset($_COOKIE['name'])&&!isset($_COOKIE['pass']))
{
    header('location:../index.php');
    
    
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
 // he$date= date("Y-m-d");
  $content=$_POST['content'];
$addStr="INSERT INTO `post` (`content`,`UserID`)VALUES('$content','$id')";
mysqli_query($con,$addStr) or die('error');
 //header('location:Home.php');
}
$title=($_COOKIE['name']);

 include "head.php";
 //echo "<br><br>sssssssssssqqqqq";
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
   $pass=$_COOKIE['pass'];
    
   $readStr="SELECT  `id` FROM `users` where (name='$name') ";
   $res=mysqli_query($con,$readStr);
   $arr=mysqli_fetch_array($res);
   $id=$arr[0];
    $readStr="SELECT *FROM `post`  where (UserID='$id')";
   $res=mysqli_query($con,$readStr);
  while  ($arr=mysqli_fetch_array($res,MYSQLI_ASSOC))
{         
        $content=$arr['content'];
        $date=$arr['reated_date'];
        $id=$arr['id'];
        echo '
        <form style="" action="?id=$id;" method="Get" class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="w3images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">'. $date.'</span>
       
        <h4>'.$name.'<br></h4><br>
        
        
       
           <p style="
                  color:red;
            width:300px;

           ">'.$arr['content'].'
       </p>
        <button name="lk"  type="submit" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> &nbsp;Like</button> 
        <button name="com" type="submit" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Comment</button> 
      </form> 
      ';
}
       ?>
     
      
    <!-- End Middle Column -->
    </div>
<div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          
        </div>
      </div>
   
        <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="../w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
    
   
     
     
      
    <!-- End Right Column -->
    </div>
    
   
        
      
      
    <!-- End Right Column -->
    </div>
  
  <!-- End Grid -->
  </div>
 
<!-- End Page Container -->


<!-- Footer -->
 <?php include "../footer.php";       ?>
<script>
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

</body>
</html> 
