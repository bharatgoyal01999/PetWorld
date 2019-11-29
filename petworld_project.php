<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetWorld</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="practice.css">
<!-- <link rel="stylesheet" href="petworld_reg.css"> -->
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style media="screen">
  .mySlides{
    display: none;
  }
</style>
  </head>
  <?php


if($_SERVER['REQUEST_METHOD']=='POST'){
$con=mysqli_connect("localhost","root","","project");
if(isset($_POST['SubmitButton'])){


$urname=$_POST['uname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$sex=$_POST['gender'];
$pass=$_POST['p'];

$q1="INSERT INTO reg values('$urname','$fname','$lname','$pass','$mob','$email','$sex')";
$q2=mysqli_query($con,$q1);
if(!$q2){
  echo "shabash";
echo mysqli_error($con);}

}

if(isset($_POST['sb'])){

   $usnm=$_POST['username'];
      $passwrd=$_POST['pass'];
      $q1="SELECT Password FROM reg WHERE Username='$usnm'";
      $q2=mysqli_query($con,$q1);

      while($row = mysqli_fetch_array($q2,MYSQLI_ASSOC))

      {
          $pass= $row['Password'];
      }

    if($pass==$passwrd){
      session_start();
  $_SESSION['user_value']=$usnm;

    header("Location:login.php");



  }
  else{

   echo "<script> alert('wrong password'); </script>";
 }


}
}

?>
  <body class="bg">
    <dialog class="Login_div signup">
<div id="mylmodal" class="lmodal ">
        <div class="lmodal-content">
          <button type="button" name="button" class="closel close" style="margin-left:25em; background:#0D1D37;border: 1px solid #0D1D37"> <i class="fa fa-close" style="color:white;"></i> </button><br><br>
          <center><form name="login_form"  method="post" action="" class="form-inline">
            <p style="font-size:25px; color:grey;">Login</p><hr>
              <label> Username:</label><input type="text" class="form-control" name="username" required><br><br>
              <label> Password:</label><input type="password"class="form-control" name="pass" required><br><br>
              <input type="submit" value="Login" class="b" onsubmit="display.php" name="sb" style=" color:white;">
          </form><center>
        </div>
      </div></dialog>
      <dialog class="signup_div signup" id="favDialog">
      <div id="mysmodal" class="smodal">
         <div class="smodal-content form-inline">
           <button type="button" name="button" class="closes close" style="margin-left:25em; background:#0D1D37;border: 1px solid #0D1D37"> <i class="fa fa-close" style="color:white;"></i> </button><br><br>
           <center><form name="form1" action="" method="post">
             <h3 style="font-size:25px; color:grey;">SignUp</h3><hr>
 <label>Username:</label><input type="text" name="uname" class="form-control" required><br><br>
 <label>First Name:</label><input type="text" name="fname" class="form-control" required><br><br>
<label>Last Name:</label><input type="text" name="lname"class="form-control" required><br><br>
 <label>Password:</label><input type="password" class="form-control" name="p" required><br>
 [starting with letter and having 5 to 10 characters]:<br>
 <br>
<label>Contact Number:</label><input type="text" name="mob" class="form-control" required><br><br>
 <label>Email_Id:</label><input type="email" name="email" class="form-control" required><br><br>
 <label>Gender:  M </label><input type="radio" name="gender" value="male">
          <label> F </label><input type="radio" name="gender" value="female"><br><br>

 <br>
 <input type="submit" style="background:black; color:white;" value="Register" name="SubmitButton">
</form></center>
         </div>
       </div></dialog>
    <div class="nav" >
<table style="position:fixed;">
  <tr>
    <td>
      <a href="petworld_project.php" >
      <img src="logo.jpg" alt="Home" class="logo" title="PetWorld"></a></td>
    <td>  <h1 style="color:rgb(13,29,55);">PetWorld</h1>
</td>
<td style="padding-left:10em;">
  <form class="" action="buyer.php" method="post">
    <input type="search" name="search" placeholder="Breed/City" class="search">
    <button type="submit" name="button" class="b">  <i class="fa fa-search" style="font-size:20px; color:white;"></i>
</button>
  </form>
</td>
<td>
  <div class="dropdown">
  <button type="button" name="Category" class="b dropbtn">Category</button>
  <div class="dropdown-content">
  <form action="buyer.php" method="post">
  <button type="submit" name="dog" class="category" style="background-color: Transparent;">Dog</button> <br><br>
  <button type="submit" name="cat" class="category" style="background-color: Transparent;">Cat</button> <br><br>
  <button type="submit" name="bird" class="category" style="background-color: Transparent;">Bird</button> <br>
   </form>
   
   </div>
</div></td>
<td class="r">
  <i class="fa fa-user" style="font-size:20px; color:white;"></i>
  <button style="color:white; font-size:20px;"class="b" id="loginbtn" onclick="calllogin()">LogIn</button>

  <i class="fa fa-user" style="font-size:20px; color:white;"></i>
</td><td>  <button style="color:white; font-size:20px;" class="b signupbtn" id="signbtn"  onclick="callsignup()">SignUp</button>

</td>
</tr>
</table>
</div>

<div class="image" style="float:left; width:100%">
<img class="mySlides" src="2.jpg" style="width:100%;">

  <img class="mySlides" src="5.jpg" style="width:100%">
  <img class="mySlides" src="6.jpg" style="width:100%">  
  <!-- <img class="mySlides" src="9.jpg" style="width:100%"> -->
  <img class="mySlides" src="10.jpg" style="width:100%"> 
  <img class="mySlides" src="7.jpg" style="width:100%">
  <img class="mySlides" src="8.jpg" style="width:100%">  

</div>
<div class="i" style="background:rgb(13,29,55); padding-left:5em;padding-right:5em; width:100%;">
  <table>
    <tr style="">
      <td class="t"></td>
      <td class="t"></td>
      <td class="t"></td>
    </tr>
  </table>

</div>

<script type="text/javascript" src="petworldjsfile.js">
</script>

</body>
</html>
