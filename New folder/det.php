<?php
 require 'config.php';
 //require 'head.php';
 $id=$_GET['id'];
$readStr="SELECT *FROM `post` where id='$id'";
$res=mysqli_query($con,$readStr);
$arr=mysqli_fetch_array($res,MYSQLI_ASSOC);
echo "<p style='margin: 10px; text-align:center;border-style: solid;'>";
 echo "<a href='det.php?id=$id'>";
         echo $arr['title'];

  echo "</a href='#'>";
         echo "</p>";
          echo "<p style='margin: 10px; text-align: left;

 border-style: dached'>";
     echo $arr['content'];
          echo "<p>";