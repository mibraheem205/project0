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
?><br>
<table align="center">
  <form class="" action="deletestudent.php" method="post">
    <tr>
      <th>Enter Standard</th>
      <td><input type="number" name="standard" placeholder="Enter standard" required="required"/></td>

      <th>   Enter Student name</th>
      <td><input type="text" name="name" placeholder="Enter student name " required="required"/></td>
      <td colspan="2"><input type="submit" name="submit" value="Search"/></td>
  </tr>

  </form>
</table>
<table align="center" width="80%" border="1" style="margin-top:20px;">
  <tr style="background-color:#000; color:#fff">
    <th>Number</th>
    <th>Image</th>
    <th>Name</th>
    <th>RollNo</th>
    <th>Delete</th>
  </tr>

  <?php
    if(isset($_POST['submit'])){
      include('../dbcon.php');
      $standard=$_POST['standard'];
      $name=$_POST['name'];

      $sql="SELECT * FROM `student` WHERE `std`='$standard' AND `name` LIKE '%$name%'";
      $run=mysqli_query($con,$sql);
      if(mysqli_num_rows($run)<1){
        echo "<tr><td colspan='2'>No Records Found</td></tr>";
      }
      else{
        $count=0;
        while($data=mysqli_fetch_assoc($run)){
          $count++;
          ?>
          <tr align="center">
            <td><?php echo $count; ?>></td>
            <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;"/></td>
            <td><?php echo $data['name'];?>></td>
            <td><?php echo $data['rollno'];?>></td>
            <td><a href="deletedata.php?sid=<?php echo $data['id'] ?>">Delete</a></td>
          </tr>
          <?php
        }
      }
    }
   ?>
</table>
