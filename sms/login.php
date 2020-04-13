<?php
  session_start( );
  if(isset($_SESSION['uid'])){
    header('location:admin/admindash.php');
  }  //session_destroy();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8"><br><br><br>
     <title>Admin Login</title>
   </head>
   <body bgcolor="#33c1e8" >
     <h1 align="center">Admin Login</h1>
     <form class="" action="login.php" method="post">
       <table align="center" width="" height="50%">
         <tr>
           <th>Username : </th>
           <td><input type="text" name="uname" required></td>
         </tr>
         <tr>
           <th>Password : </th>
           <td><input type="password" name="pass" required></td>
         </tr>
         <tr>
           <td colspan="6" align="right"><input type="submit" name="submit" value="login"></td>
         </tr>
       </table>
     </form>
   </body>
 </html>
<?php
  include('dbcon.php');
  if(isset($_POST['submit'])){
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
    $run=mysqli_query($con,$qry);
    $row=mysqli_num_rows($run);
    if($row<1){
      ?>
      <script>
        alert('username or password does not match !');
        window.open('login.php',_self);
      </script>
      <?php
    }
    else{
      $data=mysqli_fetch_assoc($run);
      $id=$data['id'];
      $_SESSION['uid']=$id;
      header('location:index.php');
    }
  }

 ?>
