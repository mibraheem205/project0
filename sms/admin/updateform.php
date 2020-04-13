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
include('titlehead.php');
include('../dbcon.php');

$sid=$_GET['sid'];
$sql="SELECT * FROM `student` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?><br>
<form class="" action="updatedata.php" method="post" enctype="multipart/form-data"><br>
  <table style="text-align:left;" align="center">
    <tr>
      <th>Rollno</th>
      <td><input type="text" name="rollno" value="<?php echo $data['rollno'] ?>" required/></td>
    </tr>
    <tr>
      <th>Full Name</th>
      <td><input type="text" name="name" value="<?php echo $data['name'] ?>" required/></td>
    </tr>
    <tr>
      <th>City</th>
      <td><input type="text" name="city" value="<?php echo $data['city'] ?>" required/></td>
    </tr>
    <tr>
      <th>Parent's contact</th>
      <td><input type="text" name="pcon" value="<?php echo $data['pcontact'] ?>" required/></td>
    </tr>
    <tr>
      <th>Standard</th>
      <td><input type="number" name="std" value="<?php echo $data['std'] ?>" required/></td>
    </tr>
    <tr>
      <th>Photo</th>
      <td><input type="file" name="simg" required/></td>
    </tr>
    <tr>
      <td><input type="hidden" name="sid" value="<?php echo $data['id']; ?>"/></td>
      <td colspan="2" ><input type="submit" name="submit" value="Update"/></td>
    </tr>
  </table>
</form>
</table>
</body>
</html>
