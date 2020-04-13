<?php
function showdetails($standard,$rollno){

  include('dbcon.php');
  $sql="SELECT * FROM `student` WHERE `std`='$standard' AND `rollno`='$rollno';";
  $run=mysqli_query($con,$sql);
  if(mysqli_num_rows($run)>0){
    $data=mysqli_fetch_assoc($run);
    ?>
    <table border="2" align="center" width="60%" style=" font-style: bold; background-color:#1ea5c9; color:black;" >
      <tr>
        <th colspan="3">Student Details</th>
      </tr>
      <tr>
        <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="padding-left:80px; max-height:400px; max-width:200px;"/></td>
        <th>Roll No</th>
        <td><?php echo $data['rollno']; ?></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><?php echo $data['name']; ?></td>
      </tr>
      <tr>
        <th>Standard</th>
        <td><?php echo $data['std']; ?></td>
      </tr>
      <tr>
        <th>Parents contact</th>
        <td><?php echo $data['pcontact']; ?></td>
      </tr>
      <tr>
        <th>City</th>
        <td><?php echo $data['city']; ?></td>
      </tr>

    </table>
    <?php
  }
  else{
    echo "<script>alert('No Records Found');</script>";
  }
}
 ?>
