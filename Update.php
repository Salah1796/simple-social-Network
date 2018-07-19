<?php
echo "<br><h2>Youer  Name is ".$_COOKIE['name']."</h2><br>";
//echo "<br><h2>Youer  Name is ".$_COOKIE['pass']."</h2><br>";

if(isset($_POST['sub']))
{
    if($_POST['OldPass']!=$_COOKIE['pass'])
    {
        echo '<script>
alert(" Old Password Not Correct");

</script>';
 header('location:Update.php');

    
    
}
else
{
    include 'config.php';
    $oldName=$_COOKIE['name'];
    $Newnme=$_POST['Newname'];
    $Newpass=$_POST['NewPass'];
    $oldPass=$_POST['OldPass'];
    $jop=$_POST['job'];
    $addres=$_POST['addres'];
    $DateOfBarth=$_POST['dateOfBarith'];
    $str="UPDATE users SET name='$Newnme', pass='$Newpass',job=' $jop',addres=' $addres' ,DateOfBarth='$DateOfBarth' WHERE name='$oldName' ";
    //UPDATE MyGuests SET lastname='Doe' WHERE id=2
    if ($con->query($str) === TRUE) {
        setcookie('name',$Newnme );
        setcookie('pass',$Newpass );
      header('location:index.php');
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
    /*
UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value      */
}
}
?>

<style>

    input
    {
        margin: 10px;
        padding: 10px;
        width:70%; 
            
        
    }
    
    
</style>
<html align =center>
       
    
    
    <form  method="post" action="" style="
           
           border-style:solid;
           width:900px; 
           ;margin: auto;
           margin-top:10px;
           align-items: center;
           
           
           
           ">

       
        <div style="
            
             width: 70%;
              ;margin: auto;
             ">
       
        <br><h2>Update Data</h2>
        <input name="Newname" placeholder="Enter New Name" required="">
        <br>
        <input name="OldPass"  type="password" placeholder="Enter Old Password" required="">
        <br>
        <input name="NewPass" type="password" placeholder="Enter New Password" required="">
        <br>
           </div>
           
        
        <div class="w3-container " style="
            
             margin-left:  20px;
               width: 90%;
                ;margin: auto;
             ">
         <h4 class="w3-center">
       
         <hr>
         job:&nbsp;&nbsp;   <input name="job" value="Designer, UI"><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> 
        <br> 
        addres:<input name="addres" value="London, UK"><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> 
        <br> 
        Date:<input name="dateOfBarith" value="April 1, 1988"><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>
        </div>
         <input type="submit" name="sub" value="Update" >   
        
    </form>
    </div> 
</html>



