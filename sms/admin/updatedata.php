<?php
  if(isset($_POST['submit'])){
    include('../dbcon.php');
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $pcon=$_POST['pcon'];
    $std=$_POST['std'];
    $sid=$_POST['sid'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$imagename");
    $qry="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcontact` = '$pcon', `std` = '$std', `image` = '$imagename' WHERE `student`.`id` ='$sid';";
     $run=mysqli_query($con,$qry);
     if($run== true){
       ?>
       <script>
        alert('Data updated Successfully :)');
        window.open('updatestudent.php?sid=<?php echo $sid; ?>','_self');
       </script>
       <?php
     }
	 else
	 {
		 echo "error";
	 }

  }
?>
