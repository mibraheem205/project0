<?php
session_start();
if(isset($_SESSION['uid'])){
  echo "";
}
else{
  header('location:../login.php');
}
?>
<?php
include('header.php');
include('titlehead.php');?>
<form class="" action="addstudent.php" method="post" enctype="multipart/form-data"><br>
  <table style="text-align:left;" align="center">
    <tr>
      <th>Rollno</th>
      <td><input type="text" name="rollno" placeholder="Enter Rollno" required/></td>
    </tr>
    <tr>
      <th>Full Name</th>
      <td><input type="text" name="name" placeholder="Enter full name" required/></td>
    </tr>
    <tr>
      <th>City</th>
      <td><input type="text" name="city" placeholder="Enter city name" required/></td>
    </tr>
    <tr>
      <th>Parent's contact</th>
      <td><input type="text" name="pcon" placeholder="Enter parents contact no." required/></td>
    </tr>
    <tr>
      <th>Standard</th>
      <td><input type="number" name="std" placeholder="Enter standard number" required/></td>
    </tr>
    <tr>
      <th>Photo</th>
      <td><input type="file" name="simg" required/></td>
    </tr>
    <tr>
      <td colspan="2" ><input type="submit" name="submit" value="Submit"/></td>
    </tr>
  </table>
</form>
</body>
<html/>
<?php
  if(isset($_POST['submit'])){
    include('../dbcon.php');
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $pcon=$_POST['pcon'];
    $std=$_POST['std'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$imagename");
    $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcontact`, `std`,`image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
     $run=mysqli_query($con,$qry);
     if($run== true){
       ?>
       <script>
        alert('Data inserted Successfully :)');
       </script>
       <?php
     }
	 else
	 {
		 echo "error";
	 }

  }
?>
