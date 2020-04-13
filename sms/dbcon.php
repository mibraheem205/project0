<?php
  $con = mysqli_connect('localhost','root','','sms');
  if($con==false){
    echo "connection error !";
  }
  else{
    echo "<h4>Connected to Database = sms</h4>";
  }
 ?>
