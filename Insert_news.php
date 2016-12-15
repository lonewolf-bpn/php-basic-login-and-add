<?php
session_start();
if(!isset($_SESSION['uname'])){
	header('location:index.php ?msg=1');
}
//print_r($_SESSION);
  ?>
ADD PRODUCT

<?php 
require_once "header.php";
 ?>

<center><form name="news" method="post" action=""><br>
 Category id:<input type="number" name ="cid" required=""><br>
 Title:<input type="text" name ="title" required=""><br>
 Short description:<input type="textarea" name ="shortd" ><br>
 Content:<input type="textarea" name ="content" ><br>
 Feature image:<input type="file" name ="fimage" ><br>

 Status:<input type ="radio" name="nstatus" value ="Deactive" checked=""> Deactive
 <input type ="radio" name="nstatus" value ="Aactive" >Active
  <br>

  Slider key:<input type ="radio" name="nsliderkey" value ="NO" checked=""> YES
 <input type ="radio" name="nsliderkey" value ="YES" >NO
  <br>
  
  Feature news:<input type ="radio" name="nsliderkey" value ="NO" checked=""> YES
  <input type ="radio" name="nsliderkey" value ="YES" >NO
  <br>


 <input type="submit" name ="save" value="Save news">
 </form></center>


 <br>
<a href="logout.php">LOGOUT</a>