
 <?php
 $title="home";

 require 'config.php';


if  (  !isset($_COOKIE[name])   )    
{
    
    header('location:index.php');
}


 ?>
 <div class="content" style="margin: 100px; text-align: right;

 border-style: double; border-color: red; ">
 	
 <?php
 require 'head.php';
 $readStr="SELECT *FROM `post` order by reated_date";
$res=mysqli_query($con,$readStr);
if(mysqli_num_rows($res)>0)
{
while  ($arr=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$id=$arr['id'];
        //$arr['content'];
	echo "<p style='margin: 10px; text-align:center;border-style: solid;'>";
 echo "<a href='det.php?id=$id'>";
       //  echo $arr['title'];

  echo "</a href='#'>";
         echo "</p>";
          echo "<p style='margin: 10px; text-align: left;

 border-style: dached'>";
     echo $arr['content'];
          echo "<p>";
       

   }
}
?>
  </div>



 


