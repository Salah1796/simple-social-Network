<?php
 $title="Add Post";
 require 'head.php';
 require 'config.php';
if(isset($_POST['sub']))
{

$title=$_POST['title'];
$content=$_POST['content'];

$addStr="INSERT INTO `post` (`content`)VALUES('$content')";
mysqli_query($con,$addStr) or die('error');
 header('location:Home.php');
}

?>
<div class="container"  >
        <div class="row top-pad"   >
            <div  class="col-md-12" >
                <h1 ></h1>          
                         
            </div>
          
        </div>
    </div>
     <section  id="contact-sec">
        <div class="container">
             
            <div class="row g-pad-bottom">
                <div class="col-md-6 ">
              
                    <form  method="post">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="text" name="title"   class="form-control" required="required" placeholder="Title" />
                                    
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <textarea name="content" id="message" required="required" class="form-control" rows="3" placeholder="Post" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="sub">Add Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>



    -->
   