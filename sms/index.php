<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
  </head>

  <body bgcolor="yellow" >
    <h3 align="right" style="margin-right:20px"><a href="login.php">Admin Login</a></h3>
    <h1 align="center">Welcome to SMS</h1>
    <form class="" action="index.php" method="post">
      <table align="center" border="1" width="30%">
        <tr>
          <td colspan="2" align="center" border="1">Student information</td>
        </tr>
        <tr>
          <td>choose standard</td>
          <td>
            <select class="" name="std">
              <option value="1">1st</option>
              <option value="2">2nd</option>
              <option value="3">3rd</option>
              <option value="4">4th</option>
              <option value="5">5th</option>
              <option value="6">6th</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Enter Rollno</td>
          <td><input type="text" name="rollno" required/></td>
        </tr>
        <tr>
          <td colspan="2" align="right"><input type="submit" name="submit" value="Show info"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
  if(isset($_POST['submit'])){
    $standard=$_POST['std'];
    $rollno=$_POST['rollno'];

    include('dbcon.php');
    include('function.php');
    showdetails($standard,$rollno);
  }
 ?>
